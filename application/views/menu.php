<div class="row">
	<div class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content bg-dark">
		<div>
			<ul class="nav justify-content-left">
				<li class="nav-item">
					<a class="nav-link text-light" href="<?php echo base_url('login/success') ?>">Dashboard</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-light" href="<?php echo base_url('timelogger/lookup') ?>">Employee Time Record</a>
				</li>
				<?php if ($this->session->userdata('user_type') == 1): ?>
				<li class="nav-item">
					<a class="nav-link text-light" href="<?php echo base_url('staff/index') ?>">Users</a>
				</li>
				<?php endif; ?>
				<?php if ($this->session->userdata('user_type') == 1): ?>
				<li class="nav-item">
					<a class="nav-link text-light" href="<?php echo base_url('employee/index') ?>">Employees</a>
				</li>
				<?php endif; ?>
				<li class="nav-item">
					<a class="nav-link text-light" href="<?php echo base_url('login/logout') ?>">Logout</a>
				</li>
			</ul>
		</div>
	</div>
</div>
