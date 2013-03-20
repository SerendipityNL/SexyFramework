<h1><?php echo ut('edit_user') ?></h1>
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
		<?php form::label('location_id', ut('location').':', array('class' => 'label')) ?>
		<?php form::select('location_id', $locations, $user['location_id'], array('class' => 'input select')) ?>
	</p>
	<?php if (user::role(100)): ?> 
	<p> 
		<?php
			form::label('role', ut('Rol').':', array('class' => 'label'));
			form::select('role', $roles, $user['role'], array('class' => 'input select'));
		?>
	</p>
	<?php endif; ?>
	<p>
		<a href="cms/users/edit_password/<?php echo $user['id']?>" class="btn">Wachtwoord wijzigen</a>
	</p>
	<p>
		<?php html::a('cms/users', 'Terug', array('class' => 'btn')) ?>
		<?php form::submit( ut('save'), array('class' => 'btn btn-confirm')) ?>
	</p>
<?php form::close() ?>