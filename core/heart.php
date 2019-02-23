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

        if ( is_file($ctrlfile) ) {
            include $ctrlfile;
            $ctrl = new $newctrlClass();
            //read $action
            if (method_exists($ctrl, $action)) {
                call_user_func([$ctrl, $action]);
                \core\lib\log::log('ctrl: '.$ctrlClass. '      ' .'action: '.$action);
            } else {
                if (DEBUG) {
                    throw new \Exception($action . ' (action) NOT EXIST');
                } else {
                    if ( is_file($ctrlfile) ) {
                        call_user_func([$ctrl, "showError"]);                   //load 404 show action
                    } else {
                        throw new \Exception('FILE MISSING: 404.html');
                    }
                }
            }
        } else {
            if (DEBUG) {
                throw new \Exception($ctrlClass . ' (ctrl class) NOT EXIST');
            }
            else {
                $ctrlfile = APP.'/ctrl/BaseController.php';
                $newctrlClass = '\\'.MODULE.'\ctrl\\'.'BaseController';
                if ( is_file($ctrlfile) ) {
                    include $ctrlfile;
                    $ctrl = new $newctrlClass();
                    call_user_func([$ctrl, "showError"]);                       //load 404 show action
                } else {
                    throw new \Exception('FILE MISSING: 404.html');
                }
            }
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
        //render here
        $this->assign[$name] = $value;
    }

    public function display($file)
    {
        $file_path = APP . '/views/' . $file;
        if ( is_file($file_path) ) {
            require_once HEART.'/vendor/autoload.php';
            // require_once(HEART.'twig/Autoloader.php');
            // \Twig_Autoloader::register();                                    //autoload
            $loader = new \Twig\Loader\FilesystemLoader(APP.'/views');
            $twig = new \Twig\Environment($loader, array(
                'cache' => HEART.'/log/twig',
                'debug' => DEBUG
            ));
            // p($file);
            $template = $twig->load($file);
            $template->display($this->assign?$this->assign:[]);
        };
    }
}
