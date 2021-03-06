<div class="row">
	<div class="col-lg-12 mt40">
		<div class="pull-left">
			<h2>Edit User</h2>
		</div>
	</div>
</div>


<form action="<?php echo base_url('staff/store/') ?>" method="POST">
	<input type="hidden" name="id" value="<?php echo $user->id ?>">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<strong>Username</strong>
				<input type="text" name="user_name" class="form-control" placeholder="Username"
					   value="<?php echo $user->user_name ?>">
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<strong>Password</strong>
				<input type="password" name="password" class="form-control" placeholder="Password"
					   value="<?php echo $user->user_password ?>">
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<strong>User Type</strong>
				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" id="userTypeOne" name="user_type" value="1" class="custom-control-input" <?php echo $user->user_type == 1 ? 'checked="checked"' : '' ?>>
					<label class="custom-control-label" for="userTypeOne">Super Admin</label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" id="userTypeTwo" name="user_type" value="2" class="custom-control-input" <?php echo $user->user_type == 2 ? 'checked="checked"' : '' ?>>
					<label class="custom-control-label" for="userTypeTwo">Admin</label>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</div>
</form>
