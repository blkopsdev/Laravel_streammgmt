<?php
if (!defined('BASEPATH'))
  exit ('No direct script access allowed');

class Manage_conference extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->database();
    $this->load->helper('url');
    $this->load->library('Grocery_CRUD');
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

    public function view() {
        $this->load->view('manage/header');
        $this->load->view('manage/conference_manage');
    }

    public function get_conference($conference_id)
    {

    }

    public function order() {
        $this->load->view('manage/header');
        $this->load->view('manage/conference_order');
    }

  public function index() {
    $crud = new grocery_CRUD();
    $crud->set_theme('bootstrap');
    $crud->set_table('conference');
    $crud->set_subject('Conference Bridges');
    $crud->field_type('stream', 'dropdown', array('1' => 'No      ', '2' => 'Yes      '));
    $crud->field_type('billing', 'dropdown', array('1' => 'Not Setup      ', '2' => 'Setup      ', '3' => 'No Charge      '));
    $crud->set_relation('salesperson', 'salesperson', 'name');
    $crud->set_relation('stream_mount','mounts','mount');
    $crud->unset_columns('notes');
    $output = $crud->render();
    $this->load->view('manage/header', $output);
    $this->load->view('manage/conference_view', $output);
  }

  function salesperson() {
    $crud = new grocery_CRUD();
   $crud->set_theme('bootstrap');
    $crud->set_table('salesperson');
    $output = $crud->render();
    $this->load->view('manage/header', $output);
    $this->load->view('manage/conference_view', $output);
  }

  function mount() {
    $crud = new grocery_CRUD();
    $crud->set_theme('bootstrap');
    $crud->set_table('mounts');
    //$crud->set_relation('conference');
    $crud->field_type('codec', 'dropdown', array('PCMU' => 'PCMU', 'G722' => 'G722'));
    $crud->field_type('fs_connect_type', 'dropdown', array('mod_shout' => 'mod_shout', 'mod_vlc' => 'mod_vlc'));
    $output = $crud->render();
    $this->load->view('manage/header', $output);
    $this->load->view('manage/conference_view', $output);
  }

  function cdr() {
    $crud = new grocery_CRUD();
    $crud->set_theme('bootstrap');
    $crud->set_table('cdr');
    $crud->unset_operations();
    $crud->set_primary_key('uuid');
    $output = $crud->render();
    $this->load->view('manage/header', $output);
    $this->load->view('manage/conference_view', $output);
  }

  function cdr_billing() {
    $this->load->view('manage/header');
    $this->load->view('manage/cdr_billing');
  }

  function vendor() {
    $crud = new grocery_CRUD();
    $crud->set_theme('bootstrap');
    $crud->set_table('vendor');
    $output = $crud->render();
    $this->load->view('manage/header', $output);
    $this->load->view('manage/conference_view', $output);
  }

  function did() {
    $crud = new grocery_CRUD();
    $crud->set_theme('bootstrap');
    $crud->set_table('dids');
    $crud->field_type('type', 'dropdown', array('0' => 'N/A', '1' => 'Listener', '2' => 'Host', '3' => 'PBX'));
    $crud->field_type('billing', 'dropdown', array('1' => 'Flat Rate', '2' => 'Per Minute', '3' => 'Per Channel'));
    $crud->field_type('advertise','dropdown',  array('1' => 'private', '2' => 'public'));
    $crud->unset_columns('uri','audio_level_read','audio_level_write','notes','bypass_media','conference_pin');
    $crud->set_relation('conference', 'conference', '{conference_id}: {name}');
    $crud->set_relation('vendor', 'vendor', 'name');
    $output = $crud->render();
    $this->load->view('manage/header', $output);
    $this->load->view('manage/conference_view', $output);
  }

  function recording() {
    $crud = new grocery_CRUD();
    $crud->set_theme('bootstrap');
    $crud->set_table('recordings');
    $output = $crud->render();
    $this->load->view('manage/header', $output);
    $this->load->view('manage/conference_view', $output);
  }

    public function migrate()
    {
        $this->load->library('migration');
        $this->output->enable_profiler(TRUE);

        if ($this->migration->current() === FALSE)
        {
                show_error($this->migration->error_string());
        }
    }

  	public function json_LCM_getConferenceInfo($conferenceID = 0)
	{
		$request_array = array(
			'requestType' => 'getConferenceInfo',
			'conferenceID' => $conferenceID
		);
		$this->output
    			->set_content_type('application/json')
    			->set_output(json_encode($this->native_curl('LCM',$request_array)));
	}

	public function json_LCM_getConferences()
	{
		$request_array = array(
			'requestType' => 'getConferences'
		);
		$this->output
    			->set_content_type('application/json')
    			->set_output(json_encode($this->native_curl('LCM',$request_array)));
	}

	public function json_Bridge_getBridges()
	{
		$request_array = array(
			'requestType' => 'getBridges',
			'getNotificationList' => '1',
			'resultCount' => '1000'
		);
		$this->output
    			->set_content_type('application/json')
    			->set_output(json_encode($this->native_curl('Bridge',$request_array)));
	}

    function native_curl($target, $array)
    {
    	$array['outputFormat'] = 'json';
    	$array['authAccountEmail'] = 'darren%40aleph-com.net';
    	$array['authAccountPassword'] = 'Dkw4569%21';
    	$array['authAccountPartnerID'] = 'aleph';
    	$array['authAccountAccountID'] = '854518363';
    //	$array['getNotificationList'] = 1;

    	$postData = '';
    	//create name value pairs seperated by &
    	foreach($array as $k => $v)
    	{
          		$postData .= $k . '='.$v.'&';
    	}
    	rtrim($postData, '&');

        	// Set up and execute the curl process
        	$curl_handle = curl_init();
        	curl_setopt($curl_handle, CURLOPT_URL, 'https://api.turbobridge.com/'.$target);
        	curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        	curl_setopt($curl_handle, CURLOPT_POST, 1);
    	curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $postData);
    	$buffer = curl_exec($curl_handle);
    	//var_dump($buffer);
    	curl_close($curl_handle);
    	return json_decode($buffer);
    }

}
