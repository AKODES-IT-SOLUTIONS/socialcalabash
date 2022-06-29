<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User\TwitterController;
use App\Http\Controllers\User\FacebookController;
use App\Http\Controllers\User\InstagramController;
use App\Http\Controllers\User\PinterestController;
use App\Http\Controllers\User\LinkedinController;
use App\Http\Controllers\User\RedditController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LinkedChannel;
use App\Models\SocialPost;
use Illuminate\Validation\Validator;
use Exception;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ChannelsController extends Controller
{
    public function socialUploadImage(Request $req){

        $response = array();
        $postfix = '_socail';
        $upd_prefix = date('d-m-y');
        $random = rand(1,1000000);
        $instaflag = false;
        $instaID = "";
        $email = $req->user_email;
        // $selected_accounts = json_decode($req->selected_accounts);
    
        $file_name = $upd_prefix.$random.$postfix.'.jpeg';
        $attachment_path_url= "uploaded_images/";

        $uploadedAttachment = $req->file('cover_photo')->move($attachment_path_url, $file_name);

        $uploadedImageArray = array();

        if($uploadedAttachment){
           // array_push($uploadedImageArray, config('app.url') . "/public/uploaded_images/" . $file_name);
            array_push($uploadedImageArray,  public_path('uploaded_images/' . $file_name));
           
            $response["code"] = 200;
            $response["status"] = "success";
            $response["data"] = $uploadedImageArray;

        } else{
            $response["code"] = 500;
            $response["status"] = "error";
            $response["message"] = "Uploading failed";
        }

        return response()
            ->json(array('status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
            ->header('Content-Type', 'application/json');
    }

    /**
     * 
     * POST TO SOCIAL MEDIA
     * 
     */
    public function postToSocialMedia(Request $request)
    {

//        dd($request->all());

        // Fetch data from body
        $scheduled_datetime = isset($request->scheduled_datetime) ? $request->scheduled_datetime : null;
        $pagesToPost = $request->pagesToPost;
        $postMessage = $request->postMessage;
        $uploaded_image = json_decode($request->uploaded_image);



        // Convert images path into live url
        $live_images = null;
        if ($uploaded_image != null) {
            $live_images = [];
            foreach($uploaded_image as $image) {
                $live_images[]= "https://socialcalabash.com/uploaded_images/" . explode("/", $image)[8];
            }
        }


        // -- For pintrest -- //
        $pin_title = $request->pin_title;
        $pin_destination_link = $request->pin_destination_link;
        $pintrest_board = $request->pintrest_board;
        $pin_alt_text = $request->pin_alt_text;
        $pinterest_metadata = null;

        // Create data to store in database
        if ($pin_title != null || $pin_destination_link != null || $pintrest_board != null || $pin_alt_text != null) {
            $pinterest_metadata = json_encode([
                "pin_title" => $pin_title,
                "pin_destination_link" => $pin_destination_link,
                "pintrest_board" => $pintrest_board,
                "pin_alt_text" => $pin_alt_text,
            ]);
        }

        
        // -- For LinkedIn -- //
        // $linkedin_link = $request->linkedin_link;
        // $linkedin_post_title = $request->linkedin_post_title;
      
        // Creating objects of social media classes
        $facebookController = new FacebookController();
        $twitterController = new TwitterController();
        $instagramController = new InstagramController();
        $pinterestController = new PinterestController();
        $linkedinController = new LinkedinController();
        $redditController = new RedditController();

        $response = null;


        // Get current user timezone
        $myIp = $_SERVER['REMOTE_ADDR'];
        $myInfo = file_get_contents('http://ip-api.com/json/' . $myIp);
        $myInfo = json_decode($myInfo);
        $myTimezone = $myInfo->timezone;





        

            // Check if scheduled_datetime is coming from body it means user want to schedule his post, then we will run this condition
        if ($scheduled_datetime != null) {
            
            foreach ($pagesToPost as $key => $pages) {

                // Add post data into db with scheduled status
                $insertedPostId = SocialPost::insertGetId([

                    'user_id' => auth()->user()->id,
                    'account_id' => $pages['id'],
                    'account_name' => $pages['name'],
                    'account_type' => $pages['account'],
                    'message' => $postMessage,
                    'images' => json_encode($uploaded_image),
                    'status' => 'scheduled',
                    'scheduled_datetime' => $scheduled_datetime,
                    'timezone' => $myTimezone,
                    'pinterest_metadata' => ($pinterest_metadata != null) ? $pinterest_metadata : null,
                    'created_at' => now(),
                
                ]);
            }

            $path_to_track_posts = route('user.scheduled');
            return response()->json([

                'status' => "scheduled",
                'message' => "Posts are scheduled for posting! <br><a href='${path_to_track_posts}'>Click here to track your posts</a>"
            
            ]);
        }



        // Check Posts Limit
        $current_user = auth()->user()->id;
//        $fb_limit = LinkedChannel::where([['user_id', $current_user], ['channel_type', 'fb_page']])->first()->posting_limit_reach;
        $reddit_limit = LinkedChannel::where([['user_id', $current_user], ['channel_type', 'reddit']])->first()->posting_limit_reach;
//        $pinterest_limit = LinkedChannel::where([['user_id', $current_user], ['channel_type', 'pinterest']])->first()->posting_limit_reach;
//        $instagram_limit = LinkedChannel::where([['user_id', $current_user], ['channel_type', 'instagram']])->first()->posting_limit_reach;
        $linkedin_limit = LinkedChannel::where([['user_id', $current_user], ['channel_type', 'linkedin']])->first()->posting_limit_reach;
//        $twitter_limit = LinkedChannel::where([['user_id', $current_user], ['channel_type', 'twitter']])->first()->posting_limit_reach;

//dd($fb_limit,$instagram_limit,$linkedin_limit,$twitter_limit);

    
        foreach ($pagesToPost as $key => $pages) {
            

            // Add post data into db with pending status
            $insertedPostId = SocialPost::insertGetId([

                'user_id' => auth()->user()->id,
                'account_id' => $pages['id'],
                'account_name' => $pages['name'],
                'account_type' => $pages['account'],
                'message' => $postMessage,
                'images' => json_encode($uploaded_image),
                'status' => 'pending',
                'pinterest_metadata' => ($pinterest_metadata != null) ? $pinterest_metadata : null,
                'created_at' => now(),
                    
            ]);


            // Posting on facebook
            if ($pages['account'] == "fb_page" && ($fb_limit < 200)) {
                $fbResponse = $facebookController->post($pages['id'], $pages['token'], $postMessage, $uploaded_image);
                
                if($fbResponse['status'] != 'success') {
                  
                    $response[$key]['status'] = false;
                    $response[$key]['type'] = "facebook_page";
                    $response[$key]['message'] = $fbResponse['message'];
                    $response[$key]['account_name'] = $pages['name'];
                    SocialPost::where('id', $insertedPostId)->update(['status' => 'failed']);
                }else {
                   
                    $response[$key]['status'] = true;
                    $response[$key]['type'] = "facebook_page";
                    $response[$key]['message'] = $fbResponse['message'];
                    $response[$key]['account_name'] = $pages['name'];
                    SocialPost::where('id', $insertedPostId)->update(['status' => 'published']);
                    LinkedChannel::where([['user_id', auth()->user()->id], ['channel_type', 'fb_page']])->update(['posting_limit_reach' => $fb_limit+1]);

                }
            }


            // Posting on Twitter
            if ($pages['account'] == "twitter" && ($twitter_limit < 100)) {
                $twitterResponse = $twitterController->twitterTweet($pages['token'], $pages['secret_token'], $postMessage, $uploaded_image);
                
                if ($twitterResponse['status'] == 'error') {
                    $response[$key]['status'] = false;
                    $response[$key]['type'] = "twitter";
                    $response[$key]['message'] = $twitterResponse['message'];
                    $response[$key]['account_name'] = $pages['name'];
                    SocialPost::where('id', $insertedPostId)->update(['status' => 'failed']);

                } else {
                    $response[$key]['type'] = "twitter";
                    $response[$key]['status'] = true;
                    $response[$key]['account_name'] = $pages['name'];
                    SocialPost::where('id', $insertedPostId)->update(['status' => 'published']);
                    LinkedChannel::where([['user_id', auth()->user()->id], ['channel_type', 'twitter']])->update(['posting_limit_reach' => $twitter_limit+1]);

                }

            }


            // Posting on Instagram
            if ($pages['account'] == "instagram" && $uploaded_image && ($instagram_limit < 200)) {

                $explodedImage = explode("/", $uploaded_image[0]);
                $imageUrl = array();
                $imageUrl[] = config('app.url') . '/' . $explodedImage[count($explodedImage)-2] . '/' . end($explodedImage);
                // echo json_encode($imageUrl);exit;
                $instaResponse = $instagramController->post($pages['id'], auth()->user()->fb_access_token, $postMessage, $imageUrl);
                
                if ($instaResponse['status'] == 'error') {
                    $response[$key]['status'] = false;
                    $response[$key]['type'] = "instagram";
                    $response[$key]['message'] = $instaResponse['message'];
                    $response[$key]['account_name'] = $pages['name'];
                    SocialPost::where('id', $insertedPostId)->update(['status' => 'failed']);

                } else {
                    $response[$key]['type'] = "instagram";
                    $response[$key]['status'] = true;
                    $response[$key]['account_name'] = $pages['name'];
                    SocialPost::where('id', $insertedPostId)->update(['status' => 'published']);
                    LinkedChannel::where([['user_id', auth()->user()->id], ['channel_type', 'instagram']])->update(['posting_limit_reach' => $instagram_limit+1]);

                }
                               
            }

            // Post on Pinterest
            if ($pages['account'] == "pinterest" && $uploaded_image && ($pinterest_limit < 100)) {

                $explodedImage = explode("/", $uploaded_image[0]);
          
                $imageUrl = config('app.url') . '/' . $explodedImage[count($explodedImage)-2] . '/' . end($explodedImage);

                $postPinData['link'] = $pin_destination_link;
                $postPinData['title'] = $pin_title;
                $postPinData['description'] = $postMessage;
                $postPinData['alt_text'] = $pin_alt_text;
                $postPinData['board_id'] = $pintrest_board;
          
                $postPinData['media_source'] = array(
                    "source_type" => "image_url",
                    "url" => $imageUrl,
                );
            

                $pinResponse = $pinterestController->createPin($pages['token'],$postPinData);

            
                if ($pinResponse['status'] == 'error') {
                    $response[$key]['status'] = false;
                    $response[$key]['type'] = "pinterest";
                    $response[$key]['message'] = $pinResponse['message'];
                    $response[$key]['account_name'] = $pages['name'];
                    SocialPost::where('id', $insertedPostId)->update(['status' => 'failed']);

                } else {
                    $response[$key]['type'] = "pinterest";
                    $response[$key]['status'] = true;
                    $response[$key]['account_name'] = $pages['name'];
                    SocialPost::where('id', $insertedPostId)->update(['status' => 'published']);
                    LinkedChannel::where([['user_id', auth()->user()->id], ['channel_type', 'pinterest']])->update(['posting_limit_reach' => $pinterest_limit+1]);

                }
                               
            }

            // Post on LinkedIn
            if ($pages['account'] == "linkedin" && ($linkedin_limit < 100)) {

                // $explodedImage = explode("/", $uploaded_image[0]);
          
                // $imageUrl = config('app.url') . '/' . $explodedImage[count($explodedImage)-2] . '/' . end($explodedImage);
                

                // $postLinkedInData['postTitle'] = $linkedin_post_title;
                $postLinkedInData['sortSummray'] = $postMessage;
                // $postLinkedInData['thumbnail_url'] = $imageUrl;
                

    
                $pinResponse = $linkedinController->postToLinkedIn($pages['id'], $pages['token'], $postLinkedInData, $uploaded_image);

            
                if ($pinResponse['status'] == 'error') {
                    $response[$key]['status'] = false;
                    $response[$key]['type'] = "linkedin";
                    $response[$key]['message'] = $pinResponse['message'];
                    $response[$key]['account_name'] = $pages['name'];
                    SocialPost::where('id', $insertedPostId)->update(['status' => 'failed']);

                } else {
                    $response[$key]['type'] = "linkedin";
                    $response[$key]['status'] = true;
                    $response[$key]['account_name'] = $pages['name'];
                    SocialPost::where('id', $insertedPostId)->update(['status' => 'published']);
                    LinkedChannel::where([['user_id', auth()->user()->id], ['channel_type', 'linkedin']])->update(['posting_limit_reach' => $linkedin_limit+1]);

                }
                               
            }


            // Post on Reddit
            if ($pages['account'] == "reddit" && ($reddit_limit < 100)) {

                // $explodedImage = explode("/", $uploaded_image[0]);

                // $imageUrl = config('app.url') . '/' . $explodedImage[count($explodedImage)-2] . '/' . end($explodedImage);


                // $postLinkedInData['postTitle'] = $linkedin_post_title;
                $postRedditData['sortSummray'] = $postMessage;
                // $postRedditData['thumbnail_url'] = $imageUrl;


                $reddit_title = $request->reddit_title;
                $reddit_community = $request->reddit_community;

                if($uploaded_image == null){
                    $imageUrl = null;
                }else{
                    $explodedImage = explode("/", $uploaded_image[0]);
                    $imageUrl = config('app.url') . '/' . $explodedImage[count($explodedImage)-2] . '/' . end($explodedImage);
                }


                $redditResponse = $redditController->postToReddit($pages['id'], $pages['token'], $postMessage, $imageUrl,$reddit_title,$reddit_community);


                if ($redditResponse['status'] == 'error') {
                    $response[$key]['status'] = false;
                    $response[$key]['type'] = "reddit";
                    $response[$key]['message'] = $redditResponse['message'];
                    $response[$key]['account_name'] = $pages['name'];
                    $response[$key]['result'] = $redditResponse;
                    SocialPost::where('id', $insertedPostId)->update(['status' => 'failed']);

                } else {
                    $response[$key]['type'] = "reddit";
                    $response[$key]['status'] = true;
                    $response[$key]['account_name'] = $pages['name'];
                    $response[$key]['result'] = $redditResponse;
                    SocialPost::where('id', $insertedPostId)->update(['status' => 'published']);
                    LinkedChannel::where([['user_id', auth()->user()->id], ['channel_type', 'reddit']])->update(['posting_limit_reach' => $reddit_limit+1]);

                }

            }

        }


        $update_query = "";

        

        if ($response) {
            return response()->json([
                'status' => "success",
                'message' => $response
            ]);
        } else {
            return response()->json([
                'status' => "error",
                'message' => 'Error'
            ]);
        }
        

    }
    // -- POST To social media -- //
    
}