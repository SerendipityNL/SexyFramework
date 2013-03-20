<div class="float-right">
	<?php html::a('cms/users/new', ut('new_user'), array('class' => 'btn btn-grey')) ?>
</div>
<h1><?php echo ut('users') ?></h1>
<?php echo $this->render_msg(); ?>
<?php if( ! empty($users)): ?>
	<table class="table-striped">
		<thead>
			<tr>
				<th><?php echo ut('email') ?></th>
				<th><?php echo ut('firstname') ?></th>
				<th><?php echo ut('lastname') ?></th>
				<th><?php echo ut('location') ?></th>
				<th><?php echo ut('role') ?></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($users as $u): ?>
				<tr>
					<td><?php echo $u['email'] ?></td>
					<td><?php echo $u['firstname']; ?></td>
					<td><?php echo $u['lastname'] ?></td>
					<td><?php echo $u['location_name'] ?></td>
					<td><?php echo $u['role_name'] ?></td>
					<td style="text-align: right">
						<?php html::a('cms/users/delete/'.$u['id'], '<i class="icon icon-delete"></i>') ?>
						<?php html::a('cms/users/edit/'.$u['id'], '<i class="icon icon-edit"></i>') ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php else: ?>
<p><?php echo ut('no_users_found') ?>..</p>
<?php endif; ?>