<?php

namespace core\lib;
use core\lib\conf;
class model extends \PDO
{
    public function __construct()
    {
        // header("Content-Type=text/html;charset=utf8");
        // $dbType   = 'mysql';
        // $host     = '127.0.0.1'; //此处不用localhost
        // $dbName   = 'lampdb';
        // $username = 'native';
        // $passwd = '123456';

        // $dsn = 'mysql:host=$host;dbname=lampdb';
        // $dsn = "$dbType:host=$host;dbname=$dbName";

        $database = conf::all('database');
        try {
            parent::__construct($database['DSN'], $database['USERNAME'], $database['PASSWD']);
        } catch (\PDOException $th) {
            p($th->getMessage());
        }

        // $mysqli = mysqli_init();
        // $mysqli->options(MYSQLI_OPT_CONNECT_TIMEOUT, 2);//设置超时时间
        // $mysqli->real_connect('127.0.0.1', 'root', '123456', 'lampdb');

        // $sql = "select * from bosera000930";

        // $result = $mysqli->query($sql);
        // if($result === false)
        // {
        //     p($mysqli->errno);
        //     p($mysqli->error);
        // }

        // p($result->num_rows);
        // $result->close();

    }
}