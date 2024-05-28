<?php
/**
 * Created by PhpStorm.
 * User: puncoz
 * Date: 2024/05/28
 * Time: 9:57 PM
 */

namespace Test;

use App\HttpSdk;
use PHPUnit\Framework\TestCase;

class HttpSdkTest extends TestCase
{
    protected HttpSdk $httpSdk;

    public function testGetPosts()
    {
        $response = $this->httpSdk->getPosts();
        $this->assertIsArray($response);
    }

    public function testGetPostDetail()
    {
        $response = $this->httpSdk->getPostDetail(1);
        $this->assertIsArray($response);
    }

    protected function setUp(): void
    {
        $this->httpSdk = new HttpSdk();
    }
}
