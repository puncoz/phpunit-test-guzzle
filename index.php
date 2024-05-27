<?php
/**
 * Created by PhpStorm.
 * User: puncoz
 * Date: 2024/05/27
 * Time: 10:46 PM
 */

require __DIR__.'./vendor/autoload.php';

$service = new App\HttpSdk();
dd($service->getNews());
//var_dump($service->postNews());
