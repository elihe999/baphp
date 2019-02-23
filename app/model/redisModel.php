<?php
namespace app\model;
class redisModel
{
    public function connect_server()
    {
        $redis = new \Redis();
        $redis->connect('127.0.0.1', 6379) or die ("failed");
        $auth = $redis->auth('foobared');
        echo "Connection to server sucessfully" . $redis->ping();
    }
}
