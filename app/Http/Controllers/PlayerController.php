<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mount;
use App\Models\Did;

class PlayerController extends Controller {

	protected $data = []; // the information we send to the view

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
		redirect('http://icecast.aleph-com.net/stream/listen/'.$alias);
	}

	public function m3u($alias = '')
	{
		if ($alias != '')
		{
			$mount = $this->mount->lookup_by_alias($alias);
			if (isset($mount))
			{
				$data = "http://icecast.aleph-com.net:8000/" . $mount->mount . "\n\n";
				force_download($alias . '.m3u', $data);
			}
		}
	}

	public function status(Request $request, $mount) {
		$server = 'icecast.aleph-com.net:8000';
		$user = 'admin';
		$password = 'Dkw1234!';
		$data = '';
		$mount = '/' . $mount;

		$fp = fopen("http://" . $user . ":" . $password . "@" . $server ."/admin/stats","r")
         or die("Error reading Icecast data from " . $server . ".");

	  while(!feof($fp))
		{
     $data .= fread($fp, 8192);
	 }

	 fclose($fp);

	 $results = new stdClass();
	 $results->status = 0;
	 $results->message = 'Stream is Offline';
//	 $results->mounts = array();

	 $xml = simplexml_load_string($data);

	 foreach ($xml->source as $data) {
//		$results->mounts[] = $data->attributes()->mount;
//		$results->mounts[] = $data->server_type;
		 if ($data->attributes()->mount == $mount) {
		 	if ($data->server_type != '') {
				$results->status = 1;
				$results->message = 'Stream is Online';
		 	}
		 }
	 }
	header("Access-Control-Allow-Methods: GET, OPTIONS");
	header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
	header("Access-Control-Allow-Origin: *");
	 $this->output->set_content_type('application/json')->set_output(json_encode($results));
	}

	public function lookup($id, $id1 = null, $id2 = null, $id3 = null)
	{
	    //$post = $this->input->post('id');
        if ($id3) {
            $id = $id3;
        } elseif ($id2) {
            $id = $id2;
        }

	 	$results = new stdClass();
        log_message('error', $id);
        $id = strtolower(trim(urldecode($id)));
		$mount = $this->mount->get_one(array('alias' => $id));
		if (!isset($mount))
		{
			$mount = $this->mount->get_one(array('conference' => $id));
		}
        if (!isset($mount))
        {
            $query = explode ( '/' , $id );
            $result = array_values(array_slice($query, -1))[0];
            $mount = $this->mount->get_one(array('conference' => $result));
        }
		if (isset($mount))
		{
			$results->status = 1;
			$conference = $this->conference->get_one(array('stream_mount' => $mount->mount));
			//$results->details = $conference;
			$results->url = "http://icecast.aleph-com.net:8000/" . $mount->mount;
			$results->name = $conference->name;
			$results->location = $conference->location;

			$dids = $this->did->get(array('conference' => $conference->id, 'advertise' => 2));
			if (isset($dids[0])) {
				$results->number = $dids[0]->did;
				$results->number_location = $dids[0]->geo_location;
			} else {
				$results->number = "N/A";
				$results->number_location = "N/A";
			}

//			$results->dids = $dids;
		} else {
			$results->status = 0;
			$results->message = 'Conference Not Found. ';
		}
		header("Access-Control-Allow-Methods: GET, OPTIONS");
		header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
		header("Access-Control-Allow-Origin: *");
	 	$this->output->set_content_type('application/json')->set_output(json_encode($results));
	}

	public function listen(Request $request, $alias = '', $version = 'v1')
	{
		if ($alias != '')
		{
			$mount = \App\Models\Mount::ofAlias($alias)->first();
			if ($mount)
			{
			  $data = [];
				$data['conference'] = '';
        $conference = $mount->conference()->first();
        $dids = $conference->did()->where('advertise', 2)->get();
				$data['mount'] = $mount;
				$data['dids'] = $dids;
        if ($version == 'v1') {
			    return view('stream.client_v1', $data);
        } else {
					return view('stream.client_v2', $data);
        }
			} else {
				return view('stream.none', $data);
			}
		} else {
			return view('stream.none', $data);
		}
	}

	public function join()
	{
		$this->load->view('join.php');
	}
}
