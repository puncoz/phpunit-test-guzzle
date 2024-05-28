<?php
/**
 * Created by PhpStorm.
 * User: puncoz
 * Date: 2024/05/27
 * Time: 10:59 PM
 */

namespace App;

interface HttpClientInterface
{
    public function request(string $method, string $endpoint, array $options = []): array;
}
