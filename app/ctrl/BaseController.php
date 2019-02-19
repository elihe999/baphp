<?php
namespace app\ctrl;
use core\lib\model;
class BaseController extends \core\heart
{	
    public function __construct(){
		session_start();
	}
}

