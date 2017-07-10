<?php

namespace App\Models\TurboBridge;

class TurboBridgeBridge {

    public function __construct()
    {
    }

    public function create_bridge($bridge_name, $email)
    {
        $apiURL  = "https://api.turbobridge.com/4.1/Bridge";

        $requests[] =  array(
            "setBridge" => array(
                "conferenceID" => "",
                "name" => $bridge_name,
                "editMode" => "createOnly",
                "maxPendingTime" => "7200",
                "confEventsUrl" => "http://api.aleph-com.net/api/conference/turbobridge/action",
                "enableReports" => "1",
                "confMode" => "qa",
                "confStart" => "hostJoins",
                "confEnd" => "15",
                "entryChimes" => "none",
                "exitChimes" => "none",
                "tollFreeFlag" => "0",
                "enableReports" => "1",
                "tollNumber" => "+16195500989",
                "announceCount" => "0",
                "conferenceID" => "",
                "pin" => "",
                "notificationList" => array("darren@aleph-com.net", $email)
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
        //$tbg = new
        $data = \App\Models\TurboBridge\TurboBridgeGeneral::post($apiURL, $request);
        /*log_message('debug',
            print_r($data->response->responseList->requestItem[0]->result->bridge,TRUE)
        ); */
        $bridge = $data->response->responseList->requestItem[0]->result->bridge;
        //print_r($bridge);
        $this->email_info($bridge->conferenceID,"darren@aleph-com.net");
        $this->email_info($bridge->conferenceID,$email);
        return $bridge;
    }

    public function email_info($conferenceID, $email)
    {
        $conferenceID = (string)$conferenceID;
        $apiURL  = "https://api.turbobridge.com/4.1/Bridge";

        $requests[] =  array(
            "emailInfo" => array(
                "conferenceID" => $conferenceID,
                "emailTemplate" => "bridgeInfo",
                "email" => $email
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

        $data = \App\Models\TurboBridge\TurboBridgeGeneral::post($apiURL, $request);
        return $data;
    }

    public function get_bridge($conferenceID = null) {

        $conferenceID = (string)$conferenceID;
        $apiURL  = "https://api.turbobridge.com/4.0/Bridge";

        $requests = null;

        if ($conferenceID) {
            $requests[] =  array(
                "getBridges" => array(
                    "conferenceID" => $conferenceID,
                    "getNotificationList" => 1
                )
            );
        } else {
            $requests[] =  array(
                "getBridges" => array(
                    "getNotificationList" => 1
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

        $tbg = new \App\Models\TurboBridge\TurboBridgeGeneral();
        $data = $tbg->post($apiURL, $request);
        return $data;

    }

}
