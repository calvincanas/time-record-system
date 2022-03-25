<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Add Employee</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"
		  rel="stylesheet">
	<style>
		.mt40 {
			margin-top: 40px;
		}
	</style>
</head>
<body>

<div class="container">
	<div class="row mt40">
		<div class="col-md-10">
			<h2>Employees</h2>
		</div>
		<div class="col-md-2">
			<a href="<?php echo base_url('employee/create') ?>" class="btn btn-danger">Add Employee</a>
		</div>
		<br><br>

		<table class="table table-bordered">
			<thead>
			<tr>
				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<td colspan="3">Action</td>
			</tr>
			</thead>
			<tbody>
			<?php if ($employees): ?>
				<?php foreach ($employees as $employee): ?>
					<tr>
						<td><?php echo $employee->id; ?></td>
						<td><?php echo $employee->first_name; ?></td>
						<td><?php echo $employee->last_name; ?></td>
						<td>View Logs</td>
						<td>
							<a href="<?php echo base_url('employee/edit/' . $employee->id) ?>" class="btn btn-primary">Edit</a>
						</td>
						<td>
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
</body>
</html>