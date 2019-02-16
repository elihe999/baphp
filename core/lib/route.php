<?php

namespace core\lib;
use core\lib\conf;
class route
{
    public $ctrl;
    public $action;
    public function __construct()    
    {
        /**
         *  example.com/index/index
         * 1. hide index.php
         * 2. get URL parameter
         * 3. return controller and function
         */
        // p($_SERVER["REQUEST_URI"]);exit();                                       //DEBUG-route
        if( isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/' ) {
            $path = $_SERVER['REQUEST_URI'];
            $patharr = explode('/', trim($path, '/'));                              // '/' slice
            if( isset($patharr[0]) ) {
                $this->ctrl = $patharr[0];
            }
            unset($patharr[0]);                                                     //drop first arr

            if( isset($patharr[1]) ) {
                $this->action = $patharr[1];                                        //drop second
                unset($patharr[1]);
            } else {
                $this->action = conf::get('ACTION','route');
            }

            //GET extra url --> get require
            $countPath = count($patharr) + 2;
            $i = 2;
            while($i < $countPath)
            {
                if( isset($patharr[$i + 1]))
                {
                    $_GET[$patharr[$i]] = $patharr[$i + 1];
                }
                $i = $i + 2;
            }
            // p($_GET);
        } else {
            $this->ctrl = conf::get('CTRL','route');
            $this->action = conf::get('ACTION','route');
        }
    }
}