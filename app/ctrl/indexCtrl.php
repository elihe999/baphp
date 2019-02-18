<?php

namespace app\ctrl;
use core\lib\model;

class indexCtrl extends \core\heart
{
    //index control
    public function action()
    {
        $model = new \core\lib\model();
        p($model);
        // $temp = \core\lib\conf::get('CTRL', 'route');
        // $temp = \core\lib\conf::get('ACTION', 'route');
        
        print_r($model);
        $data = "hello";
        $title = 'View file';
        $this->assign('title',$title);
        $this->assign('data', $data);
        $this->display('index.html');
    }
}