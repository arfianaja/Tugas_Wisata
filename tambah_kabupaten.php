<?php 
require 'fungsi.php';
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

        <h1>Tambah Data Kabupaten</h1>

        <form action="./fungsi/tambah_k.php" method="post" enctype="multipart/form-data">
            <label for="nama">nama : </label>
            <input type="text" name="nama_kecamatan" id="nama" >
            <label for="penduduk">penduduk : </label>
            <input type="text" name="jumlah_penduduk" id="penduduk" >
            <label for="wilayah">luas wilayah : </label>
            <input type="text" name="luas_wilayah" id="wilayah" >
            <label for="desa">jumlah desa : </label>
            <input type="text" name="jumlah_desa" id="desa" >
            <label for="lurah">jumlah kelurahan</label>
            <input type="text" name="jumlah_kelurahaan" id="lurah" >
            <button type="submit">submit</button>
        </form>
    </div>
    
</body>
</html>