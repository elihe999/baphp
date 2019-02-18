<?php

namespace core;

class heart
{
    public static $classMap = array();
    public $assign;

    // run
    static public function run()
    {
        \core\lib\log::init();                                                  //init log setting
        // \core\lib\log::log('test');
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
            $ctrl->index();
            \core\lib\log::log('ctrl: '.$ctrlClass. '      ' .'action: '.$action);
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
        $this->assign[$name] = $value;
    }

    public function display($file)
    {
        $file = APP . '/views/' . $file;
        if ( is_file($file) ) {
            // p($this->assign);exit();
            // extract($this->assign);
            // include $file;
            require_once HEART.'/vendor/autoload.php';
            // require_once(HEART.'twig/Autoloader.php');
            // \Twig_Autoloader::register();                            //autoload
            $loader = new \Twig\Loader\FilesystemLoader(APP.'/views');
            $twig = new \Twig\Environment($loader, array(
                'cache' => HEART.'/log/twig',
                'debug' => DEBUG
            ));
            $template = $twig->load('index.html');
            $template->display($this->assign?$this->assign:'');
        };
    }
}
