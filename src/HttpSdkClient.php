<?php
/**
 * Created by PhpStorm.
 * User: puncoz
 * Date: 2024/05/27
 * Time: 10:56 PM
 */

namespace App;

use Guzzle\Http\Client;
use Guzzle\Http\Message\Response;

class HttpSdkClient implements HttpSdkClientInterface
{
    protected Client $client;

    public function __construct()
    {
        $this->headers = [
            'accept'       => 'application/json',
            'content-type' => 'application/json',
            'base_uri'     => 'http://127.0.0.1:8080',
        ];
    }

    public function initiate(): Client
    {
        return new Client([
            'headers' => $this->headers,
        ]);
    }

    public function setReqAuth(bool $reqAuth)
    {
        $this->headers = [...$this->headers, 'authorization' => 'Basic '.base64_encode('admin:admin')];
    }

    public function get(string $url): Response
    {
        $client = $this->initiate();
        $res    = $client->get($url);

        return $res->getResponse();
    }
}
