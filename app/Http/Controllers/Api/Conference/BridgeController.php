<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mount;
use App\Models\Did;

class BridgeController extends Controller {

	/**
 * Create a new controller instance.
 *
 * @return void
 */
	public function __construct()
	{
			//$this->middleware('auth');
	}

    /*public function action_post($conferenceID, $pin)
    {
        $data = $this->turbobridge_authorize_model->bridge($conferenceID, $pin);
    }*/

    public function create(Request $request)
    {
        //$this->output->enable_profiler(TRUE);

        $conference_name = $request->input('conference_name');
        $email = $request->input('email');
        $location = $request->input('location');
        $name_short = $request->input('name_short');
        $max_listeners = $request->input('max_listeners');
        $mount_password = $request->input('mount_password');

        log_message('debug', "Conference Name: " . $conference_name . " Email: " . $email);

        //$data = $this->turbobridge_bridge_model->create_bridge($conference_name . ", " . $location, $email);

				$tbb = new \App\Models\TurboBridge\TurboBridgeBridge;
				$data = $tbb->create_bridge($conference_name . ', ' . $location, $email);
				
				$conference = new \App\Models\Conference;

        $conference->name => $conference_name;
        $conference->conference_id = $data->conferenceID;
        $conference->host_pin = 'pin';
        $conference->billing = '1';
        $conference->stream_mount = $data->conferenceID;
				$conference->notes = 'Email: ' . $email;
        $conference->location = $location;

        $this->Conferences_model->insert($insert_data);

				$mount = new \App\Models\Mount;
				$mount->mount = $data->conferenceID,
        $mount->description = $conference_name;
        $mount->conference = $data->conferenceID;
        $mount->pin = 'pin';
        $mount->codec = 'G722';
        $mount->fs_connect_type = 'mod_shout';
        $mount->mount_username = 'source';
        $mount->max_listeners = $max_listeners;
        $mount->mount_password = $mount_password;
        $mount->alias = $name_short;
        $mount->bitrate = '64';
        $mount->audio_read = '2';
        $mount->authorize = '0';
        //$this->Mounts_model->insert($insert_data);
				return ($mount);

    }

}
