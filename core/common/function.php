<?php

namespace core;

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
function php_jp($url, $time=0, $msg='') {
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
