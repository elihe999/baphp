<?php

use Workerman\Worker;
require_once './../../vendor/workerman/workerman/Autoloader.php';
// require_once HEART.'/vendor/autoload.php';

$setting = include_once("../../core/config/websocket.php");
$ws_worker = new Worker("websocket://0.0.0.0:" . $setting['websocket']);
$ws_worker->count = 4;

$ws_worker->onMessage = function($connection, $data)
{
    $connection->send('hello ' . $data);
};

Worker::runAll();
