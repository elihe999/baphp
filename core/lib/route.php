<?php

namespace core\lib;
class route
{
    public $ctrl;
    public $action;
    public function __construct()    
    {
        /**
         * 1. hide index.php
         * 2. get URL parameter
         * 3. return controller and function
         */
        
        if( isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/' )
        {
            $path = $_SERVER['REQUEST_URI'];
            $patharr = explode('/', trim($path, '/'));
            if( isset($patharr[0]))
            {
                $this->ctrl = $patharr[0];
            }
            unset($patharr[0]);

            if( isset($patharr[1]) )
            {
                $this->action = $patharr[1];
                unset($patharr[1]);
            }
            else
            {
                $this->action = "index";
            }
            //GET extra url
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
            p($_GET);
        }
        else
        {
            $this->ctrl = 'index';
            $this->action = 'index';
        }
    }
}