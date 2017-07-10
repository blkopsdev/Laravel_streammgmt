<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mount;
use App\Models\Did;

class ConfigurationController extends Controller {

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

	public function icecast2() {
    $data = new \stdClass();
    $data->location = 'Private';
    $data->admin = 'support@aleph-com.net';
		$data->hostname = 'icecast.aleph-com.net';
    $data->mounts = \App\Models\Mount::all();
  	return view('config.icecast2')->with(['data'=>$data]);
	}

  public function freeswitch_dialplan() {
    $data = new \stdClass();
    $data->dids = \App\Models\Did::all();
    return view('config.freeswitch_dialplan')->with(['data'=>$data]);
  }

}
