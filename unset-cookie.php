<?php 

require('config.php');
require('functions/login-functions.php');

if (isset($_POST['user-unset'])) {
	$userName = '';
	$userCity = '';
	$expire = time() - 60*60*24*30;

	setcookie('user-name', $userName, $expire);
	setcookie('user-city', $userCity, $expire);
}

header('Location: ' . HOST . 'php-lessons/WD04-filmoteka-nelski/request.php');

 ?>