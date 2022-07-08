<?php

require_once "functions.php";

if(!is_installed()){
    render_error("Application is not installed");
}

function get_parameters($film_id)
{
	$db	= new SQLite3(DB_NAME);
    
	$sql = "SELECT parameters.* FROM parameters 
		LEFT JOIN films ON films.genre=parameters.genre 
		WHERE films.id = $film_id;
	";
	
	$ret = $db->query($sql);
	$data = [];
	
	while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
		array_push($data, $row);
	}
	
	return $data;
}

function has_voted($film_id)
{
    $db	= new SQLite3(DB_NAME);
    
	$sql = "SELECT COUNT(*) as total FROM votes WHERE film_id = $film_id;";
	
	$ret = $db->query($sql);
	
	$row = $ret->fetchArray(SQLITE3_ASSOC);
	
	return ($row['total'] > 0);
}

function submit_vote($film_id, $scores)
{
    $db	= new SQLite3(DB_NAME);
	
    foreach ($scores as $par => $score)
	{
		$ret = $db->exec("INSERT INTO votes (film_id, parameter_id, score) VALUES('$film_id', '$par', '$score');");
	}
}

if (is_request_get()) {
    $film_id = $_GET['film_id'];

    if (has_voted($film_id)) {
        render_error('Duplicate Vote');
    }

    $parameters = get_parameters($film_id);

    render('vote', [
        'film_id' => $film_id,
        'parameters' => $parameters,
    ]);
}

if (is_request_post()) {
    $film_id = $_POST['film_id'];

    if (has_voted($film_id)) {
        render_error('Duplicate Vote');
    }

    $scores = $_POST['scores'];

    submit_vote($film_id, $scores);

    render_success('Vote Submitted Successfully');
}
