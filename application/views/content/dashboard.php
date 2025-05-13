<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $title; ?></title>
	<script src="https://kit.fontawesome.com/1ac5100e06.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<script src="https://cdn.tailwindcss.com"></script>
	<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<style>
		.card-custom {
			border: 1px solid #e3e6f0;
			border-radius: 0.35rem;
			padding: 1rem;
			background-color: #ffffff;
		}

		.card-custom .card-body {
			display: flex;
			justify-content: space-between;
			align-items: center;
		}

		.card-custom .card-body .info {
			text-align: left;
		}

		.card-custom .card-body .info .number {
			font-size: 2rem;
			font-weight: bold;
			color: #343a40;
		}

		.card-custom .card-body .info .label {
			color: #6c757d;
		}

		.card-custom .card-body .icon {
			background-color: #f8f9fc;
			border-radius: 0.35rem;
			padding: 0.5rem;
		}

		.card-custom .card-footer {
			text-align: left;
			padding-top: 0.5rem;
		}

		.card-custom .card-footer a {
			color: #e74a3b;
			text-decoration: none;
		}

		.card-custom .card-footer a:hover {
			text-decoration: underline;
		}
	</style>
</head>

<body>
	<div class="header">
		<a href="" class="logo"> <img src="<?php echo base_url(); ?>/assets/img/logo_doorlock.png" class="img-circle" width="30"> <b> DoorLock. </b></a>
		<button> <a href="<?php echo base_url("auth/logoutProcess"); ?>"> logout </a></button>
	</div>
	<div class="sidebar">
		<a href="home" class="<?php if ($this->uri->segment(1) == 'home') echo 'active_menu'; ?>"> <i class="fa fa-house"> </i> Dashboard</a>
		<a href="log" class="<?php if ($this->uri->segment(1) == 'log') echo 'active_menu'; ?>"> <i class="fa-regular fa-clock"> </i> Log</a>
	</div>
	<div class="content">
		<div class="header-content mb-3">
			<div class="welcome"> Welcome <span> <?php echo $this->session->userdata('username'); ?> </span> !!.</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="card">
					<div class="card-header d-inline-flex">
						<div class="col text-start">
							<h2> Data User Akses </h2>
						</div>
						<div class="col col-2 text-end">
							<a href="<?php echo base_url("/reg_id"); ?>" class="text-center text-white btn btn-primary"> Tambah User </a>
						</div>
					</div>
					<table id="table" class="table table-striped" style="width:100%">
						<thead>
							<tr>
								<th> No </th>
								<th> Nama </th>
								<th> RFID </th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 1;
							foreach ($dataUser as $d) { ?> <tr>
									<td> <?php echo $i++; ?> </td>
									<td> <?php echo $d->nama; ?> </td>
									<td> <?php echo $d->rfid_id; ?> </td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col">
				<div class="row mb-3">
					<div class="col">
						<div class="card-custom">
							<div class="card-body">
								<div class="info">
									<div class="number" id="userAkses">
										<?php echo count($dataUser) ?> </div>
									<div class="label">
										Data user akses </div>
								</div>
								<div class="icon">
									<i class="fa fa-user"> </i>
								</div>
							</div>
							<!-- <div class="card-footer">
								<a href="#">

									<i class="fas fa-arrow-down">
									</i>
								</a>
							</div> -->
						</div>
					</div>
					<div class="col">
						<div class="card-custom">
							<div class="card-body">
								<div class="info">
									<div class="number" id="dataAksesHariIni">
										<?php echo count($dataAksesHariIni) ?> </div>
									<div class="label">
										Data user akses Hari Ini </div>
								</div>
								<div class="icon">
									<i class="fa fa-user"> </i>
								</div>
							</div>
							<!-- <div class="card-footer">
								<a href="#">
									View all dosen <i class="fas fa-arrow-down">
									</i>
								</a>
							</div> -->
						</div>
					</div>
				</div>
				<!-- <div class="card mb-4">
					<h2> User Akses Hari Ini </h2>
				</div> -->
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
	<script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
	<script>
		function fetchData() {
			$.ajax({
				url: 'http://localhost/doorLock_5B/Dashboard/getDataHariIni', // Update URL as needed
				type: 'GET',
				dataType: 'json',
				success: function(response) {
					// Update the data values
					$('#UserAkses').text(response.dataUser);
					$('#dataAksesHariIni').text(response.dataAksesHariIni);
				},
				error: function() {
					console.error('Error fetching data');
				}
			});
		}

		// Call fetchData every 1 second
		setInterval(fetchData, 1000);


		new DataTable('#table');
	</script>
</body>

</html>