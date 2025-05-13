<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<title>Tabel Log</title>
</head>

<body>
	<table class="table">

		<head>
			<th>No</th>
			<th>Nama</th>
			<th>Waktu</th>
			<th>Status</th>
		</head>

		<body>
			<h1>Tabel data Log</h1>
			<?php foreach ($dataLog as $key => $value) : ?>
				<tr>
					<td><?= $key + 1; ?></td>
					<td><?= $value->nama; ?></td>
					<td><?= $value->waktu; ?></td>
					<td><?= $value->status; ?></td>
				</tr>
			<?php endforeach; ?>
		</body>
	</table>
</body>

</html>