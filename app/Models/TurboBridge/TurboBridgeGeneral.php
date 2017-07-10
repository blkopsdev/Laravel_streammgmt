<?php

namespace App\Models\TurboBridge;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class TurboBridgeGeneral {

    public function __construct()
    {

    }

    public function post($apiURL, $request) {
        $data = new \stdClass();
        $data->error = null;

        $timeout = 60;

        $requestBody = json_encode($request);

        $client = new Client(); //GuzzleHttp\Client
        $response = $client->post($apiURL, [
          'headers' => [
            'Accept'     => 'application/json',
            'Content-Type'     => 'application/json',
          ],
          'body' => $requestBody,
        ]);
        $json = $response->getBody()->getContents();
        //log_message('debug', $apiURL);
        //log_message('debug', $requestBody);

        /*$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL            , $apiURL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER , true);
        curl_setopt($ch, CURLOPT_HEADER         , false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST  , 'POST');
        curl_setopt($ch, CURLOPT_TIMEOUT        , $timeout);
        curl_setopt($ch, CURLOPT_POSTFIELDS     , $requestBody);
        curl_setopt($ch, CURLOPT_HTTPHEADER     , array('Content-Type: application/json'));

        $json = curl_exec($ch);
        if ($json === false) {
            $data->error = "cURL error: " . curl_error($ch);
        } else {
            log_message("debug",$json);
        }

        curl_close($ch);*/

        if (is_null($data->error)) {
            $response = json_decode($json);
            if (is_null($response)) {
                $data->error = "JSON Error";
            } else if (property_exists($response, "authToken")) {
                $data->authToken = $response->authToken;
                $data->response = $response;
            } else {
                $data->error = "Authentication Error.";
            }

        }
        return $data;
    }

}
