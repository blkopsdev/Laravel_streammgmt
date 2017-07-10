<?php

namespace App\Models\Icecast;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Nathanmac\Utilities\Parser\Parser;

class MountClients {

    public function __construct()
    {

    }

    public function list($mount) {
        $data = new \stdClass();
        $data->error = null;

        $timeout = 60;

        //$requestBody = json_encode($request);

        $client = new Client(['auth' => [config('app.icecast_admin_username'), config('app.icecast_admin_password')]]); //GuzzleHttp\Client
        $response = $client->get('http://' . config('app.icecast_hostname'). ':' . config('app.icecast_port') . '/admin/listclients?mount=/' . $mount);
        $payload = $response->getBody()->getContents();

        $parser = new Parser();
        $xml = $parser->xml($payload);

        return $xml;

    }

}
