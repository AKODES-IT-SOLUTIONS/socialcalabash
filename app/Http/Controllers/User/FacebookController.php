<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LinkedChannel;
use Illuminate\Validation\Validator;
use Exception;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
use Illuminate\Support\Facades\Http;




class FacebookController extends Controller
{   

    protected $facebook;

    public function __construct()
    {
        //We have to use this configuration multiple times, therefore we are creating Object of Facebook named $facebook
        $this->facebook = new Facebook([
            'app_id' => env('FACEBOOK_APP_ID'),
            'app_secret' => env('FACEBOOK_APP_SECRET'),
            'default_graph_version' => env('FACEBOOK_GRAPH_API_VERSION')
        ]);
    }

    public function facebookLogin()
    {
        $helper = $this->facebook->getRedirectLoginHelper();
        $permissions = [
            'pages_manage_posts',
            'pages_read_engagement',
        ];
        $redirectUri = config('app.url') . '/facebook/callback';
        $loginUri = $helper->getLoginUrl($redirectUri, $permissions);

        return redirect($loginUri);
    }

    public function facebookCallback()
    {
        $helper = $this->facebook->getRedirectLoginHelper();


        if (request('state')) {
            $helper->getPersistentDataHandler()->set('state', request('state'));
        }

        // dd($helper);


        try {
            $accessToken = $helper->getAccessToken();
        } catch(FacebookResponseException $e) {
            throw new Exception("Graph returned an error: {$e->getMessage()}");
        } catch(FacebookSDKException $e) {
            throw new Exception("Facebook SDK returned an error: {$e->getMessage()}");
        }

        if (!isset($accessToken)) {
            // throw new Exception('Access token error');
            return redirect()->route('user.channels')->with('accessTokenError', 'Facebook Access Denied from User');
        }

        if (!$accessToken->isLongLived()) {
            try {
                $oAuth2Client = $this->facebook->getOAuth2Client();
                $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
            } catch (FacebookSDKException $e) {
                throw new Exception("Error getting a long-lived access token: {$e->getMessage()}");
            }
        }

        $token = $accessToken->getValue();
  
        User::find(auth()->id())->update(['fb_access_token' => $token]);

        $fbPagesList =  $this->getPages($token);

        //Store acceess token in databese and use it to get pages on Dashboard Channels Page
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

        return redirect()->route('user.channels')->withErrors(['message' => "Your Facebook account connected"]);
    }

    private function getPages($accessToken)
    {
        $pages = $this->facebook->get('/me/accounts', $accessToken);
        $pages = $pages->getGraphEdge()->asArray();

        return array_map(function ($item) {
            return [
                'provider' => 'facebook',
                'access_token' => $item['access_token'],
                'id' => $item['id'],
                'name' => $item['name'],
                'image' => "https://graph.facebook.com/{$item['id']}/picture?type=large"
            ];
        }, $pages);
    }

    /*
    public function post($accountId, $accessToken, $content, $images = [])
    {
        $data = ['message' => $content];
        $images = array();
        $attachments = $this->uploadImages($accountId, $accessToken, $images);

//        echo json_encode($attachments);exit;

        foreach ($attachments as $i => $attachment) {
            $data["attached_media[$i]"] = "{\"media_fbid\":\"$attachment\"}";
        }

        try {
            $this->postData($accessToken, "$accountId/feed", $data);
            $responses['status'] = "success";
            $responses['message'] = "uploaded";
            return $responses;
        } catch (\Exception $exception) {
            //notify user about error
            $responses['status'] = "error";
            $responses['message'] = $exception->getMessage();
            return $responses;
        }
    }

    private function uploadImages($accountId, $accessToken, $images = [])
    {
        // echo json_decode($_SERVER['DOCUMENT_ROOT']); exit;
        $attachments = [];
       
        foreach ($images as $image) {
            
           
        if (!file_exists($image)) continue;

            $data = [
                'source' => $this->facebook->fileToUpload($image),
            ];

            try {
                $response = $this->postData($accessToken, "$accountId/photos?published=false", $data);
                if ($response) $attachments[] = $response['id'];
            } catch (\Exception $exception) {
                throw new Exception("Error while posting: {$exception->getMessage()}", $exception->getCode());
            }
        }

        return $attachments;
    }

    private function postData($accessToken, $endpoint, $data)
    {
        try {
            $response = $this->facebook->post(
                $endpoint,
                $data,
                $accessToken
            );

        } catch (FacebookResponseException $e) {
            throw new Exception($e->getMessage(), $e->getCode());
        } catch (FacebookSDKException $e) {
            throw new Exception($e->getMessage(), $e->getCode());
        }
    }

    */




    public function post($accountId, $accessToken, $content, $images = null) {

        $raw_body = null;
        $posting_type = null;

        if ($images != null) {
            $posting_type = 'photos';
            // Get only image name
            $single_image = explode("/", $images[0])[8];
            $raw_body = [
                "message" => $content,
                "url" => "https://socialcalabash.com/uploaded_images/${single_image}"
            ];
        } else {
            $posting_type = 'feed';
            $raw_body = [
                "message" => $content,
            ];
        }


        try {
            $response = Http::withHeaders([
                'Authorization' => "Bearer ${accessToken}"
            ])->post("https://graph.facebook.com/${accountId}/${posting_type}", $raw_body)->json();

            $responses['status'] = "success";
            $responses['message'] = "uploaded";
            return $responses;
        } catch (\Exception $exception) {
            //notify user about error
            $responses['status'] = "error";
            $responses['message'] = $exception->getMessage();
            return $responses;
        }

    }




}