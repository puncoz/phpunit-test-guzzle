<?php
/**
 * Created by PhpStorm.
 * User: puncoz
 * Date: 2024/05/27
 * Time: 10:46 PM
 */

use App\HttpSdkFactory;

require __DIR__.'/vendor/autoload.php';

$service    = new App\HttpSdk();
$posts      = $service->getPosts();
$postDetail = $service->getPostDetail(1);
dump(count($posts), $postDetail);

$serviceWithFactory    = HttpSdkFactory::create();
$postsWithFactory      = $serviceWithFactory->getPosts();
$postDetailWithFactory = $serviceWithFactory->getPostDetail(1);
dump(count($postsWithFactory), $postDetailWithFactory);
