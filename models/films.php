<?php 

// Getting all films from DB
function films_all($link) {
	$query = "SELECT * FROM films";
	$films = array();
	$result = mysqli_query($link, $query);

	if ( $result = mysqli_query($link, $query) ) {
		while ( $row = mysqli_fetch_array($result) ) {
		  $films[] = $row;
		}
	}
	
	return $films;
}

function get_film($link, $id) {
	$query = "SELECT * FROM films WHERE id = '" . mysqli_real_escape_string($link, $id) . "' LIMIT 1";
		$result = mysqli_query($link, $query);
		if ( $result = mysqli_query($link, $query) ) {
			$film = mysqli_fetch_array($result);
		}

		return $film;
}

function new_film($link, $title, $genre, $year, $description) {

			// Запись данных в БД
			$query = "INSERT INTO `films` (`title`, `genre`, `year`, `description`) VALUES (
			 '" . mysqli_real_escape_string($link, $title) . "',
			 '" . mysqli_real_escape_string($link, $genre) . "',
			 '" . mysqli_real_escape_string($link, $year) . "',
			 '" . mysqli_real_escape_string($link, $description) . "'	
			 )";

			 if (mysqli_query($link, $query)) {
			 	 $result = true;
			 } else {
			 	$result = false;
			 }

			 return $result;
}

function film_update($link, $title, $genre, $year, $description, $id) {

	if ( isset($_FILES['photo']['name']) && $_FILES['photo']['tmp_name'] !="" ) {
		$fileName = $_FILES['photo']['name'];
		$fileTmpLoc = $_FILES['photo']['tmp_name'];
		$fileType = $_FILES['photo']['type'];
		$fileSize = $_FILES['photo']['size'];
		$fileErrorMsg = $_FILES['photo']['error'];
		$kaboom = explode(".", $fileName);
		$fileExt = end($kaboom);

		list($width, $height) = getimagesize($fileTmpLoc);
		if ($width < 10 || $height <10) {
			$errors[] = 'Картинка слишклм маленькая';
		}

		$db_file_name = rand(10000000, 99999999) . "." . $fileExt;
		if ( $fileSize > 10485760 ) {
			$errors[] = "Изображение превышает размер в 10Мб";
		} else if ( !preg_match("/\.(gif|jpg|png|jpeg)$/i", $fileName) ) {
			$errors[] = "Изображение не имеет расширение jpg, jpeg, gif и png. Выберите другое изображение.";
		} else if  ( $fileErrorMsg == 1 ) {
			$errors[] = "Неизвестная ошибка";
		}

		$photoFolderLocation = ROOT . 'data/films/full/';
		$photoFolderLocationMin = ROOT . 'data/films/min/';
		// $photoFolderLocationFull = ROOT . 'data/films/full/';

		$uploadFile = $photoFolderLocation . $db_file_name;
		$moveResult = move_uploaded_file($fileTmpLoc, $uploadFile);

		if ($moveResult != true) {
			$errors[] = 'Ошибка загрузки файла';
		}

		require_once( ROOT . "/functions/image_resize_imagick.php" );
		$target_file = $photoFolderLocation . $db_file_name;
		$reaized_file = $photoFolderLocationMin . $db_file_name;

		$wmax = 137;
		$hmax = 200;
		$img = createThumbnail($target_file, $wmax, $hmax);
		$img->writeImage($reaized_file);

	}

	$query = " 	UPDATE `films` 
							SET title = '" . mysqli_real_escape_string($link, $title) . "', 
									genre = '" . mysqli_real_escape_string($link, $genre) . "', 
									year = '" . mysqli_real_escape_string($link, $year) . "', 
									description = '" . mysqli_real_escape_string($link, $description) . "', 
									photo = '" . mysqli_real_escape_string($link, $db_file_name) . "' 
							WHERE id = ".mysqli_real_escape_string($link, $id)." LIMIT 1";

	 if (mysqli_query($link, $query)) {
	 	$result = true;
	 } else {
	 	$result = false;
	 }

	 return $result;
}

function film_delete($link, $id) {
	$query = "DELETE FROM films WHERE id = '" . mysqli_real_escape_string($link, $id) . "' LIMIT 1";
	mysqli_query($link, $query);

	if (mysqli_affected_rows($link) > 0) {
		$result = true;
	} else {
		$result = false;
	}

	return $result;
}

 ?>