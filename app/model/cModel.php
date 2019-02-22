<?php
namespace app\model;

use core\lib\model;

class cModel extends model
{
    /**
     * extend medoo
     */
    public $table = 'device_tb';
    public function lists()
    {
        $ret = $this->select($this->table,'*');
        return $ret;
    }

    public function getOne($id)
    {
        // $ret = $
    }
}