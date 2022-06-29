<?php
 
namespace App\Http\Controllers\User;
 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use App\Models\LinkedChannel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class RedditController extends Controller
{
    public function redditLogin(){

        $client_id = env('REDDIT_CLIENT_ID');
        $client_secret = env('REDDIT_SECRET');
        $redirect_uri = env('REDDIT_REDIRECT_URI');
        $base_uri = env('REDDIT_BASE_URI');

        $oauthUrl = "https://www.reddit.com/api/v1/authorize?client_id={$client_id}&response_type=code&state=12344&redirect_uri=https://socialcalabash.com/reddit/callback&duration=permanent&scope=*";
        return redirect($oauthUrl);

    }
 
    public function redditCallback(){
 
        $client_id = env('REDDIT_CLIENT_ID');
        $client_secret = env('REDDIT_SECRET');
        $redirect_uri = env('REDDIT_REDIRECT_URI');
        $base_uri = env('REDDIT_BASE_URI');

        

        if(isset($_GET["code"])){

            $code = $_GET['code'];

            // -- Generating access token -- //
            $response = Http::asForm()->withBasicAuth($client_id, $client_secret)
                ->post($base_uri,[
                'grant_type'=>"authorization_code",
                    'code'=>$code,
                    'redirect_uri'=>$redirect_uri,
            ]);


//            dd($response->json());

            $accessToken = $response['access_token'];

            if (!isset($response['access_token'])) {
                return redirect()->route('user.channels')->with('accessTokenError', 'Reddit Code Expired, Please Login Again!');
            }

            $accessToken = $response['access_token'];

//             dd($response->json());

            // -- Geting reddit user details -- //
            $reddit_user_details = Http::withToken($accessToken)->get("https://oauth.reddit.com/api/v1/me")->json();
            // dd($reddit_user_details);


            // -- Store Data in Database -- //
            $channels[] = LinkedChannel::updateOrCreate(
                [
                    'user_id' => auth()->id(),
                    'page_id' => $reddit_user_details['id'],
//                    'page_name' => $reddit_user_details['localizedFirstName'] . " " . $reddit_user_details['localizedLastName']
                    'page_name' => $reddit_user_details['name']
                ],
                [
                    'user_id' => auth()->id(),
                    'page_id' => $reddit_user_details['id'],
//                    'page_name' => $reddit_user_details['localizedFirstName'] . " " . $reddit_user_details['localizedLastName'],
                    'page_name' => $reddit_user_details['name'],
                    'imageToShow' => isset($reddit_user_details['icon_img']) ? $reddit_user_details['icon_img'] : null,
                    'access_token' => $response['access_token'],
                    'channel_type' => 'reddit',
                    'created_at' => Carbon::now()
                ]
            );
            // -- Store Data in Database -- //

            return redirect()->route('user.channels')->withErrors(['message' => "Your Reddit account connected"]);
    
        } else {
            return Redirect::route('user.channels')
                ->withErrors('error', 'Crab! Something went wrong while signing you up!');
        }

        

    }


    public function postToReddit($account_id, $access_token, $message, $images = null,$reddit_title,$reddit_community)
        {



            $client_id = env('REDDIT_CLIENT_ID');
            $client_secret = env('REDDIT_SECRET');
            $redirect_uri = env('REDDIT_REDIRECT_URI');
            $base_uri = env('REDDIT_BASE_URI');




//            Refresh Token Start

//        // -- Generating Refresh access token -- //
//        $response = Http::asForm()->withBasicAuth($client_id, $client_secret)
//            ->post($base_uri,[
//                'grant_type'=>"refresh_token",
//            ]);
//
//
//            dd($response->json());
//
//        $accessToken = $response['access_token'];
//
//        if (!isset($response['access_token'])) {
//            return redirect()->route('user.channels')->with('accessTokenError', 'Reddit Code Expired, Please Login Again!');
//        }
//
//        $accessToken = $response['access_token'];
//
//
//        // -- Geting reddit user details -- //
//        $reddit_user_details = Http::withToken($accessToken)->get("https://oauth.reddit.com/api/v1/me")->json();
//        // dd($reddit_user_details);
//
//        // -- Store Data in Database -- //
//        $channels[] = LinkedChannel::updateOrCreate(
//            [
//                'user_id' => auth()->id(),
//                'page_id' => $reddit_user_details['id'],
////                    'page_name' => $reddit_user_details['localizedFirstName'] . " " . $reddit_user_details['localizedLastName']
//                'page_name' => $reddit_user_details['name']
//            ],
//            [
//                'user_id' => auth()->id(),
//                'page_id' => $reddit_user_details['id'],
////                    'page_name' => $reddit_user_details['localizedFirstName'] . " " . $reddit_user_details['localizedLastName'],
//                'page_name' => $reddit_user_details['name'],
//                'imageToShow' => isset($reddit_user_details['icon_img']) ? $reddit_user_details['icon_img'] : null,
//                'access_token' => $response['access_token'],
//                'channel_type' => 'reddit',
//                'created_at' => Carbon::now()
//            ]
//        );
//        // -- Store Data in Database -- //



//            Refresh Token End















//            $responses['status'] = "success";
//            $responses['message'] = $reddit_user_details;
//            return $responses;

//            Post the Text
            if ($images == null) {

                $reddit_user_details = Http::asForm()->withToken($access_token)->post("https://oauth.reddit.com/api/submit",[
                    'title' => $reddit_title,
                    'kind' => 'self',
                    'sr' => $reddit_community,
                    'resubmit' => true,
                    'send_replies' => true,
                    'text' => $message,
                ])->json();


//                if(isset($reddit_user_details['id'])) {
                    $responses['status'] = "success";
                    $responses['message'] = "Text Wala Msg";
                    return $responses;
//                } else {
//                    $responses['status'] = "error";
//                    $responses['message'] = "Something Wrong";
//                    return $responses;
//                }

//              Post Text with Image
            } else {

                $reddit_user_details = Http::asForm()->withToken($access_token)->post("https://oauth.reddit.com/api/submit",[
                    'title' => $reddit_title,
                    'kind' => 'link',
                    'sr' => $reddit_community,
                    'resubmit' => true,
                    'send_replies' => true,
                    'text' => $message,
                    'url' => $images,
                ])->json();


                dd($reddit_user_details);

//                if(isset($response['id'])) {
                    $responses['status'] = "success";
                    $responses['message'] = $reddit_user_details;
                    return $responses;
//                } else {
//                    $responses['status'] = "error";
//                    $responses['message'] = "Something Wrong";
//                    return $responses;
//                }
            }
            
        }

    public function moderator(Request $request)
        {
            $accessToken = $request->accesstoken;


            $client_id = env('REDDIT_CLIENT_ID');
            $client_secret = env('REDDIT_SECRET');
            $redirect_uri = env('REDDIT_REDIRECT_URI');
            $base_uri = env('REDDIT_BASE_URI');


            $reddit_user_details = Http::asForm()->withToken($accessToken)->get("https://oauth.reddit.com/subreddits/mine/moderator")->json();

            $moderators =  $reddit_user_details["data"]["children"];

//            dd($moderators);

            $names = array();
            foreach($moderators as $mod){
                $name_string = $mod["data"]["display_name_prefixed"];
                if (str_contains($name_string, 'u/')) {
                } else {
                    array_push($names,$name_string);
                }
            }


            $responses['status'] = "success";
            $responses['message'] = $names;
            return $responses;









//                if(isset($response['id'])) {
//                    $responses['status'] = "success";
//                    $responses['message'] = "uploaded";
//                    return $responses;
//                } else {
//                    $responses['status'] = "error";
//                    $responses['message'] = $e->getMessage();
//                    return $responses;
//                }


        }
}
   
