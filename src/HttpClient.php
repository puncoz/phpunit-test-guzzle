<?php
/**
 * Created by PhpStorm.
 * User: puncoz
 * Date: 2024/05/27
 * Time: 10:56 PM
 */

namespace App;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class HttpClient implements HttpClientInterface
{
    protected Client $client;

    public function __construct(Client $client = null)
    {
        $this->client = $client ?? new Client([
            'base_uri' => 'https://jsonplaceholder.typicode.com',
            'headers'  => [
                'accept'       => 'application/json',
                'content-type' => 'application/json',
            ],
        ]);
    }

    public function request(string $method, string $endpoint, array $options = []): array
    {
        try {
            $response     = $this->client->request($method, $endpoint, $options);
            $responseBody = $response->getBody();

            return json_decode($responseBody, true);
        } catch (GuzzleException $exception) {
            return [
                'error' => $exception->getMessage(),
            ];
        }
    }
}
