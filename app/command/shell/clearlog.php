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
        // fwrite(STDOUT, '这个命令将会清空log文件下的所有文件是否要执行(Y/N)?');
        // $input = strtoupper(trim(fgets(STDIN)));
        if ($this->param) {
            system("rm -rf " . HEART . "/log/log/*");
            system("rm -rf " . HEART . "/log/twig/*");
            system("rm -rf " . HEART . "/log/cache/*");
            system("touch /log/test.txt");
        }
        return "fun";
    }
}
