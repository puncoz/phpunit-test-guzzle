<?php
/**
 * Created by PhpStorm.
 * User: puncoz
 * Date: 2024/05/28
 * Time: 9:46 PM
 */

namespace Test;

use App\HttpClient;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class HttpClientTest extends TestCase
{
    protected Client     $httpClientMock;
    protected HttpClient $httpClient;

    public function testRequestSuccess()
    {
        $method   = "GET";
        $endpoint = "/test";
        $options  = ['query' => ['key' => 'value']];

        $responseBody     = json_encode(['data' => 'success response']);
        $expectedResponse = json_decode($responseBody, true);

        // @formatter:off
        $this->httpClientMock->expects($this->once())
                             ->method('request')
                             ->with($method, $endpoint, $options)
                             ->willReturn(new Response(200, [], $responseBody));
        // @formatter:on

        $response = $this->httpClient->request($method, $endpoint, $options);
        $this->assertEquals($expectedResponse, $response);
    }

    public function testRequestFailure()
    {
        $method   = "GET";
        $endpoint = "/test";
        $options  = ['query' => ['key' => 'value']];

        $errorMessage     = 'Error: Something went wrong.';
        $expectedResponse = ['error' => $errorMessage];

        // @formatter:off
        $this->httpClientMock->expects($this->once())
                             ->method('request')
                             ->with($method, $endpoint, $options)
                             ->willThrowException(new RequestException($errorMessage, new Request($method, $endpoint, $options)));
        // @formatter:on

        $response = $this->httpClient->request($method, $endpoint, $options);
        $this->assertEquals($expectedResponse, $response);
    }

    protected function setUp(): void
    {
        $this->httpClientMock = $this->createMock(Client::class);
        $this->httpClient     = new HttpClient($this->httpClientMock);
    }
}
