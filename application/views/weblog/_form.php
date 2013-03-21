
<?php echo $this->render_msg(); ?>
<div class="well span9">
<?php form::open() ?>
	<p>
		<?php form::label('title', 'Title:') ?>
		<?php form::textfield('title', $weblog['title'], array('class' => 'input text')) ?>
	</p>
	<p>
		<?php form::label('author', 'Author:') ?>
		<?php form::textfield('author', $weblog['author'], array('class' => 'input text')) ?>
	</p>
	<p>
		<?php form::label('content', 'Content:') ?>
		<?php form::textarea('content', $weblog['content'], array('class' => 'input textarea span9', 'cols' => '100', 'rows' => '10')) ?>
	</p>
	<p>
		<?php html::a('weblog/index', 'Back', array('class' => 'btn btn-danger')) ?>
		<?php form::submit( 'Submit', array('class' => 'btn btn-primary')) ?>
	</p>
<?php form::close() ?>
</div>