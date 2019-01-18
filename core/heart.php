<?php

namespace core;

class heart
{
    public static $classMap = array();
    public $assign;
    static public function run()
    {
        $route = new \core\lib\route();
        // p($route);exit();                                                    // DEBUG ROUTE
        $ctrlClass = $route->ctrl;
        $action = $route->action;
        $ctrlfile = APP.'/ctrl/'.$ctrlClass.'Ctrl.php';
        $newctrlClass = '\\'.MODULE.'\ctrl\\'.$ctrlClass.'Ctrl';
        // p($ctrlfile);exit();
        if ( is_file($ctrlfile) ) {
            include $ctrlfile;
            $ctrl = new $newctrlClass();
            $ctrl->action();
        } else {
            throw new \Exception('Can not find ' . $ctrlClass);
        }
    }

    static public function load($class)
    {
        /*
        * new \core\route()
        * $class '\core\route';
        */
        if ( isset($classMap[$class]) ) {
            return true;
        } else {
            $class = str_replace('\\', '/', $class);
            $file = HEART . '/' . $class . '.php';
            if ( is_file($file) ) {
                include $file;
                self::$classMap[$class] = $class;
            } else {
                return false;
            }
        }
    }

    public function assign($name, $value)
    {
        $this->assgin[$name] = $value;
    }

    public function display($file)
    {
        $file = APP . '/views/' . $file;
        if ( is_file($file) ) {
            // p($this->assign);exit();
            extract($this->assign);
            include $file;
        }
    }
}
