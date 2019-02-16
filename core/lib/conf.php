<?php
namespace core\lib;

class conf
{
    static public $conf = array();
    static public function get($name, $file)
    {
        /**
         * 1 config file exist
         * 2 config option exist
         * 3 cache setting
         */
        // p(self::$conf);
        if(isset(self::$conf[$file])) {
            return self::$conf[$file][$name];
        } else {
            // p(1); // Q: repeat??? A: path include time incra 
            $path = HEART . '/core/config/' . $file . '.php';
            if(is_file($path)) {
                $conf = include $path;
                if(isset($conf[$name])) {
                    self::$conf[$file] = $conf;
                    return $conf[$name];
                } else {
                    throw new \Exception('No configure setting'.$name);
                }
            } else {
                throw new \Exception('Can not find config name '.$file);
            }
        }
    }

    static public function all($file)
    {
        if(isset(self::$conf[$file])) {
            return self::$conf[$file];
        } else {
            $path = HEART . '/core/config/' . $file . '.php';
            if(is_file($path)) {
                $conf = include $path;
                self::$conf[$file] = $conf;
                return $conf;
            } else {
                throw new \Exception('Can not find config name '.$file);
            }
        }
    }
}