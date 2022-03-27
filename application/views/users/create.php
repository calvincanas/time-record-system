<div class="row">
	<div class="col-lg-12 mt40">
		<div class="pull-left">
			<h2>Add User</h2>
		</div>
	</div>
</div>


<form action="<?php echo base_url('staff/store') ?>" method="POST" id="create-user-form">
	<input type="hidden" name="id">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<strong>Username</strong>
				<input type="text" name="user_name" class="form-control" placeholder="Username">
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<strong>Password</strong>
				<input type="password" name="password" id="password-input" class="form-control" placeholder="Password">
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<strong>User Type</strong>
				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" id="userTypeOne" name="user_type" value="1" class="custom-control-input">
					<label class="custom-control-label" for="userTypeOne">Super Admin</label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" id="userTypeTwo" name="user_type" value="2" class="custom-control-input">
					<label class="custom-control-label" for="userTypeTwo">Admin</label>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<button type="button" id="password-generator-btn" class="btn btn-secondary">Generate Password</button>
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</div>
</form>



<script>
	function generatePassword(minimum, maximum) {
		let pass = '';
		let str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		let numbers = '0123456789';
		let specialCharacters = '<>!@#$%ˆ&*';
		let length = Math.floor(Math.random() * (maximum - minimum));
		length += minimum;

		for (let i = 1; i <= length; i++) {
			let char = Math.floor(Math.random() * str.length);
			pass += str.charAt(char)
		}
		pass += numbers.charAt(Math.floor(Math.random() * numbers.length));
		pass += specialCharacters.charAt(Math.floor(Math.random() * specialCharacters.length));

		return pass;
	}

	function checkPassword(str) {
		let re = /^(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9!@#$%^&*]{10,}$/;
		return re.test(str);
	}

	$('#create-user-form').submit(function (e) {
		var passwordValue = $('#password-input').val();
		if (!checkPassword(passwordValue)) {
			alert('Password should contain a lowercase, uppercase, number, and special character. Minimum of 10 characters.');
			return false;
		}
		$(this).submit();
	});

	$('#password-generator-btn').click(function () {
		const generatedPassword = generatePassword(10, 16);
		console.log(generatedPassword);
		$('#password-input').val(generatedPassword);
	});
</script>
