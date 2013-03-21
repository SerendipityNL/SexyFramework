<h1>SexyFramework Weblog</h1>
<?php
if ( ! empty($weblogs)):
	foreach ($weblogs as $weblog):
	?>
	<div class="span12 well">
		<h2><?php echo $weblog['title'];?></h2>
		<small><strong><?php echo $weblog['author'];?></strong> on <?php echo $weblog['created_at'];?></small>
		<?php if ($weblog['created_at'] != $weblog['updated_at']): ?>
			<small><strong>Last update:</strong> <?php echo $weblog['updated_at'];?></small></br>
		<?php endif; ?>
		<p><?php echo $weblog['content'];?></p>
		<a class="btn btn-primary" href="frontpage/view/<?php echo $weblog['id'];?>">Read more</a>
	</div>
	<? endforeach;
else: ?>
There are no weblogs yet!
<?php endif; ?>