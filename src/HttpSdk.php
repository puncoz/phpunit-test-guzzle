<?php
/**
 * Created by PhpStorm.
 * User: puncoz
 * Date: 2024/05/27
 * Time: 11:00 PM
 */

namespace App;

class HttpSdk
{
    protected HttpService $service;

    public function __construct()
    {
        $client = new HttpSdkClient();

        $this->service = new HttpService($client);
    }

    public function __call(string $name, array $arguments)
    {
        return call_user_func_array([$this->service, $name], $arguments);
    }
}
