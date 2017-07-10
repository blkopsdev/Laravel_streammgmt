<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Transcription extends CI_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->database();

    }

    public function index()
    {
        echo 'Nothing to see here';
    }

    public function order($duration, $link, $bridge, $conference_id, $date)
    {
        $data = new stdClass;
        $data->conference_duration = $duration;
        $data->link = $link;
        $data->conference_id = $conference_id;
        $data->transcription_duration = 0;
        if ($duration / 60 >= 30) {
            $data->transcription_duration = ceil($duration / 60);
        } else {
            $data->transcription_duration = 30;
        }
        $data->bridge_id = $bridge;
        $data->started_date = $date;
        $data->page_title = "Aleph Communications Conference Transcription Order";
        $this->load->view('conference/header', $data);
        $this->load->view('conference/transcription/order', $data);
    }

    public function order_submit()
    {
        $this->load->model('Turbobridge_bridge_model');
        $bridge_details = new stdClass;
        $bridge = $this->Turbobridge_bridge_model->get_bridge($this->input->post('conference_id'));
        if ($bridge->authToken) {
            log_message('debug', "BRIDGE DETAILS");
            log_message('debug',print_r($bridge,TRUE));
            $bridge_details = $bridge->response->responseList->requestItem[0]->result->bridge[0];
            log_message('debug', print_r($bridge_details,TRUE));
        } else {
            log_message('error', "Unable to lookup bridge");
            echo 'Error Placing Order.';
            die;
        }
        $data = new stdClass;
        $data->conference_id = $this->input->post('conference_id');
        $data->email_address = $this->input->post('email_address');
        $data->full_name = $this->input->post('full_name');
        $data->mailing_address = $this->input->post('mailing_address');
        $data->city = $this->input->post('city');
        $data->state = $this->input->post('state');
        $data->zip = $this->input->post('zip');
        $data->transcription_quality = $this->input->post('transcription_quality');
        $data->recording = $this->input->post('recording');
        echo "Order has been submitted. You should receive a copy of the email order soon. ";
    }


}