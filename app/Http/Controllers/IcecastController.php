<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mount;
use App\Models\Did;

class IcecastController extends Controller {

	/**
 * Create a new controller instance.
 *
 * @return void
 */
	public function __construct()
	{
			//$this->middleware('auth');
	}

    public function index($alias = '')
    {
        redirect('http://icecast.aleph-com.net/index.php/stream/listen/');
    }


    //<!--action=mount_add&mount=/live&server=icecast.example.org&port=8000 -->
    public function mount_add(Request $request) {
        log_message('debug', 'MOUNT ADD');
        log_message('debug', 'Mount: ' . $this->input->post('mount'));
        print 'OK';
    }

    //<!-- action=mount_remove&mount=/live&server=icecast.example.org&port=8000 -->
    public function mount_remove(Request $request) {
        log_message('debug', 'MOUNT ADD');
        log_message('debug', 'Mount: ' . $this->input->post('mount'));
        print 'OK';
    }

    //<!-- action=listener_add&server=icecast.example.org&port=8000&
    //           client=1&mount=/live&user=&pass=&ip=127.0.0.1&agent=My%20player -->
    public function listener_add(Request $request) {
        log_message('debug', 'LISTENER ADD');
        log_message('debug', 'Mount: ' . $this->input->post('mount'));
        log_message('debug', 'Client ID: ' . $this->input->post('client'));
        log_message('debug', 'User: ' . $this->input->post('user'));
        log_message('debug', 'Pass: ' . $this->input->post('pass'));
        log_message('debug', 'IP: ' . $this->input->post('ip'));
        log_message('debug', 'Agent: ' . $this->input->post('agent'));
        header('icecast-auth-user: 1');
        print 'OK';
    }

    //<!-- action=listener_remove&server=icecast.example.org&port=8000&
    //     client=1&mount=/live&user=&pass=&duration=3600&ip=127.0.0.1&agent=My%20player -->
    public function listener_remove(Request $request) {
        log_message('debug', 'LISTENER REMOVE');
        log_message('debug', 'Mount: ' . $this->input->post('mount'));
        log_message('debug', 'Client ID: ' . $this->input->post('client'));
        log_message('debug', 'User: ' . $this->input->post('user'));
        log_message('debug', 'Pass: ' . $this->input->post('pass'));
        log_message('debug', 'Duration: ' . $this->input->post('duration'));
        log_message('debug', 'IP: ' . $this->input->post('ip'));
        log_message('debug', 'Agent: ' . $this->input->post('agent'));
        print 'OK';

    }

    //<!-- action=stream_auth&mount=/stream.ogg&ip=192.0.2.0&server=icecast.example.org&
    //  port=8000&user=source&pass=password&admin=1 -->

    public function stream_auth(Request $request) {
        log_message('debug', 'STREAM AUTH');
        log_message('debug', 'Username: ' . $this->input->post('user'));
        log_message('debug', 'Password: ' . $this->input->post('pass'));
        log_message('debug', 'Stream: ' . $this->input->post('mount'));
        $data = new stdClass;
        $mount_name = $this->input->post('mount');
        $mount_name = ltrim($mount_name,'/');
        $where = array(
            'mount' => $mount_name,
            'mount_username' => $this->input->post('user'),
            'mount_password' => $this->input->post('pass')
        );
        $row = $this->mounts_model->get_one($where);
        if ($row) {
            // Authenticated
            header('icecast-auth-user: 1');
            print 'OK';
        } else {
            // Not Authenticated
            header('icecast-auth-user: 0');
            print 'NOT AUTHORIZED';
        }

    }


}
