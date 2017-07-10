<?php
if (!defined('BASEPATH'))
    exit ('No direct script access allowed');

class Fs_cdr extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('Fs_cdr_model');
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->helper(array('url','language'));

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
        if (!$this->ion_auth->logged_in())
        {
            //redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        elseif (!$this->ion_auth->is_admin()) //remove this elseif if you want to enable this for non-admins
        {
            //redirect them to the home page because they must be an administrator to view this
            return show_error('You must be an administrator to view this page.');
        }
    }

    function get_previous_month_stream_stats($historical_month)
    {
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($this->Fs_cdr_model->get_previous_month_stream_stats($historical_month)));
    }

}