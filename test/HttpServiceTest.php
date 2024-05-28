<?php
/**
 * Created by PhpStorm.
 * User: puncoz
 * Date: 2024/05/27
 * Time: 11:08 PM
 */

namespace Test;

use App\HttpClientInterface;
use App\HttpService;
use PHPUnit\Framework\TestCase;

class HttpServiceTest extends TestCase
{
    protected HttpClientInterface $httpClientMock;
    protected HttpService         $httpService;

    public function testGetPosts()
    {
        $expectedResponse = [
            [
                'userId' => 1,
                'id'     => 1,
                'title'  => "Hello World!",
                'body'   => "Hello world content.",
            ],
        ];

        // mocking the response from httpClient
        // @formatter:off
        $this->httpClientMock->expects($this->once())
                             ->method('request')
                             ->with('GET', '/posts')
                             ->willReturn($expectedResponse);
        // @formatter:on

        $response = $this->httpService->getPosts();
        $this->assertEquals($expectedResponse, $response);
    }

    public function testGetPostDetail()
    {
        $testPostId       = 1;
        $expectedResponse = [
            'userId' => 1,
            'id'     => 1,
            'title'  => "Hello World!",
            'body'   => "Hello world content.",
        ];

        // mocking the response from httpClient
        // @formatter:off
        $this->httpClientMock->expects($this->once())
                             ->method('request')
                             ->with('GET', "/posts/{$testPostId}")
                             ->willReturn($expectedResponse);
        // @formatter:on

        $response = $this->httpService->getPostDetail($testPostId);
        $this->assertEquals($expectedResponse, $response);
    }

    protected function setUp(): void
    {
        $this->httpClientMock = $this->createMock(HttpClientInterface::class);
        $this->httpService    = new HttpService($this->httpClientMock);
    }
}
