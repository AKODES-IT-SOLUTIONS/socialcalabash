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
use App\Helpers\Helper;



class InstagramController extends Controller
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

    public function instagramLogin()
    {

        $helper = $this->facebook->getRedirectLoginHelper();
        
        $permissions = [
            'instagram_basic',
            'instagram_content_publish'
        ];

        $redirectUri = config('app.url') . '/instagram/callback';

        $loginUri = $helper->getLoginUrl($redirectUri, $permissions);

        return redirect($loginUri);
    }


    public function instagramCallback()
    {

        $accessToken = null;
        
        $helper = $this->facebook->getRedirectLoginHelper();

        if (request('state')) {
            $helper->getPersistentDataHandler()->set('state', request('state'));
        }


        try {
            $accessToken = $helper->getAccessToken();
        } catch(FacebookResponseException $e) {
            throw new Exception("Graph returned an error: {$e->getMessage()}");
        } catch(FacebookSDKException $e) {
            throw new Exception("Facebook SDK returned an error: {$e->getMessage()}");
        }

        if (!isset($accessToken)) {
            throw new Exception('Access token error');
        }

        if (!$accessToken->isLongLived()) {
            try {
                $oAuth2Client = $this->facebook->getOAuth2Client();
                $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
            } catch (FacebookSDKException $e) {
                throw new Exception("Error getting a long-lived access token: {$e->getMessage()}");
            }
        }

        $accessToken = $accessToken->getValue();
    
        User::find(auth()->id())->update(['fb_access_token' => $accessToken]);
       
        $getAndStoreInstagramInfo = $this->getAndStoreInstagramInfo($accessToken);
        
        if($getAndStoreInstagramInfo) {
            return redirect()->route('user.channels')->withErrors(['message' => "Your instagram account connected"]);
        }

    }

    public function getAndStoreInstagramInfo($accessToken) {
        //Get list of allowed fb pages to retrieve further information of instagram account
        $fbPagesList =  $this->getPages($accessToken);

        $res = null;
        $userInstagramId = null;

        foreach($fbPagesList as $page) {
            $pageId = $page['id'];
            $res = Helper::curlRequest('https://graph.facebook.com/v13.0/' . $pageId . '?fields=instagram_business_account&access_token=', $accessToken, 'GET');
            
            if(isset($res->instagram_business_account)) {
                $userInstagramId = $res->instagram_business_account->id;
            } else {

            }
        }

        if ($userInstagramId != null) {
            $userInstagramDetails = Helper::curlRequest('https://graph.facebook.com/v13.0/' . $userInstagramId . '?fields=id,profile_picture_url,username&access_token=', $accessToken, 'GET');

            //Store acceess token in databese and use it to get pages on Dashboard Channels Page
            $channels = array();

            $channels[] = LinkedChannel::updateOrCreate(
                [
                    'user_id' => auth()->id(),
                    'page_id' =>  $userInstagramDetails->id,
                    'page_name' => $userInstagramDetails->username
                ],
                [
                    'user_id' => auth()->id(),
                    'page_id' =>  $userInstagramDetails->id,
                    'page_name' => $userInstagramDetails->username,
                    'imageToShow' =>$userInstagramDetails->profile_picture_url,
                    'access_token' => '',
                    'channel_type' => 'instagram',
                    'created_at' => Carbon::now()
                ]
            );
        } else {
            return false;
        }

        return true;
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

    public function post($accountId, $accessToken, $content, $images = [])
    {

        $responses = array();

        $data = ['message' => $content];
        // $images = array();
        $attachments = $this->uploadImages($accountId, $accessToken, $images);
        
       // $imageUrl = 'https://socialcalabash.com/public/uploaded_images/22-04-22617421_socail.jpeg'; demo

        // echo json_encode($images[0]); exit;

        
      
        $containerData = Helper::curlRequest('https://graph.facebook.com/v13.0/' . $accountId . '/media?image_url=' . urlencode($images[0]) . '&caption=' . $content . '&access_token=', $accessToken, 'POST');
        $responses['status'] = "success";
        $responses['message'] = "uploaded";

        if (!isset($containerData->id)) {

            $responses['status'] = "error";
            // if($containerData->error->code== "36003" ){
            //     $responses['message'] = "The image's aspect ratio does not fall within our acceptable range. Advise the app user to try again with an image that falls withing a 4:5 to 1.91:1 range.";
            // }
            // if($containerData->error->code== "36004" ){
            //     $responses['message'] = "The user exceeded the maximum amount of characters for a caption. Advise user to use a shorter caption. Maximum 2,200 characters, 30 hashtags, and 20 @ tags.";
            // }
            // if($containerData->error->code== "36001" ){
            //     $responses['message'] = "Possible permission error due to missing permission or expired token. Generate a new container and use it to try again.";
            // }
            // if($containerData->error->code== "36000" ){
            //     $responses['message'] = "Image exceeded maximum file size of 8MiB. Advise the user to try again with a smaller image.";
            // }
            // if($containerData->error->code== "9004" ){
            //     $responses['message'] = "The media could not be fetched from the supplied URI. Advise the app user to make sure the URI is valid and publicly available.";
            // }
            // if($containerData->error->code== "25" ){
            //     $responses['message'] = "The app user's Instagram Professional account is inactive, checkpointed, or restricted. Advise the app user to sign in to the Instagram app and complete any actions the app requires to re-enable their account.";
            // }

                dd($containerData);

            if(isset($containerData->error->error_user_msg)){
                $responses['message'] = $containerData->error->error_user_msg;
            }
            else{
                $responses['message'] = $containerData->error->message;
            }
            
            return $responses;

        }


        try {

            $creation_id = $containerData->id;
            $media_publish = Helper::curlRequest('https://graph.facebook.com/v13.0/' . $accountId . '/media_publish?creation_id=' . $creation_id . '&access_token=', $accessToken, 'POST');
            
            $responses['status'] = "success";
            $responses['message'] = "uploaded";

        } catch (Exception $e) {

            $responses['status'] = "error";
            $responses['message'] = $e->getMessage();
            $responses['type'] = "Creation ID Exception";
            return $responses;

        }
       
        return $responses;
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
}