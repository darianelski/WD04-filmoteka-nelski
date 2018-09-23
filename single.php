<?php 

// DB connection
require('config.php');
require('database.php');
$link = db_connect();
require('models/films.php');

// удаление
if (@$_GET['action'] == 'delete') {
	$result = film_delete($link, $_GET['id']);

	if ($result) {
		$resultInfo = "<p>Фильм был удален!</p>";
	}
}

$film = get_film($link, $_GET['id']);

include('views/head.tpl');
include('views/notifications.tpl');
include('views/film-single.tpl');
include('views/footer.tpl');

$errors = array();

	if (@$_GET['action'] == 'delete') {
		$query = "DELETE FROM films WHERE id = '" . mysqli_real_escape_string($link, $_GET['id']) . "' LIMIT 1";

		mysqli_query($link, $query);

		if (mysqli_affected_rows($link) > 0) {
			$resultInfo = "<p>Фильм был удален!</p>";
		} 
	}
?>