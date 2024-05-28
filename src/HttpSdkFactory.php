<?php
/**
 * Created by PhpStorm.
 * User: puncoz
 * Date: 2024/05/28
 * Time: 10:04 PM
 */

namespace App;

class HttpSdkFactory
{
    public static function create(): HttpService
    {
        $httpClient = new HttpClient();

        return new HttpService($httpClient);
    }
}
