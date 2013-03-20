<h1><?php echo $location['name'] ?></h1>
<?php echo $this->render_msg(); ?>
<?php form::open() ?>
	<p>
		<?php form::label('email', ut('email').':', array('class' => 'label')) ?>
		<?php form::textfield('email', $user['email'], array('class' => 'input text', 'size' => '35')) ?>
	</p>
	<p>
		<?php form::label('password', ut('password').':', array('class' => 'label')) ?>
		<?php form::password('password', $user['password'], array('class' => 'input text', 'size' => '35')) ?>
	</p>
	<p>
		<?php form::submit( ut('login'), array('class' => 'btn btn-confirm')) ?>
		<?php echo html::a('forgot_password', ut('forgot_password').'?') ?>
	</p>
<?php form::close() ?>
<script type="text/javascript">
	$('input[name="email"]').focus();
</script>