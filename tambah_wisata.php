<?php
require 'fungsi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have sanitized the input data (e.g., using mysqli_real_escape_string or prepared statements)
    $nama_wisata = $_POST['nama_wisata'];
    $lokasi_wisata = $_POST['lokasi_wisata'];
    $deskripsi_wisata = $_POST['deskripsi_wisata'];

    // Assuming you have validated and processed the image uploads (not shown in your provided code)

    // Insert the data into the 'wisata' table
    $result = tambah_wis([
        'nama_wisata' => $nama_wisata,
        'lokasi_wisata' => $lokasi_wisata,
        'deskripsi_wisata' => $deskripsi_wisata,
        // Add other fields if needed
    ]);

    if ($result) {
        echo 'Data wisata berhasil ditambahkan.';
    } else {
        echo 'Gagal menambahkan data wisata.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/edit_kabupaten.css">
    <title>Tambah Data Wisata</title>
</head>
<body>

    <div class="container">

        <h1>Tambah Data Wisata</h1>

        <form action="./fungsi/tambah_w.php" method="post" enctype="multipart/form-data">
            <label for="nama">Nama: </label>
            <input type="text" name="nama_wisata" id="nama" required>
            <label for="lokasi">Lokasi: </label>
            <input type="text" name="lokasi_wisata" id="lokasi" required>
            <label for="foto_wisata">Gambar 1: </label>
            <input type="file" name="foto_wisata" id="foto_wisata" required accept="image/*">
            <label for="foto2_wisata">Gambar 2: </label>
            <input type="file" name="foto2_wisata" id="foto2_wisata" required accept="image/*">
            <label for="desc">Deskripsi: </label>
            <textarea name="deskripsi_wisata" id="desc" cols="50" rows="10" required></textarea>
            <button type="submit">Submit</button>
        </form>
    </div>
    
</body>
</html>
