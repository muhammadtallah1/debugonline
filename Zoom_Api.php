<?php

require_once 'php-jwt/src/BeforeValidException.php';
require_once 'php-jwt/src/ExpiredException.php';
require_once 'php-jwt/src/SignatureInvalidException.php';
require_once 'php-jwt/src/JWT.php';

use \Firebase\JWT\JWT;

class Zoom_Api
{
    private $zoom_api_key = 'zMNqEIhLR8uIHoXH7AqBsg';
    private $zoom_api_secret = 'PsoDafKgpNPV0lvthX9wfFQQYtRmHU99R7gY';

    // function to generate JWT
    private function generateJWTKey()
    {
        $key = $this->zoom_api_key;
        $secret = $this->zoom_api_secret;
        $token = array(
            "iss" => $key,
            "exp" => time() + 3600 //60 seconds as suggested
        );
        return JWT::encode($token, $secret, $key);
    }
    // function to create meeting
    public function createMeating($data = array())
    {
        $post_time = $data['start_date'];
        $start_time = gmdate("Y-m-d\TH:i:s", strtotime($post_time));

        $createMeatingArray = array();
        $createMeatingArray['topic'] = $data['topic'];
        $createMeatingArray['agenda'] = !empty($data['agenda']) ? $data['agenda'] : "";
        $createMeatingArray['type'] = !empty($data['type']) ? $data['type'] : 2; //schduled
        $createMeatingArray['start_time'] = $start_time;
        $createMeatingArray['timezone'] = 'Asia/Tashkent';
        $createMeatingArray['password'] = !empty($data['password']) ? $data['password'] : "";
        $createMeatingArray['duration'] = !empty($data['duration']) ? $data['duration'] : 60;

        $createMeatingArray['settings'] = array(
            'join_before_host'  => !empty($data['join_before_host']) ? true : false,
            'host_video'        => !empty($data['option_host_video']) ? true : false,
            'participant_video' => !empty($data['option_participants_video']) ? true : false,
            'mute_upon_entry'   => !empty($data['option_mute_participants']) ? true : false,
            'enforce_login'     => !empty($data['option_enforce_login']) ? true : false,
            'auto_recording'    => !empty($data['option_auto_recording']) ? $data['option_auto_recording'] : "none",
            'alternative_hosts' => isset($alternative_host_ids) ? $alternative_host_ids : ""
        );
        return $this->sendRequest($createMeatingArray);
    }
    //function to send request
    protected function sendRequest($data)
    {
        $request_url = "https://api.zoom.us/v2/users/87345881523/meetings";
        // $request_url = "https://us05web.zoom.us/wc/4980926029/start";

        $headers = array(
            "authorization: Bearer " . $this->generateJWTKey(),
            "content-type: application/json",
            "Accept: application/json",
        );

        $postFields = json_encode($data);

        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $request_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $postFields,
            CURLOPT_HTTPHEADER => $headers,
        ));

        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);
        if (!$response) {
            return $err;
        }
        return json_decode($response);
    }
}
