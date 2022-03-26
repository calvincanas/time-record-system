<div class="row mt40">
	<div class="col-md-10">
		<h2>Employee Time Record</h2>
	</div>

	<table class="table table-bordered">
		<thead>
		<tr>
			<th>ID</th>
			<th>Mode</th>
			<th>Date Added</th>
		</tr>
		</thead>
		<tbody>
		<?php if ($records): ?>
			<?php foreach ($records as $employee_log): ?>
				<tr>
					<td><?php echo $employee_log->id; ?></td>
					<td><?php echo $employee_log->mode; ?></td>
					<td><?php echo $employee_log->created_at; ?></td>
				</tr>
			<?php endforeach; ?>
		<?php endif; ?>
		</tbody>
	</table>
</div>
