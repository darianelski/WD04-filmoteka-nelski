<h1 class="title-1">Добавить новый фильм</h1>

<div class="panel-holder mt-30 mb-40">
	<form action="new.php" method="POST">

		<?php 

		if (!empty($errors)) {
			foreach ($errors as $error) {
				echo '<div class="notify notify--error mb-20">' . $error . '</div>'; 
			}
		}
		 ?>

		<div class="form-group">
			<label class="label">Название фильма
				<input value="<?php echo (isset($_POST['title'])) ? $_POST['title'] : '' ?>" class="input" name="title" type="text" placeholder="Такси 2" />
			</label>
		</div>
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label class="label">Жанр
						<input value="<?php echo (isset($_POST['genre'])) ? $_POST['genre'] : '' ?>" class="input" name="genre" type="text" placeholder="комедия" />
					</label>
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label class="label">Год
						<input value="<?php echo (isset($_POST['year'])) ? $_POST['year'] : '' ?>" class="input" name="year" type="text" placeholder="2000" />
					</label>
				</div> 
			</div>
		</div>
		<textarea class="textarea mb-20" name="description" placeholder="Введите описание фильма"></textarea>
		<div class="mb-20">
			<input class="inputfile" type="file" name="photo" id="file-3" data-multiple-caption="{count} файлов выбрано"/>
			<label for="file-3">Выбрать файл</label>
			<span class="needed"></span>
		</div>
		<input class="button" type="submit" name="newFilm" value="Добавить" />
	</form>
</div>