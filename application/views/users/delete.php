<h1><?php echo ut('delete_user') ?></h1>
<p><?php echo ut('delete_user_confirm') ?> (<?php echo $user->firstname.' '.$user->lastname ?>)</p>
<?php form::open() ?>
	<?php html::a('cms/users', 'Terug', array('class' => 'btn')) ?>
	<?php form::submit(ut('delete'), array('class' => 'btn btn-danger', 'name' => 'delete')) ?>
<?php form::close() ?>