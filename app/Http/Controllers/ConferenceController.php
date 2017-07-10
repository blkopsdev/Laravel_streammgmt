<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mount;
use App\Models\Did;

class ConferenceController extends Controller {

	/**
 * Create a new controller instance.
 *
 * @return void
 */
	public function __construct()
	{
			//$this->middleware('auth');
	}

    public function index()
    {

    }

    public function manage(Request $request, $conferenceID = '', $pin = '')
    {
        if ($conferenceID == '') {
          return view('conference.login')->with(['data'=>$data]);
        } else {
          $data = new \stdClass();
          $bridge_details = new \stdClass();
          $tbb = new \App\Models\TurboBridge\TurboBridgeBridge();
          $bridge = $tbb->get_bridge($conferenceID);
          //dd($bridge);
          if ($bridge->authToken) {
              //log_message('debug', "BRIDGE DETAILS");
              //log_message('debug',print_r($bridge,TRUE));
              $bridge_details = $bridge->response->responseList->requestItem[0]->result->bridge[0];
              //log_message('debug', print_r($bridge_details,TRUE));
          } else {
              //log_message('error', "Unable to lookup bridge");
          }

          $tam = new \App\Models\TurboBridge\TurboBridgeAuthorize();
          $data->bridge = $tam->bridge($conferenceID, $pin);
          $data->bridge_details = $bridge_details;
          $data->page_title = "Aleph Communications Conference Management";
          //log_message('debug',print_r($data,TRUE));
          dd($data);
          if ($bridge_details->pin == $pin) {
              return view('conference.lcm')->with(['data'=>$data]);
          } else {

          }
        }
    }
}
