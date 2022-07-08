<?php

require_once 'helpers.php';

/*
function __autoload($class)
{
	$class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
	require_once $_SERVER['DOCUMENT_ROOT'] . ($class) . '.php';
}
*/

spl_autoload_register('autoloader');

function autoloader($class)
{
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);

    require_once ($class) . '.php';
}