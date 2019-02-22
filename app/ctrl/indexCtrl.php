<?php
namespace app\ctrl;
use core\lib\model;

class indexCtrl extends BaseController
{
    //action should not exist
    //index control
    public function index()
    {
        // $model = new \app\model\cModel();
        // $ret = $model->lists();
        // dump($ret);
        // $command = new \app\command\shell\clearlog("tests");
        // $ret = $command->start();
        // dump($ret);
        $data = 'hello world';
        $this->assign('data', $data);
        $this->assign('title', "index");
        $this->display('index.html');
    }

    public function test()
    {
        $data = 'test';
        $this->assign('data', implode($_GET));
        $this->display('test.php');
    }

}
