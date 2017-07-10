<?php

namespace App\Models\TurboBridge;

class TurboBridgeCdr {

    public function __construct()
    {

    }

    public function get_call_cdr(string $cdrID, $limit = 1000, $offset = 0, $tz) {

        //$cdrID = (string) $cdrID;
        $apiURL  = "https://api.turbobridge.com/4.1/CDR";

        $requests = null;

        $requests[] =  array(
            "getConferenceCallCDR" => array(
                "cdrID" => $cdrID,
                "startOffset" => $offset,
                "resultCount" => $limit,
                "timezone" => $tz
            )
        );

        $request = array(
            "request" => array(
                "authAccount" => array(
                  "partnerID"    => config('app.turbobridge_partnerid'),
                  "accountID"    => config('app.turbobridge_accountid'),
                  "email"        => config('app.turbobridge_email'),
                  "password"     => config('app.turbobridge_password'),
                ),
                "requestList" => $requests
            )
        );


        $data = \App\Models\TurboBridge\TurboBridgeGeneral->post($apiURL, $request);
        return $data;

    }

    public function get_conference_cdr($cdrID = null, $conferenceID, $limit = 1000, $offset = 0,$tz)  {

        $cdrID = (string)$cdrID;
        $apiURL  = "https://api.turbobridge.com/4.1/CDR";

        $requests = null;
        if ($cdrID) {
            $requests[] =  array(
                "getConferenceCDR" => array(
                    "conferenceID" => $conferenceID,
                    "cdrID" => $cdrID,
                    "startOffset" => $offset,
                    "resultCount" => $limit,
                    "timezone" => $tz
                )
            );
        } else {
            $requests[] =  array(
                "getConferenceCDR" => array(
                    "conferenceID" => $conferenceID,
                    "startOffset" => $offset,
                    "resultCount" => $limit,
                    "timezone" => $tz
                )
            );
        }

        $request = array(
            "request" => array(
                "authAccount" => array(
                  "partnerID"    => config('app.turbobridge_partnerid'),
                  "accountID"    => config('app.turbobridge_accountid'),
                  "email"        => config('app.turbobridge_email'),
                  "password"     => config('app.turbobridge_password'),
                ),
                "requestList" => $requests
            )
        );

        $data = \App\Models\TurboBridge\TurboBridgeGeneral->post($apiURL, $request);
        return $data;

    }

}
