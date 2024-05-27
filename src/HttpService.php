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
        protected HttpSdkClientInterface $client
    ) {
    }

    public function getNews()
    {
        $this->client->setReqAuth(false);

        return $this->client->get('/posts');
    }

    public function postNews()
    {
        $client = $this->client->initiate();
        $this->client->setReqAuth(true);

        $response = $client->post('/posts', ['json' => ['title' => 'test', 'content' => 'test']]);

        return $response->getResponse();
    }
}
