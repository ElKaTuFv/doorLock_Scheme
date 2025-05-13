<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo 'Register RFID'; ?></title>
	<script src="https://kit.fontawesome.com/1ac5100e06.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body>
	<div class="header">
		<a href="" class="logo"><img src="<?php echo base_url(); ?>/assets/img/logo_doorlock.png" class="img-circle" width="30"><b> DoorLock.</b></a>
		<button><a href="<?php echo base_url("auth/logoutProcess"); ?>">logout</a></button>
	</div>
	<div class="sidebar">
		<a href="home" class="active_menu"><i class="fa fa-house"></i> Dashboard</a>
		<a href="log" class=""><i class="fa-regular fa-clock"></i> Log</a>
	</div>
	<div class="content">
		<div class="header-content">
			<div class="welcome text-center">Register ID</div>
		</div>
		<div class="body-content">
			<div class="row gap-5 justify-content-center">
				<div class="card col-sm-6 text-start">
					<form action="<?php echo base_url("reg_id/addUser"); ?>" method="post">
						<label for="rfid_id">RFID ID</label>
						<input class="form-control" type="text" name="rfid_id" id="rfid_id" placeholder="">
						<label for="rfid_id">Nama</label>
						<input class="form-control" type="text" name="nama" placeholder="">
						<div class="d-flex justify-content-end">
							<button class="btn btn-primary mt-2" type="submit" name="submit">Daftar</button>
						</div>
					</form>
				</div>
				<div class="card col-sm-5 justify-content-center">
					<h1 class="text-black">Tap Kartu pada RFID</h1>
					<button class="btn btn-success w-50 mt-3 align-self-center" id="btn-scan">Scan</button>
				</div>
			</div>
		</div>
	</div>


	<script>
		// Fetch data from server every 1 second
		function getIdRFID() {
			$.ajax({
				url: 'http://localhost/doorLock_5B/Dashboard/getId', // Update URL as needed
				type: 'GET',
				dataType: 'json',
				success: function(response) {
					console.log(response);
					// Update the data values
					$('#rfid_id').val(response);

				},
				error: function() {
					console.error('Error fetching data');
				}
			});
		}

		$('#btn-scan').on('click', function() {
			// Panggil fungsi getIdRFID saat tombol diklik
			getIdRFID();
		});
	</script>

</body>

</html>