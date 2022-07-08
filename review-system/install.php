<?php

require_once 'functions.php';

if (is_installed()) {
    render_error("Already installed");
}

function read_parameters()
{
	$path = __DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'parameters.json';
    $file = file_get_contents($path);
	$data = json_decode($file, true);
	return $data;	
}

function read_films()
{
	$path = __DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'films.json';
    $file = file_get_contents($path);
	$data = json_decode($file, true);
	return $data;
}

// Create Tables
$db	= new SQLite3(DB_NAME);

// TODO: implement
$query = "CREATE TABLE parameters (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(1025) UNIQUE NOT NULL, 
	genre VARCHAR(1024) NOT NULL
);";
$db->exec($query);

$query = "CREATE TABLE films (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(1025) UNIQUE NOT NULL, 
	genre VARCHAR(1024) NOT NULL
);";
$db->exec($query);

$query = "CREATE TABLE votes (
	film_id INTEGER NOT NULL, 
	parameter_id INTEGER NOT NULL, 
	score INTEGER NOT NULL
);";
$db->exec($query);

// Fill Tables Initial Data
$films = read_films();
foreach ($films as $film) {
	list($name, $genre) = $film;
	$query = "INSERT INTO films(title, genre) VALUES('$name', '$genre');";
	$db->exec($query);
}

$parameters = read_parameters();
foreach ($parameters as $parameter) {
	list($name, $genre) = $parameter;
	$query = "INSERT INTO parameters(title, genre) VALUES('$name', '$genre');";
	$db->exec($query);
}

render_success("Installed successfully");