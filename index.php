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

define('DEBUG',true);

if(DEBUG)
{
    ini_set('display_error','On');
}
else
{
    ini_set('display_error','off');
}

include CORE.'/common/function.php';
include CORE.'/HEART.php';

\core\HEART::run();
//p(HEART);

