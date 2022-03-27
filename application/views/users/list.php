<div class="row mt40">
	<div class="col-md-8">
		<h2>Users</h2>
	</div>
	<div class="col-md-4">
		<a href="<?php echo base_url('staff/create') ?>" class="btn btn-primary">Add User</a>
		<button id="mass-delete-btn" class="btn btn-danger">Mass Delete</button>
	</div>
	<br><br>
</div>
<div class="row mt40">
	<div class="col-md-12">
		<table id="users-table" class="table table-bordered">
			<thead>
			<tr>
				<th>ID</th>
				<th>Username</th>
				<th>Password</th>
				<th>Type</th>
				<th>Action</th>
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
							<?php if ($user->id != $this->session->userdata('user_id')): ?>
								<a href="<?php echo base_url('staff/edit/' . $user->id) ?>"
								   class="btn btn-primary">Edit</a>
							<?php else: ?>
								<button disabled class="btn btn-primary">Edit</button>
							<?php endif; ?>
							<?php if ($user->id != $this->session->userdata('user_id')): ?>
								<form action="<?php echo base_url('staff/delete/' . $user->id) ?>" method="post">
									<button class="btn btn-danger" type="submit">Delete</button>
								</form>
							<?php else: ?>
								<button disabled class="btn btn-danger">Delete</button>
							<?php endif; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>

<style>
	form {
		display: inline-block;
	}
</style>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.4/css/select.dataTables.min.css">
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.4/js/dataTables.select.min.js"></script>
<script>
	$(document).ready(function () {
		var table = $('#users-table').DataTable({
			select: {
				style: 'multi'
			}
		});

		$('#mass-delete-btn').on('click', function () {
			var ids = $.map(table.rows('.selected').data(), function (item) {
				return item[0]
			});

			if (ids.length > 0) {
				var postUrl = '<?php echo base_url('staff/deletes') ?>';

				fetch(postUrl, {
					method: "POST",
					headers: {
						'Accept': 'application/json',
						'Content-Type': 'application/json'
					},
					body: JSON.stringify({
						ids
					})
				}).then((response) => {
					window.location.reload()
				})
			}

		});
	});


</script>
