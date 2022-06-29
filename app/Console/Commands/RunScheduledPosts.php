<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\User\TwitterController;
use App\Http\Controllers\User\FacebookController;
use App\Http\Controllers\User\InstagramController;
use App\Http\Controllers\User\PinterestController;
use App\Http\Controllers\User\LinkedinController;
use App\Models\SocialPost;
use App\Models\LinkedChannel;
use App\Models\User;
use Carbon\Carbon;
use DB;

class RunScheduledPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'RunScheduledPosts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // DB::table('test')->insert([
        //     'name' => 'saad ' . Carbon::now()
        // ]);

        $scheduled_posts = SocialPost::where('status', 'scheduled')->get();

        if ($scheduled_posts->count() > 0) {

            // Adding fields in Scheduled Posts Array
            foreach ($scheduled_posts as $post) {
                $linked_channels = LinkedChannel::where('page_id', $post->account_id)->first();
                $post->twitter_secret = $linked_channels->twitter_sceret;
                $post->access_token = $linked_channels->access_token;
            }

            $facebookController = new FacebookController();
            $twitterController = new TwitterController();
            $instagramController = new InstagramController();
            $pinterestController = new PinterestController();
            $linkedinController = new LinkedinController();
            $response = null;


            foreach ($scheduled_posts as $key => $post) {

                // Check Posts Limit for every user
                $fb_limit = LinkedChannel::where([['user_id', $post->user_id], ['channel_type', 'fb_page']])->first()->posting_limit_reach;
                $pinterest_limit = LinkedChannel::where([['user_id', $post->user_id], ['channel_type', 'pinterest']])->first()->posting_limit_reach;
                $instagram_limit = LinkedChannel::where([['user_id', $post->user_id], ['channel_type', 'instagram']])->first()->posting_limit_reach;
                $linkedin_limit = LinkedChannel::where([['user_id', $post->user_id], ['channel_type', 'linkedin']])->first()->posting_limit_reach;
                $twitter_limit = LinkedChannel::where([['user_id', $post->user_id], ['channel_type', 'twitter']])->first()->posting_limit_reach;
                
                // Update TimeZone
                date_default_timezone_set($post->timezone);
                
                // Updated Datetime according to setted timezone
                $updatedDatetime = date('Y-m-d H:i:s');

                if (Carbon::parse($updatedDatetime) >= Carbon::parse($post->scheduled_datetime)) {

                    // Add post data into db with pending status
                    $updatedPostId = SocialPost::where('id', $post->id)->update(['status' => 'pending']);
                    $updatedPostId = $post->id;

                    // Get access_token adn secret_token
                    $socialAccountTokens = LinkedChannel::where('page_id', $post->account_id)->first();


                    // Posting on facebook
                    if ($post->account_type == "fb_page" && ($fb_limit < 200)) {
                        $fbResponse = $facebookController->post($post->account_id, $post->access_token, $post->message, json_decode($post->images));
                        
                        if($fbResponse['status'] != 'success') {
                        
                            $response[$key]['status'] = false;
                            $response[$key]['type'] = "facebook_page";
                            $response[$key]['message'] = $fbResponse['message'];
                            $response[$key]['account_name'] = $post->account_name;
                            SocialPost::where('id', $updatedPostId)->update(['status' => 'failed']);

                        }else {
                        
                            $response[$key]['status'] = true;
                            $response[$key]['type'] = "facebook_page";
                            $response[$key]['message'] = $fbResponse['message'];
                            $response[$key]['account_name'] = $post->account_name;
                            SocialPost::where('id', $updatedPostId)->update(['status' => 'published']);
                            LinkedChannel::where([['user_id', $post->user_id], ['channel_type', 'fb_page']])->update(['posting_limit_reach' => $fb_limit+1]);


                        }
                    }


                    // Posting on Twitter
                    if ($post->account_type == "twitter" && ($twitter_limit < 100)) {
                        $twitterResponse = $twitterController->twitterTweet($post->access_token, $post->twitter_secret, $post->message, json_decode($post->images));

                        // dd($twitterResponse);

                        if ($twitterResponse['status'] == 'error') {
                            $response[$key]['status'] = false;
                            $response[$key]['type'] = "twitter";
                            $response[$key]['message'] = $instaResponse['message'];
                            $response[$key]['account_name'] = $post->account_name;
                            SocialPost::where('id', $updatedPostId)->update(['status' => 'failed']);

                        } else {
                            $response[$key]['type'] = "twitter";
                            $response[$key]['status'] = true;
                            $response[$key]['account_name'] = $post->account_name;
                            SocialPost::where('id', $updatedPostId)->update(['status' => 'published']);
                            LinkedChannel::where([['user_id', $post->user_id], ['channel_type', 'twitter']])->update(['posting_limit_reach' => $twitter_limit+1]);

                        }
                    }


                    // Posting on Instagram
                    if ($post->account_type == "instagram" && $post->images && ($instagram_limit < 200)) {

                        $explodedImage = explode("/", json_decode($post->images)[0]);
                        $imageUrl = array();
                        $imageUrl[] = config('app.url') . '/' . $explodedImage[count($explodedImage)-2] . '/' . end($explodedImage);
                        // echo json_encode($imageUrl);exit;
                        $instaResponse = $instagramController->post($post->account_id, User::where('id', $post->user_id)->first()->fb_access_token, $post->message, $imageUrl);
                        
                        if ($instaResponse['status'] == 'error') {
                            $response[$key]['status'] = false;
                            $response[$key]['type'] = "instagram";
                            $response[$key]['message'] = $instaResponse['message'];
                            $response[$key]['account_name'] = $post->account_name;
                            SocialPost::where('id', $updatedPostId)->update(['status' => 'failed']);

                        } else {
                            $response[$key]['type'] = "instagram";
                            $response[$key]['status'] = true;
                            $response[$key]['account_name'] = $post->account_name;
                            SocialPost::where('id', $updatedPostId)->update(['status' => 'published']);
                            LinkedChannel::where([['user_id', $post->user_id], ['channel_type', 'instagram']])->update(['posting_limit_reach' => $instagram_limit+1]);

                        }
                                    
                    }

                    // Post on Pinterest
                    if ($post->account_type == "pinterest" && $post->images && ($pinterest_limit < 100)) {


                        $explodedImage = explode("/", json_decode($post->images)[0]);

                        $imageUrl = config('app.url') . '/' . $explodedImage[count($explodedImage)-2] . '/' . end($explodedImage);

                        $pinterest_metadata = json_decode($post->pinterest_metadata);

                        $postPinData['link'] = $pinterest_metadata->pin_destination_link;
                        $postPinData['title'] = $pinterest_metadata->pin_title;
                        $postPinData['description'] = $post->message;
                        $postPinData['alt_text'] = $pinterest_metadata->pin_alt_text;
                        $postPinData['board_id'] = $pinterest_metadata->pintrest_board;

                        $postPinData['media_source'] = array(
                            "source_type" => "image_url",
                            "url" => $imageUrl,
                        );


                        $pinResponse = $pinterestController->createPin($post->access_token, $postPinData);


                        if ($pinResponse['status'] == 'error') {
                            $response[$key]['status'] = false;
                            $response[$key]['type'] = "pinterest";
                            $response[$key]['message'] = $pinResponse['message'];
                            $response[$key]['account_name'] = $post->account_name;
                            SocialPost::where('id', $updatedPostId)->update(['status' => 'failed']);

                        } else {
                            $response[$key]['type'] = "pinterest";
                            $response[$key]['status'] = true;
                            $response[$key]['account_name'] = $post->account_name;
                            SocialPost::where('id', $updatedPostId)->update(['status' => 'published']);
                            LinkedChannel::where([['user_id', $post->user_id], ['channel_type', 'pinterest']])->update(['posting_limit_reach' => $pinterest_limit+1]);

                        }
                                    
                    }

                    // Post on LinkedIn
                    if ($post->account_type == "linkedin" && ($linkedin_limit < 100)) {

                        // $explodedImage = explode("/", json_decode($post->images)[0]);

                        // $imageUrl = config('app.url') . '/' . $explodedImage[count($explodedImage)-2] . '/' . end($explodedImage);
                        

                        // $postLinkedInData['postTitle'] = $linkedin_post_title;
                        $postLinkedInData['sortSummray'] = $post->message;
                        // $postLinkedInData['thumbnail_url'] = $imageUrl;


                        $pinResponse = $linkedinController->postToLinkedIn($post->account_id,$post->access_token,$postLinkedInData);


                        if ($pinResponse['status'] == 'error') {
                            $response[$key]['status'] = false;
                            $response[$key]['type'] = "linkedin";
                            $response[$key]['message'] = $pinResponse['message'];
                            $response[$key]['account_name'] = $post->account_name;
                            SocialPost::where('id', $updatedPostId)->update(['status' => 'failed']);

                        } else {
                            $response[$key]['type'] = "linkedin";
                            $response[$key]['status'] = true;
                            $response[$key]['account_name'] = $post->account_name;
                            SocialPost::where('id', $updatedPostId)->update(['status' => 'published']);
                            LinkedChannel::where([['user_id', $post->user_id], ['channel_type', 'linkedin']])->update(['posting_limit_reach' => $linkedin_limit+1]);

                        }
                                    
                    }

                }

            }

        }
        


        return 0;
    }
}
