<div class="title-1">Информация о фильме</div>

		<div class="card mb-20">
			<div class="row">
				<div class="col-auto">
					<img src="<?=HOST?>php-lessons/WD04-filmoteka-nelski/data/films/full/<?=$film['photo']?>" alt="<?=$film['title']?>">
				</div>
				<div class="col">
					<div class="card__header">
						<h4 class="title-4"><?=$film['title']?></h4>
						<div class="buttons">

							<?php 

							if (isset($_SESSION['user'])) {
								if ($_SESSION['user'] == 'admin') { 

							?>
									<a href="edit.php?id=<?=$film['id']?>" class="button button--edit">Редактировать</a>
									<a href="index.php?action=delete&id=<?=$film['id']?>" class="button button--removesmall">Удалить</a>
									
							<?php } 
								
								}

							?>

							
						</div>
					</div>
					<div class="badge"><?=$film['genre']?></div>
					<div class="badge"><?=$film['year']?></div>
					<div class="user-content">
						<p><?=$film['description']?></p>
					</div>
				</div>
			</div>
			
			
			
		</div>