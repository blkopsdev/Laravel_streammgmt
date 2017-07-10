<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Control extends CI_Controller {

        public function index()
        {
                $this->load->view('control_message');
        }

        public function connect($source,$dest,$dest_pin,$length)
        {
                header('Access-Control-Allow-Origin: *');
                header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		$CID_Name = "Anonymous";
		$CID_Number = "0000000";

                require_once('/usr/share/php/ESL.php');
                $source = preg_replace("/[^0-9]/","",$source);
                $dest = preg_replace("/[^0-9]/","",$dest);
                $dest_pin = preg_replace("/[^0-9]/","",$dest_pin);
                $length = preg_replace("/[^0-9]/","",$length);

  		$connection_string = "{origination_caller_id_name='" . $CID_Name . "',origination_caller_id_number=" . $CID_Number 
			. ",execute_on_answer='sched_hangup +" . $length * 60 . "'}sofia/external/aleph00#" . $source 
			. "@turbobridge.com:5060 &bridge(sofia/external/aleph00#" . $dest . "*" . $dest_pin . "@turbobridge.com:5060)";

	$sock = new ESLconnection('localhost', '8021', 'ClueCon');
$res = $sock->bgapi('originate',$connection_string);
printf("%s\n", $res->getBody());

                print "OK";
        }
}
?>
