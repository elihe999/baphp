<?php
namespace app\ctrl;
use core\lib\model;

class ExcelCtrl extends BaseController
{
    //action should not exist
    //index control
    public function export()
    {
        // $model = new \aVpp\model\cModel();
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

}
