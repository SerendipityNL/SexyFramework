<h1><?php echo ut('edit_password') ?></h1>
<?php echo $this->render_msg(); ?>
<?php form::open() ?>
	<p>
		<?php form::label('password', ut('password').':', array('class' => 'label')) ?>
		<?php form::password('password', '', array('class' => 'input text')) ?>		
	</p>
	<p>
		<?php form::label('new_password', ut('new_password').':', array('class' => 'label')) ?>
		<?php form::password('new_password','', array('class' => 'input text')) ?>		
	</p>
	<p>
		<?php form::label('new_password_repeated', ut('repeat_new_password').':', array('class' => 'label')) ?>
		<?php form::password('new_password_repeated', '', array('class' => 'input text')) ?>		
	</p>
	<p>
		<?php html::a('cms/users/edit_password/'.$user->id, 'Terug', array('class' => 'btn')) ?>
		<?php form::submit( ut('save'), array('class' => 'btn btn-confirm')) ?>
	</p>
<?php form::close() ?>