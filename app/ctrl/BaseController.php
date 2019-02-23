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
        header('HTTP/1.1 404 Not Found');
        header("status: 404 Not Found");
        $this->assign('data', $data);
        $this->display('errors/404.html.twig');
    }

    public function index()
    {
        $this->display('errors/404.process.html.twig');
    }
}
