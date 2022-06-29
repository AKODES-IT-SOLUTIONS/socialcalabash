<?php

namespace App\Helpers;

class Helper
{
    public static function curlRequest($url, $accessToken, $method) {

        //dd($url . $accessToken);

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url . $accessToken,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => $method,
      
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return json_decode($response);
    }


    public static function pinterestCurlGenerateToken($code, $redirect_uri, $client_id, $client_secret, $method) {

        $curl = curl_init();

        $basic_oauth = base64_encode($client_id . ":" . $client_secret);

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.pinterest.com/v5/oauth/token',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => "code={$code}&redirect_uri={$redirect_uri}&grant_type=authorization_code",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Basic {$basic_oauth}",
                "Content-Type: application/x-www-form-urlencoded",
                "Cookie: _ir=0"
            ),
            ));

        $response = curl_exec($curl);

        curl_close($curl);

        return json_decode($response);
    }

    public static function pinterestGetRequest($end_point,$accessToken, $method) {

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.pinterest.com/v5/'.$end_point,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer {$accessToken}",
                "Cookie: _ir=0"
            ),
            ));

        $response = curl_exec($curl);

        curl_close($curl);

        return json_decode($response);
    }

    public static function pinterestPostRequest($end_point,$accessToken, $method,$jsonDataToPost) {
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.pinterest.com/v5/'.$end_point,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            // CURLOPT_POSTFIELDS => $jsonDataToPost,
            CURLOPT_POSTFIELDS =>$jsonDataToPost,
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer  {$accessToken}",
                "Content-Type: application/json",
                "Cookie: _ir=0"
              ),
            ));

        $response = curl_exec($curl);

        curl_close($curl);

        return json_decode($response);
    }


}