<?php

require_once 'functions.php';

if(!is_installed()){
    render_error("Application is not installed");
}

function get_films()
{
	$db	= new SQLite3(DB_NAME);
    
	$query = "SELECT films.*, films.id as film_id, 
		(SELECT COUNT(*) from votes where votes.film_id=films.id) as votes_count, 
		(SELECT AVG(score) from votes where votes.film_id=films.id) as average_score FROM films;
	";
	
	$ret = $db->query($query);
	$data = [];
	
	while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
		array_push($data, $row);
	}
	
	return $data;
}

render('index', [
    'films' => get_films()
]);

