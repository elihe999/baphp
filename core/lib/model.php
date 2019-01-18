<?php

namespace core\lib;

class model extends \PDO
{
    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=lampdb';
        $username = 'root';
        $passwd = '123456';
        try {
            parent::__construct($dsn, $username, $passwd);
        } catch (\PDOException $th) {
            p($th->getMessage());
        }
    }
}