<?php

namespace app\command\shell;

use app\command\BaseCommand;

class arpScan extends BaseCommand
{
    public $param;

    public function __construct($param = null)
    {
        $this->param = $param;
        parent::__construct();
    }

    public function start()
    {
        chmod(HEART . '/log/cache/arp.log', 0766);
        system('sudo arp-scan -l > ' . HEART . '/log/cache/arp.log');
        return file_exists(HEART . '/log/cache/arp.log');
    }
}

