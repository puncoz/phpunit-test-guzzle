<?php
/**
 * Created by PhpStorm.
 * User: puncoz
 * Date: 2024/05/27
 * Time: 10:59 PM
 */

namespace App;

use Guzzle\Http\Message\Response;

interface HttpSdkClientInterface
{
    public function setReqAuth(bool $reqAuth);

    public function initiate();

    public function get(string $url): Response;
}
