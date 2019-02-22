<?php

use Workerman\Worker;
require_once './../../vendor/workerman/workerman/Autoloader.php';
// require_once HEART.'/vendor/autoload.php';


$ws_worker = new Worker("websocket://192.168.92.88:8000");
$ws_worker->count = 4;

$ws_worker->onMessage = function($connection, $data)
{
    $connection->send('hello ' . $data);
};

Worker::runAll();



