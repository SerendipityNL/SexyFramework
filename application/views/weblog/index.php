<h1>Weblog Management</h1>
<div class="row-fluid">
	<div class="span3 well">
		<h2>New weblog</h2>
		<p>To create a new weblog, simply click the button below</p>
		<a class="btn btn-primary" href="weblog/new">New weblog</a>
	</div>
	<div class="span9 well">
		<h2>Weblogs</h2>
		<?php echo $this->render_msg(); ?>
		<?php if ( ! empty($weblogs)): ?>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Title</th>
						<th>Author</th>
						<th>Created at</th>
						<th>Last modifed</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($weblogs as $weblog): ?>
						<tr>
							<td><?php echo $weblog['id']; ?></td>
							<td><?php echo $weblog['title']; ?></td>
							<td><?php echo $weblog['author']; ?></td>
							<td><?php echo $weblog['created_at']; ?></td>
							<td><?php echo $weblog['updated_at']; ?></td>
							<td>
								<a class="btn" href="weblog/view/<?=$weblog['id']?>"><i class="icon-search"></i></a>
								<a class="btn" href="weblog/edit/<?=$weblog['id']?>"><i class="icon-pencil"></i></a>
								<a class="btn btn-danger" href="weblog/delete/<?=$weblog['id']?>"><i class="icon-remove icon-white"></i></a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		<?php else:	?>
			There are no weblogs in the system. Use the button on the left to create one...
		<?php endif; ?>
	</div>
</div>