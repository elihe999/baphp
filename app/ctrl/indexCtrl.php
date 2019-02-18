<?php
namespace app\ctrl;
use core\lib\model;

class indexCtrl extends \core\heart
{
    //index control
    public function index()
    {
        // $model = new \app\model\cModel();
        // $ret = $model->lists();
        // dump($ret);
        $data = 'hello world';
        $this->assign('data', $data);
        $this->display('index.html');
    }

    public function test()
    {
        $data = 'test';
        $this->assign('data', $data);
        $this->display('test.html');
    }
}