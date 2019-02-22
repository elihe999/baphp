<?php
$redis = new Redis();
$redis->connect('127.0.0.1', 6379) or die ("failed");
echo "Connection to server sucessfully" . $redis->ping();

