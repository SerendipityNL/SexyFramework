<h1>Wachtwoord vergeten</h1>

<?php if ($mail_send != 1): ?>
	<?php form::open() ?>
		<p><?php echo ut('insert_email_forgot_password') ?>.</p>
		<p>
			<?php form::label('email', ut('email').':', array('class' => 'label')) ?>
			<?php form::textfield('email', $user->email, array('class' => 'input text', 'size' => '35')) ?>
		</p>
		<p>
			<?php form::submit( ut('send'), array('class' => 'btn btn-confirm')) ?>
			<?php echo html::a('login', ut('cancel')) ?>
		</p>
	<?php form::close() ?>
<?php else: ?>
	<p class="green"><?php echo ut('email_send') ?></p>
<?php endif; ?>