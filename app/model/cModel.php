<?php
namespace app\model;

use core\lib\model;

class cModel extends model
{
    public $table = 'bosera000930';
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