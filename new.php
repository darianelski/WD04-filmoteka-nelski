<?php 

// DB connection
require('config.php');
require('database.php');
$link = db_connect();
require('models/films.php');
require('functions/login-functions.php');

if (array_key_exists('newFilm', $_POST)) {

	if ($_POST['title'] == '') {
		$errors[] = "<p>Необходимо ввести название фильма!</p>";
	}

	if ($_POST['genre'] == '') {
		$errors[] = "<p>Необходимо ввести жанр фильма!</p>";
	}

	if ($_POST['year'] == '') {
		$errors[] = "<p>Необходимо ввести год выхода фильма!</p>";
	}

	// Если ошибок нет, сохраняем фильм
	if (empty($errors)) {
		$result = new_film($link, $_POST['title'], $_POST['genre'], $_POST['year'], $_POST['description']);

		if ($result) {
			$resultSuccess = "<p>Фильм успешно добавлен!</p>";
		} else {
			$resultError = "<p>Ошибка добавления фильма. Попробуйте еще раз.</p>";
		}
	}
}

include('views/head.tpl');
include('views/notifications.tpl');
include('views/new-film.tpl');
include('views/footer.tpl');

?>
