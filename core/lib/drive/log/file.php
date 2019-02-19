<?php
//file system
namespace core\lib\drive\log;

use core\lib\conf;

class file
{
    public $path;               //location

    public function __construct()
    {
        $conf = conf::get('OPTION','log');
        $this->path = $conf['PATH'];
    }

    public function log($message,$file='log')
    {
        /**
         *  1. check the file ?exist
         *  2. write log
         */
        // p($this->path);exit();
        if(!is_dir($this->path.date('Ymd'))) {
            mkdir($this->path.date('Ymd'),'0777',true);
            chmod($this->path.date('Ymd'), 0777);
        }

        return file_put_contents($this->path.date('Ymd').'/'.$file.'.php',date('Y-m-d H:i:s').json_encode($message).PHP_EOL, FILE_APPEND);
    }
}

