<?php 

// DB connection
require('config.php');
require('database.php');
$link = db_connect();

require('models/films.php');
require('functions/login-functions.php');



// Update film data in DB
if (array_key_exists('updateFilm', $_POST)) {
	// Обработка ошибок

	if ($_POST['title'] == '') {
		$errors[] = "<p>Необходимо ввести название фильма!</p>";
	}

	if ($_POST['genre'] == '') {
		$errors[] = "<p>Необходимо ввести жанр фильма!</p>";
	}

	if ($_POST['year'] == '') {
		$errors[] = "<p>Необходимо ввести год выхода фильма!</p>";
	}

	// Еси ошибок нет, сохраняем фильм
	if (empty($errors)) {
			$result = film_update($link, $_POST['title'], $_POST['genre'], $_POST['year'], $_POST['description'], $_GET['id']);

			if ($result) {
				$resultSuccess = "<p>Фильм успешно обновлен!</p>";
			} else {
				$resultError = "<p>Ошибка обновления фильма. Попробуйте еще раз.</p>";
			}
		}
}

$film = get_film($link, $_GET['id']);

include('views/head.tpl');
include('views/notifications.tpl');
include('views/edit-film.tpl');
include('views/footer.tpl');

?>
