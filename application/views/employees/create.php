<div class="row">
	<div class="col-lg-12 mt40">
		<div class="pull-left">
			<h2>Add Employee</h2>
		</div>
	</div>
</div>


<form action="<?php echo base_url('employee/store') ?>" method="POST">
	<input type="hidden" name="id">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<strong>Title</strong>
				<input type="text" name="first_name" class="form-control" placeholder="First Name">
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<strong>Title</strong>
				<input type="text" name="last_name" class="form-control" placeholder="Last Name">
			</div>
		</div>
		<div class="col-md-12">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</div>
</form>



