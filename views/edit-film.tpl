<h1 class="title-1">Редактировать фильм <?=$film['title']?></h1>

<div class="panel-holder mt-30 mb-40">
	<form enctype="multipart/form-data" action="edit.php?id=<?=$film['id']?>" method="POST">

		<?php 

		if (!empty($errors)) {
			foreach ($errors as $error) {
				echo '<div class="notify notify--error mb-20">' . $error . '</div>'; 
			}
		}
		 ?>

		<div class="form-group"><label class="label">Название фильма<input class="input" name="title" type="text" placeholder="Такси 2" value="<?=$film['title']?>" /></label></div>
		<div class="row">
			<div class="col">
				<div class="form-group"><label class="label">Жанр<input class="input" name="genre" type="text" placeholder="комедия"  value="<?=$film['genre']?>" /></label></div>
			</div>
			<div class="col">
				<div class="form-group"><label class="label">Год<input class="input" name="year" type="text" placeholder="2000" value="<?=$film['year']?>"/></label></div>
			</div>
		</div>
		<textarea class="textarea mb-20" name="description" placeholder="Введите описание фильма"><?=$film['description']?></textarea>
		<div class="mb-20">
			<input class="inputfile" type="file" name="photo" id="file-2" data-multiple-caption="{count} файлов выбрано"/>
			<label for="file-2">Выбрать файл</label>
			<span class="needed"></span>
		</div>
		<input class="button" type="submit" name="updateFilm" value="Обновить" />
	</form>
</div>