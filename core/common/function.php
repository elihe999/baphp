<?php

// namespace core\common;
// Global they

function p($var) {
    if ( is_bool($var) ) {
        var_dump($var);
    } else if ( is_null($var) ) {
        var_dump(NULL);
    } else {
        echo "<pre style='position:relative;z-index:1000;padding:10px;border-radius:5px;background:#F5F5F5;border:1px solid #0a0a0a;font-size:14px;line-height:18px;opacity:0.9;'>" . print_r($var, true) . "</pre>";
    }
}

/**
 * insert html herf
 * @param: $url, $time=0, $msg:alert
 */
function php_redirect($url, $time=0, $msg='') {
	sleep($time);                                                   //sleep($) second
	echo "<script language='javascript' type='text/javascript'>";
	if ( !empty($msg) ) {
		echo "alert('".$msg."');";
	}
	echo "window.location.href='$url'";
	echo "</script>";
}

function object_to_array($obj) {
    if ( is_array($obj) ) {
        return $obj;
    }
    $_arr = is_object($obj)? get_object_vars($obj) :$obj;
    foreach ( $_arr as $key => $val ) {
        $val=(is_array($val)) || is_object($val) ? object_to_array($val) :$val;
        $arr[$key] = $val;
    }
    return $arr;
}

function debug(...$var)
{
    if (function_exists('dump')) {
        array_walk($var, function ($v) {
            dump($v);
        });
    } else {
        array_walk($var, function ($v) {
            print_r($v);
        });
    }
    exit();
}

/**
 * @param string $str
 * @param string $filter
 * @param string $default
 * @return mix
 */
function get($str = 'false', $filter = '', $default = false)
{
    if ($str !== false) {
        $return = isset($_GET[$str]) ? $_GET[$str] : false;
        if ($return) {
            switch ($filter) {
                case 'int':
                    if (!is_numeric($return)) {
                        return $default;
                    }
                    break;
                default:
                    $return = htmlspecialchars($return);

            }
            return $return;
        } else {
            return $default;
        }
    } else {
        return $_GET;
    }
}

/**
 * @param $str
 * @param $filter
 * @param $default
 * @return mix
 */
function post($str = false, $filter = '', $default = false)
{
    if ($str !== false) {
        $return = isset($_POST[$str]) ? $_POST[$str] : false;
        if ($return !== false) {
            switch ($filter) {
                case 'int':
                    if (!is_numeric($return)) {
                        return $default;
                    }
                    break;
                default:
                    $return = htmlspecialchars($return);
            }
            return $return;
        } else {
            return $default;
        }
    } else {
        return $_POST;
    }
}

function http_method()
{
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
        return 'POST';
    } else {
        return 'GET';
    }
}

function json($array)
{
    header('Content-Type:application/json; charset=utf-8');
    echo json_encode($array);
}