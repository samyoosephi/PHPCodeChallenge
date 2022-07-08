<?php

function autoloader($class)
{
    require_once $class . '.php';
}

spl_autoload_register('autoloader');

$options = [
    'dateFormat' => 'Y-m-d H',
    'logFormat' => '[{date}] {level}-{message}',
    'threshold' => 'ALL',
];

$logger =  new Logger(new NotifierFile("./debug.log"), $options);
$logger->critical('oh oh');
$logger->emergency('system is down');
$logger->notice('change variable name');
$logger->log('ERROR', 'error in line 2');