<?php

namespace app\ctrl;
class indexCtrl extends \core\heart
{
    //index control
    public function action()
    {
        // $model = new \core\lib\model();
        // p($model);
        $data = "hello";
        $title = 'View file';
        $this->assign('title',$title);
        $this->assign('data', $data);
        $this->display('index.html');
    }
}