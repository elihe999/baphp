<?php

namespace core;

class heart
{
    public static $classMap = array();
    static public function run()
    {
        $route = new \core\lib\route();
        $ctrlClass = $route->$ctrl;
        $action = $route->action;
        $ctrlfile = APP.'/ctrl/'.$ctrlClass.'Ctrl.php';
        $newctrlClass = '\\'.MODULE.'\ctrl\\'.$ctrlClass.'Ctrl';
        if ( is_file($ctrlfile) ) {
            include $ctrlfile;
            $ctrl = new $newctrlClass();
            $ctrl->$action;
        } else {
            throw new \Exception('Can not find ' . $ctrlClass);
        }
        // p($route);
    }

    static public function load($class)
    {
        /*
        * new \core\route()
        * $class '\core\route';
        */
        if( isset($classMap[$class]) ) {
            return true;
        } else {
            $class = str_replace('\\', '/', $class);
            $file = HEART . '/' . $class . '.php';
            if( is_file($file) ) {
                include $file;
                self::$classMap[$class] = $class;
            } else {
                return false;
            }
        }
    }
}
