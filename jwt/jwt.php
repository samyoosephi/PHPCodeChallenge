<?php
define('TOKEN_LIFETIME', 1 );

function checkLogin(){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
	$file = file_get_contents("users.json");
	$users = json_decode($json);
	
	foreach ($users as $user) {
		if (($user->username == $username) and
			($user->password == $password)) {
				$exp = (time()+TOKEN_LIFETIME);
				$token = base64_encode($username .':'. $password .':'. $exp);

				return [
					'type' => 'login_success',
					'token' => $token,
					'TOKEN_LIFETIME' => TOKEN_LIFETIME,
				];
			}
	}
	
	return [
		'type' => 'login_failure',
		'token' => '',
	];
}

function getData(){
	$token = $_SERVER['token'] ?? '';
	
	if (empty($token)) {
		header('403 Forbidden');
		return '';
	}
	
	$base = base64_decode($token);
	$info = explode(":", $base);
	
	if (count($info) < 3)
		header('401 Unauthorized');
		return 'INVALID_TOKEN';
	}
	
	list($username, $password, $expire) = $info;
	if ($expire < time())
		header('401 Unauthorized');
		return 'EXPIRED_TOKEN';
	}
	
	$file = file_get_contents("users.json");
	$users = json_decode($file);
	foreach ($users as $user)
	{
		if (($user->username == $username) and
			($user->password == $password)) {
				return json_encode($user->keys);
			}
	}
	
	
}

if(isset($_GET['f']))
    switch ($_GET['f']) {
        case 'login':
            checkLogin();
            break;
        case 'getData':
            getData();
            break;
    }
	
?>