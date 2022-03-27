<div class="row mt40">
	<div class="col-md-8">
		<h2>Employees</h2>
	</div>
	<div class="col-md-4">
		<a href="<?php echo base_url('employee/create') ?>" class="btn btn-primary">Add Employee</a>
		<button id="mass-delete-btn" class="btn btn-danger">Mass Delete</button>
	</div>
	<br><br>
</div>
<div class="row mt40">
	<div class="col-md-12">
		<table id="employees-table" class="table table-bordered">
			<thead>
			<tr>
				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Time Record Logs</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php if ($employees): ?>
				<?php foreach ($employees as $employee): ?>
					<tr>
						<td><?php echo $employee->id; ?></td>
						<td><?php echo $employee->first_name; ?></td>
						<td><?php echo $employee->last_name; ?></td>
						<td><a href="<?php echo base_url('timelogger/record/' . $employee->id) ?>"
							   class="btn btn-primary">View Time Record</a></td>
						<td>
							<a href="<?php echo base_url('employee/edit/' . $employee->id) ?>"
							   class="btn btn-primary">Edit</a>
							<form action="<?php echo base_url('employee/delete/' . $employee->id) ?>" method="post">
								<button class="btn btn-danger" type="submit">Delete</button>
							</form>
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
		var table = $('#employees-table').DataTable({
			select: {
				style: 'multi'
			}
		});

		$('#mass-delete-btn').on('click', function () {
			var ids = $.map(table.rows('.selected').data(), function (item) {
				return item[0]
			});

			if (ids.length > 0) {
				var postUrl = '<?php echo base_url('employee/deletes') ?>';

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
