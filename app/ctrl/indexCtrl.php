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
        $command = new \app\command\shell\arpScan();
        $ret = $command->start();
        dump($ret);
        // $command = new \app\command\shell\clearlog("1");
        // $ret = $command->start("hear");
        // dump($ret);
        // $model = new \app\model\redisModel();
        // $ret = $model->connect_server();
        // dump($ret);

        $sidemenu = array(
            array('name'=>'Dashboard', 'label'=>'fa fa-file-text-o', 'herf'=>'/index/index'),
            array('name'=>'Case Selection', 'label'=>'fa fa-pie-chart', 'herf'=>'/index/index'),
            array('name'=>'Random Test Case', 'label'=>'fa fa-pie-chart', 'herf'=>'/index/index'),
            array('name'=>'Setting', 'label'=>'fa fa-cogs', 'herf'=>'/index/index'),
            array('name'=>'Report', 'label'=>'fa fa-list', 'herf'=>'/index/test'),
        );
        if ( (shell_exec(" ps -ef | grep -v \"grep\" | grep \"sipp TestSuite.txt\" | wc -l ") >= 1) ) {
            array_push($sidemenu,array('name'=>'runSuite', 'label'=>'fa fa-list', 'herf'=>'/index/test'));
        }
        $data = 'Dashboard';
        $this->assign('activeSideMenu', $data);
        $this->assign('sidemenu', $sidemenu);
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
