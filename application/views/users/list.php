<div class="row mt40">
	<div class="col-md-10">
		<h2>Users</h2>
	</div>
	<div class="col-md-2">
		<a href="<?php echo base_url('staff/create') ?>" class="btn btn-danger">Add User</a>
	</div>
	<br><br>

	<table class="table table-bordered">
		<thead>
		<tr>
			<th>ID</th>
			<th>Username</th>
			<th>Password</th>
			<th>Type</th>
			<td colspan="2">Action</td>
		</tr>
		</thead>
		<tbody>
		<?php if ($users): ?>
			<?php foreach ($users as $user): ?>
				<tr>
					<td><?php echo $user->id; ?></td>
					<td><?php echo $user->user_name; ?></td>
					<td><?php echo $user->user_password; ?></td>
					<td><?php echo $user->user_type == 1 ? 'Super Admin' : 'Admin'; ?></td>
					<td>
						<a href="<?php echo base_url('staff/edit/' . $user->id) ?>"
						   class="btn btn-primary">Edit</a>
					</td>
					<td>
						<form action="<?php echo base_url('staff/delete/' . $user->id) ?>" method="post">
							<button class="btn btn-danger" type="submit">Delete</button>
						</form>
					</td>
				</tr>
			<?php endforeach; ?>
		<?php endif; ?>
		</tbody>
	</table>
</div>
