<?php
    require "fungsi.php";

    $kabupaten = tampil("SELECT * FROM kabupaten");

    // var_dump($kabupaten); die();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Tabel Kabupaten</h3>
    <table cellpading="5px" cellspacing="0" border="1px">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Kecamatan</th>
                <th>Jumlah Penduduk</th>
                <th>Luas Wilayah</th>
                <th>Jumlah Desa</th>
                <th>Jumlah Kelurahan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($kabupaten as $i => $rows) :
            ?>
            <tr>
                <td> <?php echo $i+1?></td>
                <td> <?php echo $rows['nama_kecamatan']?></td>
                <td> <?php echo $rows['jumlah_penduduk']?>jiwa</td>
                <td> <?php echo $rows['luas_wilayah']?>km2</td>
                <td> <?php echo $rows['jumlah_desa']?></td>
                <td> <?php echo $rows['jumlah_kelurahaan']?></td>
                <td>
                    <a href="">
                        <button>edit</button>
                    </a>
                    <a href="">
                        <button>hapus</button>
                    </a>
                </td>
            </tr>
            <?php
                endforeach;
            ?>
        </tbody>
    </table>
</body>
</html>