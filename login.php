<?php 

require('config.php');
require('functions/login-functions.php');

if (isset($_POST['enter'])) {
	$userName = 'admin';
	$userPassword = '123456';

	if ( $_POST['login'] == $userName ) {
		if ($_POST['password'] == $userPassword ) {

			$_SESSION['user'] = 'admin';
			header('Location: ' . HOST . 'php-lessons/WD04-filmoteka-nelski/index.php');
		}
	}
}

include('views/head.tpl');
include('views/login.tpl');
include('views/footer.tpl');

 ?>