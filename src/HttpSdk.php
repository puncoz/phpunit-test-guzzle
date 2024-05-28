<?php
/**
 * Created by PhpStorm.
 * User: puncoz
 * Date: 2024/05/27
 * Time: 11:00 PM
 */

namespace App;

/**
 * Class HttpSdk
 * @method array getPosts()
 * @method array getPostDetail(int $postId)
 */
class HttpSdk
{
    protected HttpService $service;

    public function __construct()
    {
        $client = new HttpClient();

        $this->service = new HttpService($client);
    }

    public function __call(string $name, array $arguments): array
    {
        return call_user_func_array([$this->service, $name], $arguments);
    }
}
