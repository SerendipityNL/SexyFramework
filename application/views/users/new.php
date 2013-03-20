<h1><?php echo ut('new_user') ?></h1>
<?php echo $this->render_msg(); ?>
<?php form::open() ?>
	<p>
		<?php form::label('firstname', ut('firstname').':', array('class' => 'label')) ?>
		<?php form::textfield('firstname', $user['firstname'], array('class' => 'input text')) ?>
	</p>
	<p>
		<?php form::label('lastname', ut('lastname').':', array('class' => 'label')) ?>
		<?php form::textfield('lastname', $user['lastname'], array('class' => 'input text')) ?>
	</p>
	<p>
		<?php form::label('email', ut('email').':', array('class' => 'label')) ?>
		<?php form::textfield('email', $user['email'], array('class' => 'input text')) ?>
	</p>
	<p>
		<?php form::label('password', ut('password').':', array('class' => 'label')) ?>
		<?php form::password('password', $user['password'], array('class' => 'input text')) ?>
	</p>
	<p>
		<?php form::label('location_id', ut('location').':', array('class' => 'label')) ?>
		<?php form::select('location_id', $locations, $user['location_id'], array('class' => 'input select')) ?>
	</p>
	<p>
		<?php form::label('role', ut('Rol').':', array('class' => 'label')) ?>
		<?php form::select('role', $roles, $user['role'], array('class' => 'input select')) ?>
	</p>
	<p>
		<?php html::a('cms/users', 'Terug', array('class' => 'btn')) ?>
		<?php form::submit( ut('save'), array('class' => 'btn btn-confirm')) ?>
	</p>
<?php form::close() ?>