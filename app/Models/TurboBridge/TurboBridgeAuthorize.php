<?php

namespace App\Models\TurboBridge;

class TurbobridgeAuthorize {

    public function bridge($conferenceID, $pin) {
        // TurboBridge API Endpoint URL
        $apiURL  = "https://api.turbobridge.com/4.0/Authorize";

        $request = array(
            "request" => array(
                "authAccountBridge" => array(
                    "partnerID"    => config('app.turbobridge_partnerid'),
                    "accountID"    => config('app.turbobridge_accountid'),
                    "email"        => config('app.turbobridge_email'),
                    "password"     => config('app.turbobridge_password'),
                    "conferenceID" => $conferenceID,
                    "pin"          => $pin
                )
            )
        );
        $tbg = new \App\Models\TurboBridge\TurboBridgeGeneral();
        $data = $tbg->post($apiURL, $request);
        return $data;
    }


}
