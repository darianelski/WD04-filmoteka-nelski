<?php 
require('config.php');

unset($_SESSION['user']);
session_destroy();

header('Location: ' . HOST . 'php-lessons/WD04-filmoteka-nelski/index.php');

 ?>