<?php

namespace App;

/**
 * Created by PhpStorm.
 * User: puncoz
 * Date: 2024/05/27
 * Time: 10:38 PM
 */
class HttpService
{
    public function __construct(
        protected HttpClientInterface $client
    ) {
    }

    public function getPosts()
    {
        return $this->client->request("GET", "/posts");
    }

    public function getPostDetail(int $postId)
    {
        return $this->client->request("GET", "/posts/{$postId}");
    }
}
