<?php

namespace App\Http\Controllers\Api\Conference;

use App\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TurboBridge\TurboBridgeBridge;
use App\Models\Mount;
use App\Models\Did;
use Nathanmac\Utilities\Parser\Parser;

class TurbobridgeActionController extends Controller {

    public function index(Request $request)
    {

        $parser = new Parser();
        $xml = $parser->xml($request->getContent());

        //$xml = simplexml_load_string(file_get_contents('php://input'));
        /*log_message('debug',print_r($xml,TRUE) . "\n\n");
        log_message('debug', 'ConferenceID: ' . $xml['bridgeID']);
        log_message('debug', 'Status: ' . $xml['status']);
        log_message('debug', 'Current Participants: ' . $xml['currentParticipants']);
        log_message('debug', 'Peak Participants: ' . $xml['peakParticipants']);*/

        $bridgeID = (string)$xml['bridgeID'];

        $conference = \App\Models\Conference::where('conference_id', '=', $bridgeID)->first();
        $conference->status = $xml['status'];
        $conference->current_participants = $xml['currentParticipants'];
        $conference->peak_participants = $xml['peakParticipants'];
        $conference->save();

        $tbb = new \App\Models\TurboBridge\TurboBridgeBridge;

        if ($xml['status'] == 'cdr_ready') {

          $turboBridgeCdr = new \App\Models\TurboBridge\TurboBridgeCdr;

            $data = new \stdClass();

            $bridge = $tbb->get_bridge($bridgeID);
            if ($bridge->authToken) {
                $bridge_details = $bridge->response->responseList->requestItem[0]->result->bridge[0];
                log_message('debug', print_r($bridge_details,TRUE));
            } else {
                log_message('error', "Unable to lookup bridge");
            }

            //cdrID]
            list($accountID, $cdrID) = explode("-", (string) $xml['cdrID']);
            $call_cdr = $this->turbobridge_cdr_model->get_call_cdr($cdrID,1000,0,$bridge_details->timezone);
            $call_cdr =  $call_cdr->response->responseList->requestItem[0]->result;

            $conference_cdr = $turboBridgeCdr->get_conference_cdr($cdrID,$bridgeID,1000,0,$bridge_details->timezone);
            $conference_cdr =  $conference_cdr->response->responseList->requestItem[0]->result;

            log_message('debug', print_r($call_cdr,TRUE));
            log_message('debug', print_r($conference_cdr, TRUE));

            $data->call = $xml;
            $data->bridge_details = $bridge_details;
            $data->call_cdr = $call_cdr;
            $data->conference_cdr = $conference_cdr;

          /*  $this->email->from('support@aleph-com.net', 'Aleph Communications');
            $this->email->to($bridge_details->notificationList);
            $this->email->set_mailtype('html');

            $this->email->subject('Aleph Communications Conference Report for ' . $bridge_details->name
                . ' ' . $conference_cdr->conferenceCDR[0]->conferenceID
                . ' ' . $conference_cdr->conferenceCDR[0]->startedDate . ' ' . $bridge_details->timezone );
            $this->email->message($this->load->view('email/conference_report', $data, TRUE));

            $this->email->send();*/
            // Conference has ended.
        } /*else if ($xml['status'] == 'cdr_ready') {
             log_message('debug',print_r($xml,TRUE) . "\n\n");
        }  */

    }

}
