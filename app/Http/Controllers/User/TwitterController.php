<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Logic\FacebookGraphAPI;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LinkedChannel;
use App\Models\SocialPost;
use Illuminate\Validation\Validator;
use Exception;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Atymic\Twitter\Facade\Twitter;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Abraham\TwitterOAuth\TwitterOAuth;
use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;



class TwitterController extends Controller
{
    
    /*protected $facebook;

    public function __construct()
    {
        $this->facebook = new FacebookGraphAPI();
    }

    public function redirectToProvider()
    {
        return redirect($this->facebook->redirectTo());
    }

    public function handleProviderCallback()
    {

//        if (request('error') == 'access_denied')
            //handle error
            $fbPagesList = $this->facebook->handleCallback();

            $channels = array();

            foreach($fbPagesList as $page) {
                $channels[] = LinkedChannel::updateOrCreate(
                    [
                        'user_id' => auth()->id(),
                        'page_id' =>  $page['id'],
                        'page_name' => $page['name']
                    ],
                    [
                        'user_id' => auth()->id(),
                        'page_id' => $page['id'],
                        'page_name' => $page['name'],
                        'imageToShow' => $page['image'],
                        'access_token' => $page['access_token'],
                        'channel_type' => 'fb_page',
                        'created_at' => Carbon::now()
                    ]
                );
            }

        return redirect()->route('user.channels');
    }
    */


    // TWITTER AUTHENTICATIONS FROM https://github.com/atymic/twitter
    public function twitterLogin() {
        // $twitter = Twitter::usingCredentials(env('TWITTER_ACCESS_TOKEN'), env('TWITTER_ACCESS_TOKEN_SECRET'));
        $token = Twitter::getRequestToken(route('twitter.callback'));
    
        if (isset($token['oauth_token_secret'])) {
            $url = Twitter::getAuthenticateUrl($token['oauth_token']);
    
            Session::put('oauth_state', 'start');
            Session::put('oauth_request_token', $token['oauth_token']);
            Session::put('oauth_request_token_secret', $token['oauth_token_secret']);
    
            return Redirect::to($url);
        }
        
        return Redirect::route('twitter.error');
    }


    public function twitterCallback() {
        // You should set this route on your Twitter Application settings as the callback
        // https://apps.twitter.com/app/YOUR-APP-ID/settings
        if (Session::has('oauth_request_token')) {
            $twitter = Twitter::usingCredentials(session('oauth_request_token'), session('oauth_request_token_secret'));
            $token = $twitter->getAccessToken(request('oauth_verifier'));
    
            if (!isset($token['oauth_token_secret'])) {
                return Redirect::route('twitter.error')->with('flash_error', 'We could not log you in on Twitter.');
            }
    
            // use new tokens
            $twitter = Twitter::usingCredentials($token['oauth_token'], $token['oauth_token_secret']);
            $credentials = $twitter->getCredentials();
    

            
            if (is_object($credentials) && !isset($credentials->error)) {
                // $credentials contains the Twitter user object with all the info about the user.
                // Add here your own user logic, store profiles, create new users on your tables...you name it!
                // Typically you'll want to store at least, user id, name and access tokens
                // if you want to be able to call the API on behalf of your users.
    
                // This is also the moment to log in your users if you're using Laravel's Auth class
                // Auth::login($user) should do the trick.
    
                Session::put('access_token', $token);
    
                // dd($credentials);
              //  dd($token);
          
                    $channels[] = LinkedChannel::updateOrCreate(
                        [
                            'user_id' => auth()->id(),
                            'page_id' =>  $credentials->id,
                            'page_name' => $credentials->name
                        ],
                        [
                            'user_id' => auth()->id(),
                            'page_id' =>$credentials->id,
                            'page_name' => $credentials->name,
                            'imageToShow' => $credentials->profile_image_url,
                            'twitter_sceret' => $token['oauth_token_secret'],
                            'access_token' => $token['oauth_token'],
                            'channel_type' => 'twitter',
                            'created_at' => Carbon::now()
                        ]
                    );
             
    
            return redirect()->route('user.channels')->withErrors(['message' => "Your Twitter account connected"]);
                // return Redirect::route('user.channels')->with('notice', 'Congrats! You\'ve successfully signed in!');
            }
        }
    
        return Redirect::route('twitter.error')
                ->with('error', 'Crab! Something went wrong while signing you up!');
    }


    public function twitterError() {
        // Something went wrong, add your own error handling here
    }


    public function twitterLogout() {
        Session::forget('access_token');
    
        return Redirect::to('/')->with('notice', 'You\'ve successfully logged out!');
    }





    // TWITTER API FROM ABRAHAM

    // LOGIN
    /*
    public function twitterLogin() {
        
        // CALLBACK URL
        $callback = route('twitter.callback');

        // ESTABLISHING TWITTER CONNECTION
        $twitter_connect = new TwitterOAuth(env('TWITTER_CONSUMER_KEY'), env('TWITTER_CONSUMER_SECRET'));

        // GET ACCESS TOKEN
        $access_token = $twitter_connect->oauth('oauth/request_token', ['oauth_callback' => $callback]);

        // GENERATE A NEW URL FOR CLIENT ROUTES
        $route = $twitter_connect->url('oauth/authorize', ['oauth_token' => $access_token['oauth_token']]);

        return redirect($route);

    }
    */



    // CALLBACK
    /*
    public function twitterCallback(Request $request) {

        // RESPONSE FROM TWITTER
        $response = $request->all();

        $oauth_token = $response['oauth_token'];
        $oauth_verifier = $response['oauth_verifier'];

        // ESTABLISHING TWITTER CONNECTION
        $twitter_connect = new TwitterOAuth(env('TWITTER_CONSUMER_KEY'), env('TWITTER_CONSUMER_SECRET'), $oauth_token, $oauth_verifier);

        // VERIFY USER TOKEN
        $token = $twitter_connect->oauth('oauth/access_token', ['oauth_verifier' => $oauth_verifier]);
        
        $screen_name = $token['screen_name'];   // SCREEN NAME
        $oauth_token = $token['oauth_token'];   // ACCESS TOKEN
        $oauth_token_secret = $token['oauth_token_secret'];    // TOKEN SECRET

        //SAVE (SCREEN NAME, ACCESS TOKEN and TOKEN SECRET) IN DATABASE

        return redirect()->route('user.channels');

    }
    */


    /* 
     *
     * POSTING A MESSAGE TO TWITTER
     * Just give token and secret token of any user to post on twitter 
     *
     */
    public function twitterTweet($oauth_token, $oauth_token_secret, $message, $file) {

        $push = new TwitterOAuth(env('TWITTER_CONSUMER_KEY'), env('TWITTER_CONSUMER_SECRET'), $oauth_token, $oauth_token_secret);

        $push->setTimeouts(10, 15);

        $push->ssl_verifypeer = true;

        if (!$file) {

            $push->post('statuses/update', ['status' => $message]);
            return [
                'status' => "error",
                'message' => "Tweet not sent"
            ];

        } else {

            $media = $push->upload('media/upload', ['media' =>  $file[0]]);

            $parameter = [
                'status' => $message,
                'media_ids' => $media->media_id_string
            ];

            $push->post('statuses/update', $parameter);

            return [
                'status' => "success",
                'items' => "Tweet sent successfully",
            ];

        }

    }

}