<?php

namespace core;

class heart
{
    public static $classMap = array();
    static public function run()
    {
        $route = new \core\lib\route();
        p($route);
    }

    static public function load($class)
    {
        if( isset($classMap[$class]) )
        {
            return true;
        }
        else
        {
            $class = str_replace('\\', '/', $class);
            $file = HEART . '/' . $class . '.php';
            if( is_file($file) )
            {
                include $file;
                self::$classMap[$class] = $class;
            }
            else
            {
                return false;
            }
        }
    }
}
