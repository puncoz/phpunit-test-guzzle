<?php
/**
 * Created by PhpStorm.
 * User: puncoz
 * Date: 2024/05/27
 * Time: 11:08 PM
 */

namespace Test;

use App\HttpSdkClientInterface;
use App\HttpService;
use Guzzle\Http\Message\Response;
use Mockery as m;
use PHPUnit\Framework\TestCase;

class HttpServiceTest extends TestCase
{

    public function testGetNews()
    {
        $client = m::mock(HttpSdkClientInterface::class);
        $client->shouldReceive('setReqAuth')->once();
        $client->shouldReceive('get')->once()->andReturn(new Response(200, [], '{"title":"test"}'));


        $lib = new HttpService($client);
        dd($lib->getNews());
    }
}
