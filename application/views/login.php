<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login Page</title>
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

	<div class="row">
		<div class="col-lg-12 mt40">
			<div class="pull-left">
				<h2>Login</h2>
			</div>
		</div>
	</div>


	<form action="<?php echo base_url('login/process') ?>" method="POST" name="login_form" id="login-form">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<strong>Username</strong>
					<input type="text" name="username" class="form-control" placeholder="Username">
					<span class="text-danger"><?php echo form_error('username'); ?></span>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<strong>Password</strong>
					<input type="password" name="password" id="password-input" class="form-control"
						   placeholder="Password">
					<span class="text-danger"><?php echo form_error('password'); ?></span>
				</div>
			</div>
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary">Submit</button>
				<?php
				echo '<label class="text-danger">' . $this->session->flashdata("error") . '</label>';
				?>
			</div>
		</div>
</div>
</body>
</html>
