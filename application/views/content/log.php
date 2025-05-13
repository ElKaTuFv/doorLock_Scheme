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
</head>

<body>
	<div class="header">
		<a href="" class="logo"><img src="<?php echo base_url(); ?>/assets/img/logo_doorlock.png" class="img-circle" width="30"><b> DoorLock.</b></a>
		<button><a href="<?php echo base_url("auth/logoutProcess"); ?>">logout</a></button>
	</div>
	<div class="sidebar">
		<a href="home" class="<?php if ($this->uri->segment(1) == 'home') echo 'active_menu'; ?>"><i class="fa fa-house"></i> Dashboard</a>
		<a href="log" class="<?php if ($this->uri->segment(1) == 'log') echo 'active_menu'; ?>"><i class="fa-regular fa-clock"></i> Log</a>
	</div>
	<div class="content">
		<div class="header-content">
			<div class="welcome"><?php echo $title; ?></div>
		</div>
		<div class="body-content">
			<table id="table" class="table table-striped" style="width:100%">
				<thead>
					<tr>
						<th class="text-center">RFID</th>
						<th class="text-center">Nama</th>
						<th class="text-center">Waktu Akses</th>
						<th class="text-center">Tanggal Akses</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($data_log as $d) { ?>
						<tr>
							<td><?php echo $d->rfid_id; ?></td>
							<td><?php echo $d->nama; ?></td>
							<td class="text-center"><?php echo $d->waktu; ?></td>
							<td class="text-center"><?php echo $d->tanggal; ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
	<script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
	<script>
		new DataTable('#table');
	</script>

</body>

</html>