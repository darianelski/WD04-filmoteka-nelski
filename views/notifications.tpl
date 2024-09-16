<?php if (@$resultSuccess !='') { ?>
	<div class="notify notify--success"><?=$resultSuccess?></div>
<?php } ?>

<?php if (@$resultInfo !='') { ?>
	<div class="info-notification"><?=$resultInfo?></div>
<?php } ?>

<?php if (@$resultError !='') { ?>
	<div class="notify notify--error mb-20"><?=$resultError?></div>
<?php } ?>