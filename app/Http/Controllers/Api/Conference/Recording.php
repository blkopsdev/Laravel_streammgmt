<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Recording extends CI_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->database();
        $this->load->model('Recordings_model');
    }

    public function index()
    {
       echo 'Nothing to see here';
    }

    public function distribute($link, $bridge, $conference_id, $date)
    {
        $data = new stdClass;
        $data->conference_id = $conference_id;
        $data->bridge_id = $bridge;
        $data->started_date = $date;
        $data->link = $link;
        $data->page_title = "Aleph Communications Conference Recording Distribution";
        $this->load->view('conference/header', $data);
        $this->load->view('conference/recording/distribute', $data);
    }

    public function order_submit() {
        $data = new stdClass;
        $data->conference_id = $this->input->post('conference_id');
        $data->email_address = $this->input->post('email_address');
        $data->listens = $this->input->post('listens');
        $data->expiration_date = $this->input->post('expiration_date');
        $data->recording = $this->input->post('recording');
        $output = $this->Recordings_model->create($data);
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($output));
    }

    public function play($pin) {
        $now = new DateTime();
        $results = $this->Recordings_model->get_play($pin);
        if ($results) {
            $expiration = new DateTime($results->recording_expiration);
            if ($results->recording_listens_used >= $results->recording_listens) {
                $results->status = 'ERR';
                $results->recording_url = 'http://api.aleph-com.net/assets/recording/pin_used_maximum.mp3';
            } else if ($expiration < $now) {
                $results->status = 'ERR';
                $results->recording_url = 'http://api.aleph-com.net/assets/recording/pin_expired.mp3';
            } else {
                $results->status = 'OK';
                $this->Recordings_model->update($pin,$results->recording_listens_used + 1);
            }
        } else {
            $results = new stdClass;
            $results->status = 'ERR';
            $results->recording_url = 'http://api.aleph-com.net/assets/recording/pin_not_found.mp3';
        }
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($results, JSON_UNESCAPED_SLASHES));
    }
}