<?php
session_start();

require_once 'autoload.php';

$controller = '\\Controllers\\' . ucfirst(resolve_request_parameter('controller', 'products'));

$method = resolve_request_parameter('method', 'index');

return (new $controller)->$method();