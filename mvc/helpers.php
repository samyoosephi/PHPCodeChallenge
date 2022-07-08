<?php

function resolve_request_parameter($name, $default = null)
{
	return $_REQUEST[$name] ?? $default;

	/*
    if ($_SERVER["REQUEST_METHOD"] == "GET")
		if (isset($_GET[$name]))
			return $_GET[$name];
	
	if ($_SERVER["REQUEST_METHOD"] == "POST")
		if (isset($_POST[$name]))
			return $_POST[$name];

	return $default;
	*/
}

function redirect($controller = '', $method = '')
{
    $route = "./index.php?controller=$controller&method=$method";
	header("Location: $route");
	die();
}

function set_alert($alert)
{
	$_SESSION['alert'] = $alert;
}

function get_alert()
{
	$alert = $_SESSION['alert'] ?? null;
	unset($_SESSION['alert']);
	
	return $alert;
}

function get_cart_identifier()
{
	if (isset($_SESSION['cart_id']))
		return $_SESSION['cart_id'];

    $id = rand(10000, 99999);
	$_SESSION['cart_id'] = $id;
	
	return $id;
}

function render($file, $data = [])
{
    $view = realpath(__DIR__ . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . $file . '.php');

    extract($data);

    $alert = get_alert();

    ob_start();

    require($view);

    echo ob_get_clean();
}
