<?php
namespace app\command\shell;

use app\command\BaseCommand;

class clearlog extends BaseCommand
{
    public $param;

    public function __construct($param)
    {
        $this->param = $param;
        parent::__construct();
    }

    public function start()
    {
        if ($this->param) {
            system("rm -rf " . HEART . "/log/log/*");
            system("rm -rf " . HEART . "/log/twig/*");
            system("rm -rf " . HEART . "/log/cache/*");
        }
        // return $ret;
    }
}
