<?php 

    require 'fungsi.php';

    $id = $_GET["id"];

    $result = tampil("SELECT * FROM kabupaten WHERE id = $id")[0];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/edit_kabupaten.css">
    <title>Document</title>
</head>
<body>

    <div class="container">

        <h1>Edit Data Kabupaten</h1>

        <form action="./fungsi/edit_k.php" method="post">
            <label for="id">id : </label>
            <input type="text" id="id" name="id" value="<?= $result['id'] ?>" readonly>
            <label for="nama">nama : </label>
            <input type="text" name="nama_kecamatan" id="nama" value="<?= $result['nama_kecamatan'] ?>">
            <label for="penduduk">penduduk : </label>
            <input type="text" name="jumlah_penduduk" id="penduduk" value="<?= $result['jumlah_penduduk'] ?>">
            <label for="wilayah">luas wilayah : </label>
            <input type="text" name="luas_wilayah" id="wilayah" value="<?= $result['luas_wilayah'] ?>">
            <label for="desa">jumlah desa : </label>
            <input type="text" name="jumlah_desa" id="desa" value="<?= $result['jumlah_desa'] ?>">
            <label for="lurah">jumlah kelurahan</label>
            <input type="text" name="jumlah_kelurahaan" id="lurah" value="<?= $result['jumlah_kelurahaan'] ?>">
            <button type="submit">submit</button>
        </form>
    </div>
    
</body>
</html>