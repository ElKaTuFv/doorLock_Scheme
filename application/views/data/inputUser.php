<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Data User</title>
</head>

<body>
    <h1>Form Input Data User</h1>

    <form action="<?= site_url("api/postUser"); ?>" method="post">
        <label for="id">RFID ID</label>
        <input type="text" name="rfid_id" id="rfid_id" />
        <br>
        <label for="waktu">Nama</label>
        <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Anda" />
        <br>
        <button type="submit">Submit</button>
    </form>
</body>

</html>