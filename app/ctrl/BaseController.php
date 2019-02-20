<?php
namespace app\ctrl;
use core\lib\model;
class BaseController extends \core\heart
{
    public function __construct(){
		session_start();
	}

    public function showError()
    {
        $data = '404';
        $this->assign('data', $data);
        $this->display('errors/404.html.twig');
    }
}
