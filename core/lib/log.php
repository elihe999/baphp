<?php
namespace core\lib;
use core\lib\conf;
class log
{
    static $class;
    /**
     * 1. store type
     * 2. write log
     */

    static public function init() {
        // store type
        $drive = conf::get('DRIVE','log');
        $class = '\core\lib\drive\log\\'.$drive;
        self::$class = new $class;
    }

    static public function log($name, $file = 'log')
    {
        self::$class->log($name, $file);
    }

}
