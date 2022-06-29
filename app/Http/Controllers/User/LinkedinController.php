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

class LinkedinController extends Controller
{
    public function linkedinLogin(){

        $client_id = env('LINKEDIN_CLIENT_ID');
        $client_secret = env('LINKEDIN_SECRET');
        $redirect_uri = env('LINKEDIN_REDIRECT_URI');
        $base_uri = env('LINKEDIN_BASE_URI');

        $scope = "r_liteprofile%20r_emailaddress%20w_member_social";

        $oauthUrl = "{$base_uri}/authorization?response_type=code&client_id={$client_id}&redirect_uri={$redirect_uri}&scope={$scope}";

        return redirect($oauthUrl);
    }
 
    public function linkedinCallback(){
 
        $client_id = env('LINKEDIN_CLIENT_ID');
        $client_secret = env('LINKEDIN_SECRET');
        $redirect_uri = env('LINKEDIN_REDIRECT_URI');
        $base_uri = env('LINKEDIN_BASE_URI');

        

        
        if(isset($_GET["code"])){

            $code = $_GET['code'];



            // -- Generating access token -- //
            $response = Http::withHeaders([
                'Content-Type' => 'application/x-www-form-urlencoded'
            ])->post("{$base_uri}/accessToken?grant_type=authorization_code&code={$code}&redirect_uri={$redirect_uri}&client_id={$client_id}&client_secret={$client_secret}")->json();


            if (!isset($response['access_token'])) {
                return redirect()->route('user.channels')->with('accessTokenError', 'Linkedin Code Expired, Please Login Again!');
            }

            $accessToken = $response['access_token'];

            // dd($accessToken);
           
            // -- Geting linkedin user details -- //
            $linkedin_user_details = Http::withHeaders([
                'Authorization' => "Bearer ${accessToken}"
            ])->get("https://api.linkedin.com/v2/me?projection=(id,localizedFirstName,localizedLastName,profilePicture)")->json();
            // dd($linkedin_user_details);
        
            
            // -- Store Data in Database -- //
            $channels[] = LinkedChannel::updateOrCreate(
                [
                    'user_id' => auth()->id(),
                    'page_id' => $linkedin_user_details['id'],
                    'page_name' => $linkedin_user_details['localizedFirstName'] . " " . $linkedin_user_details['localizedLastName']
                ],
                [
                    'user_id' => auth()->id(),
                    'page_id' => $linkedin_user_details['id'],
                    'page_name' => $linkedin_user_details['localizedFirstName'] . " " . $linkedin_user_details['localizedLastName'],
                    'imageToShow' => isset($linkedin_user_details['profilePicture']) ? $linkedin_user_details['profilePicture']['displayImage'] : null,
                    'access_token' => $response['access_token'],
                    'channel_type' => 'linkedin',
                    'created_at' => Carbon::now()
                ] 
            );
            // -- Store Data in Database -- //

            return redirect()->route('user.channels')->withErrors(['message' => "Your Linkedin account connected"]);
    
        } else {
            return Redirect::route('user.channels')
                ->withErrors('error', 'Crab! Something went wrong while signing you up!');
        }

        

    }

    /*
    public function postToLinkedIn($linkedin_id,$access_token,$dataToPost){
           
    
        $link = $dataToPost['link'];
        $body = new \stdClass();
        $body->content = new \stdClass();
        $body->content->contentEntities[0] = new \stdClass();
        $body->text = new \stdClass();
        $body->content->contentEntities[0]->thumbnails[0] = new \stdClass();
        $body->content->contentEntities[0]->entityLocation = $link;
        $body->content->contentEntities[0]->thumbnails[0]->resolvedUrl = $dataToPost['thumbnail_url'];
        $body->content->title = $dataToPost['postTitle'];
        $body->owner = 'urn:li:person:'.$linkedin_id;
        $body->text->text = $dataToPost['sortSummray'];
        $body_json = json_encode($body, true);
        
        try {
            $client = new Client(['base_uri' => 'https://api.linkedin.com']);
            $response = $client->request('POST', '/v2/shares', [
                'headers' => [
                    "Authorization" => "Bearer " . $access_token,
                    "Content-Type"  => "application/json",
                    "x-li-format"   => "json"
                ],
                'body' => $body_json,
            ]);
            $res['status'] = 'success';
            $res['message'] = 'Post is shared on LinkedIn successfully.';
            if ($response->getStatusCode() !== 201) {
                //dd( 'Error: '. $response->getLastBody()->errors[0]->message);
                $res['status']  = 'error';
                $res['message'] =  $response->getLastBody()->errors[0]->message;
            }
        
           // dd('Post is shared on LinkedIn successfully.');
        } catch(Exception $e) {
            // dd($e->getMessage(). ' for link '. $link);
            $res['status']  = 'error';
            $res['message'] =  $e->getMessage(). ' for link '. $link;
       }

        return $res;
  }
  */


  /*
        public function postToLinkedInTest(){
            $dataToPost = array(
                'postTitle' => '',
                'sortSummray' => 'Sort summary of the post 2.',
                'thumbnail_url' => 'https://socialcalabash.com/public/uploaded_images/11-05-22885668_socail.jpeg',
                // 'link' => 'https://socialcalabash.com/',
                'link' => '',
            );
            // dd($dataToPost);
            
            //Moaviz
            // $access_token = 'AQXfmQ7KHeVA9KRW1mRADvawddhTn-brYBfDitbuxc7nSLPtn7nWEl9r3UWb5hpR0eUF7rKa0Ma0ARAUjLatLI-_jt6UFAOoNoMntLGdQDDTzGrrtRqF5QL76wuUl_PRBjDwcTSHv9jCVfURYyK5n7cm02g-olLV_COvt48N7y92dd-gR5R6yMTqsmnugwgulUiWJ58gJmWjl-vuhSlJG3G4su_Xjcg3mZsrjYUqIArbCScbhNY9cOFr2HA6hKhBd15f1vSnqm8y34izxsp_t5u4OKKXVJlLZOuG63LPeA3kbOfqYoeEaujEpbedk07c_OO0g4FQNckonIZrlkoLc2tB_ueRVQ';
            // $linkedin_id = '0t5FU824s2';

            //Saad
            $access_token = 'AQXHasLjp3vvp6rGfyeI8ewJdjeR5d1LmoHgMumJevv-MtzyBcZrGYW_PnukDkIqCAdhIBAlinF4W86zV6DJeT0j9HEfrssCLokOKwNHregGgPaWxKe6T2WahuqFnmeqVvVghi2M47l38ofy2qRMChozYHosjIeW9VqVK47ayjqCpAHaVRSYbTlb7Qh6YOVjZthuturJ_rxs6__SvZEAy06Hnq8bx8fHBVP8xkpJuy46c1LM3ccfky6HGhtOvep1cjOD5J-ahvFO7kAQZWkxxS0FNsDzqsjZRIGY3fvinhjwYvU6ThEQhp15Lc72fAisDKtRO8Y6bQ2vriLLE14FQokbd8L0hQ';
            $linkedin_id = '0hYT_Qdl4h';

            $link = $dataToPost['link'];
            $body = new \stdClass();
            $body->content = new \stdClass();
            $body->content->contentEntities[0] = new \stdClass();
            $body->text = new \stdClass();
            $body->content->contentEntities[0]->thumbnails[0] = new \stdClass();
            $body->content->contentEntities[0]->entityLocation = $link;
            $body->content->contentEntities[0]->thumbnails[0]->resolvedUrl = $dataToPost['thumbnail_url'];
            $body->content->title = $dataToPost['postTitle'];
            $body->owner = 'urn:li:person:'.$linkedin_id;
            $body->text->text = $dataToPost['sortSummray'];
            $body_json = json_encode($body, true);
            
            try {
                $client = new Client(['base_uri' => 'https://api.linkedin.com']);
                $response = $client->request('POST', '/v2/shares', [
                    'headers' => [
                        "Authorization" => "Bearer " . $access_token,
                        "Content-Type"  => "application/json",
                        "x-li-format"   => "json"
                    ],
                    'body' => $body_json,
                ]);
            
                if ($response->getStatusCode() !== 201) {
                    dd( 'Error: '. $response->getLastBody()->errors[0]->message);
                }
            
                dd('Post is shared on LinkedIn successfully.') ;
            } catch(Exception $e) {
                dd($e->getMessage(). ' for link '. $link);
        }
        }

        */


        public function postToLinkedIn($account_id, $access_token, $message, $images = null)
        {
                        
            if ($images == null) {
                // For Text Posting
                $raw_body = [
                    "author" =>  "urn:li:person:${linkedin_id}",
                    "lifecycleState" =>  "PUBLISHED",
                    "specificContent" =>  [
                        "com.linkedin.ugc.ShareContent" =>  [
                            "shareCommentary" =>  [
                                "text" =>  $message
                            ],
                        "shareMediaCategory" =>  "NONE"
                        ]
                    ],
                    "visibility" =>  [
                        "com.linkedin.ugc.MemberNetworkVisibility" => "PUBLIC"
                    ]
                ];


                $response = Http::withHeaders([
                    'Authorization' => "Bearer ${access_token}"
                ])->post("https://api.linkedin.com/v2/ugcPosts", $raw_body)->json();

                if(isset($response['id'])) {
                    $responses['status'] = "success";
                    $responses['message'] = "uploaded";
                    return $responses;
                } else {
                    $responses['status'] = "error";
                    $responses['message'] = $e->getMessage();
                    return $responses;
                }


            } else {
                // For multiple images posting
                $linkedin_generated_images = [];
        
                foreach ($images as $image) {


                    //Step 1
                    $raw_body = [
                        "registerUploadRequest" => [
                            "recipes" => [
                                "urn:li:digitalmediaRecipe:feedshare-image"
                            ],
                            "owner" => "urn:li:person:${account_id}",
                            "serviceRelationships" => [
                                [
                                    "relationshipType" => "OWNER",
                                    "identifier" => "urn:li:userGeneratedContent"
                                ]
                            ]
                        ]
                    ];


                    // Step 2
                    $response = Http::withHeaders([
                        'Authorization' => "Bearer ${access_token}"
                    ])->post("https://api.linkedin.com/v2/assets?action=registerUpload", $raw_body)->json();


                    $uploadUrl = $response['value']['uploadMechanism']['com.linkedin.digitalmedia.uploading.MediaUploadHttpRequest']['uploadUrl'];
                    $asset = $response['value']['asset'];

                    $curl = curl_init();
                
                    curl_setopt_array($curl, array(
                    CURLOPT_URL => $uploadUrl,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'PUT',
                    CURLOPT_POSTFIELDS => file_get_contents($image),
                    CURLOPT_HTTPHEADER => array(
                        "Authorization: Bearer ${access_token}",
                        'Content-Type: image/png',
                        'Cookie: lidc="b=VB99:s=V:r=V:a=V:p=V:g=2648:u=11:x=1:i=1653638356:t=1653649502:v=2:sig=AQFt7Y9iSVSh9pwEvOPhIP2-9fL8Hj7S"; bcookie="v=2&d699ab01-40de-4b2d-8180-06bbf0a5141b"; lidc="b=OB56:s=O:r=O:a=O:p=O:g=2865:u=1:x=1:i=1653564432:t=1653650832:v=2:sig=AQEPXq5eeotQVaJbNTFCr4eZPQpVzPTD"; lang=v=2&lang=en-us'
                        ),
                    ));
                    
                    $response = curl_exec($curl);
                    
                    curl_close($curl);


                    $linkedin_generated_images[] = $asset;
                }

                $all_linkedin_images = [];
                foreach ($linkedin_generated_images as $linkedin_image) {
                    $all_linkedin_images[] = [
                        "status" => "READY",
                        "description" => [
                            "text" => ""
                        ],
                        "media" => $linkedin_image,
                        "title" => [
                            "text" => ""
                        ]
                    ];
                }


                //Step 3
                $raw_body = [
                    "author" => "urn:li:person:${account_id}",
                    "lifecycleState" => "PUBLISHED",
                    "specificContent" => [
                        "com.linkedin.ugc.ShareContent" => [
                        "shareCommentary" => [
                            "text" => $message
                        ],
                        "shareMediaCategory" => "IMAGE",
                        "media" => $all_linkedin_images
                        ]
                    ],
                    "visibility" => [
                        "com.linkedin.ugc.MemberNetworkVisibility" => "PUBLIC"
                    ]
                ];

                $response = Http::withHeaders([
                    'Authorization' => "Bearer ${access_token}"
                ])->post("https://api.linkedin.com/v2/ugcPosts", $raw_body)->json();

                if(isset($response['id'])) {
                    $responses['status'] = "success";
                    $responses['message'] = "uploaded";
                    return $responses;
                } else {
                    $responses['status'] = "error";
                    $responses['message'] = $e->getMessage();
                    return $responses;
                }
            }
            
        }
  
}
   
