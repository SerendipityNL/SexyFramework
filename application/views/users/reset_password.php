<h1>Wachtwoord resetten</h1>
<?php if($password_changed != 1): ?>
	<?php form::open('reset_password?token='.$_GET['token']) ?>
		<p>
			<?php form::label('password', ut('new_password').':', array('class' => 'label')) ?>
			<?php form::password('password', '', array('class' => 'input text', 'size' => '35')) ?>
		</p>
		<p>
			<?php form::label('password_repeat', ut('repeat_password').':', array('class' => 'label')) ?>
			<?php form::password('password_repeat', '', array('class' => 'input text', 'size' => '35')) ?>
		</p>
		<p>
			<?php form::hidden('token', $_GET['token']) ?>
			<?php form::submit( ut('change'), array('class' => 'btn btn-confirm')) ?>
			<?php echo html::a('login', ut('cancel')) ?>
		</p>
	<?php form::close() ?>
<?php else: ?>
	<p class="green"><?php echo ut('password_changed') ?></p>
	<p><?php echo html::a('login', ut('login')) ?></p>
<?php endif; ?>