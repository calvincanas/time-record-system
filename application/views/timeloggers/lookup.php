<div class="row">
	<div class="col-lg-12 mt40">
		<div class="pull-left">
			<h2>Scan / Search Employee</h2>
		</div>
	</div>
</div>

<div class="col-md-4">
	<video id="preview" style="width: 100%; height: 100%;"></video>
</div>
<div class="col-md-8">
	<div id="status-wrapper">Waiting ...</div>
	<hr>

	<form action="<?php echo base_url('timelogger/process_lookup') ?>" method="POST">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<strong>Employee ID</strong>
					<input type="number" name="employee_id" id="employee-id" class="form-control" placeholder="">
				</div>
			</div>
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary">Search</button>
			</div>
		</div>
	</form>
</div>


<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">

	function isInt(value) {
		var x;
		if (isNaN(value)) {
			return false;
		}
		x = parseFloat(value);
		return (x | 0) === x;
	}

	let lookupProcessUrl = '<?php echo base_url('timelogger/process_lookup') ?>';
	let scanner = new Instascan.Scanner({
		video: document.getElementById('preview')
	});

	scanner.addListener('scan', function (content) {
		console.log(content, isInt(content));
		if (isInt(content)) {
			scanner.stop()
				.then(function () {
					$('#status-wrapper').text('Processing ...');
					$.post(lookupProcessUrl, {
						id: content
					}, function (response) {
						let respData = JSON.parse(response);
						console.log(response, JSON.parse(response));
						alert(respData.status + ' - ' + respData.message);

						Instascan.Camera.getCameras().then(function (cameras) {
							if (cameras.length > 0) {
								$('#status-wrapper').text('Waiting ...');
								scanner.start(cameras[0]);
							} else {
								alert('No cameras found.');
							}
						}).catch(function (e) {
							alert(e);
						});
					})
				})
		}
	});

	Instascan.Camera.getCameras().then(function (cameras) {
		if (cameras.length > 0) {
			scanner.start(cameras[0]);
		} else {
			alert('No cameras found.');
		}
	}).catch(function (e) {
		alert(e);
	});


	$("form").submit(function (event) {
		let formData = {
			id: $("#employee-id").val()
		};

		scanner.stop()
			.then(function () {
				$('#status-wrapper').text('Processing ...');
				$.post(lookupProcessUrl, formData, function (response) {
					$('#employee-id').val('');
					let respData = JSON.parse(response);
					console.log(response, JSON.parse(response));
					alert(respData.status + ' - ' + respData.message);

					Instascan.Camera.getCameras().then(function (cameras) {
						if (cameras.length > 0) {
							$('#status-wrapper').text('Waiting ...');
							scanner.start(cameras[0]);
						} else {
							alert('No cameras found.');
						}
					}).catch(function (e) {
						alert(e);
					});
				})
			})

		event.preventDefault();
	});
</script>
