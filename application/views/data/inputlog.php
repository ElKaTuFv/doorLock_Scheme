<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Data Log</title>
</head>

<body>
    <h1>Form Input Data Log</h1>

    <form action="<?= site_url("api/postLog"); ?>" method="post">
        <label for="id">RFID ID</label>
        <input type="text" name="rfid_id" id="rfid_id" />
        <br>
        <label for="waktu">Waktu Akses</label>
        <input type="datetime-local" name="waktu" id="waktu" />
        <br>
        <button type="submit">Submit</button>
    </form>
</body>

</html>