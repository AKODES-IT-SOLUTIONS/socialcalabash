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




class CronJobsController extends Controller
{
    public function test() {

        $access_token = "AQWAv0EPl2YQvbwd0eqYWm09EQOzvp6F7cwq-SDs5C2zNAYIcsUdyqpcffEooqR0S6VtZpYTEzgNUSEFWAuubZyZgzoVY2QcfAAfdyn3j0P_fdA3jFPzsdnSagLFI3SNTAW3tHLqrwIAJvYvioGnz3BYpis3cYQPGF8_CXSY0ttBjKbSycQEfjIGmxsM5I2LjQdTvYyY9RMauiCVf65iC4QkKXdX71pzWN1aOT5XiHDw78vg44kPA9n-sCGhwJ4jay9DcMTQV4BOKMRlHiv1tPL8f8l_EazOfeSgKYLCdMt6U7YkeIrTLfFk_u38hqLU4MP1-U0n3Sc-3DLySaVoDESU6evqCQ";
        $images = ["https://socialcalabash.com/uploaded_images/09-05-22209106_socail.jpeg", "https://socialcalabash.com/uploaded_images/06-05-22757698_socail.jpeg"];
        $message = date("H:ia");
        $account_id = "0hYT_Qdl4h";

        
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

        dd($response);
        
    }
}