<?php
/**
 * access
 * 1.parameter
 * 2.function
 * 3.init frame
 */

define('HEART',realpath('./'));
define('CORE',HEART.'/core');
define('APP',HEART.'/app');
define('MODULE','app');
define('DEBUG',true);

if ( DEBUG ) {
    ini_set('display_error','On');
} else {
    ini_set('display_error','off');
}

include CORE.'/common/function.php';
include CORE.'/heart.php';

spl_autoload_register('\core\heart::load');

\core\heart::run();


