<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form Update Data User</title>
</head>

<body>
	<h1>Form Update Data User</h1>

	<form action="<?= site_url("api/putUser/" . $user->id); ?>" method="post">
		<label for="id">RFID ID</label>
		<input type="text" name="rfid_id" id="rfid_id" value="<?= $user->rfid_id; ?>" />
		<br>
		<label for="waktu">Nama</label>
		<input type="text" name="nama" id="nama" value="<?= $user->nama; ?>" placeholder="Masukkan Nama Anda" />
		<br>
		<button type="submit">Submit</button>
	</form>
</body>

</html>