<div class="span12 well">
	<h2><?php echo $weblog['title'];?></h2>
	<small><strong>Author:</strong> <?php echo $weblog['author'];?></small></br>
	<small><strong>Created at: </strong><?php echo $weblog['created_at'];?></small></br>
	<?php if ($weblog['created_at'] != $weblog['updated_at']): ?>
		<small><strong>Last update: </strong><?php echo $weblog['updated_at'];?></small></br>
	<?php endif; ?>
	<p><?php echo $weblog['content'];?></p>
</div>