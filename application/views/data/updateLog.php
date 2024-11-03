<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form Update Data Log</title>
</head>

<body>
	<h1>Form Update Data Log</h1>

	<form action="<?= site_url("api/putLog/" . $log->id); ?>" method="post">
		<label for="id">RFID ID</label>
		<input type="text" name="rfid_id" id="rfid_id" value="<?= $log->rfid_id; ?>" />
		<br>
		<label for="waktu">Waktu Akses</label>
		<input type="datetime-local" name="waktu" id="waktu" value="<?= $log->waktu; ?>" />
		<br>
		<label for="status">status</label>
		<select name="status" id="status" value="<?= $log->status; ?>">
			<option value="Terbuka" <?php if ($log->status == 'Terbuka') echo 'selected'; ?>>Terbuka</option>
			<option value="Tertutup" <?php if ($log->status == 'Tertutup') echo 'selected'; ?>>Tertutup</option>
		</select>
		<br>
		<button type="submit">Submit</button>
	</form>
</body>

</html>