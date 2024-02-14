<?php
    session_start();
    require "fungsi.php";

    if (!isset($_SESSION['login'])) {
        header('location: index.php');
        exit;
    }

    $krisar = tampil("SELECT * FROM pengaduan");
    $wisata = tampil("SELECT * FROM wisata");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="style/styleadmin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <script src="admin.js" defer></script>
</head>
<body>
    <div class="dashboard">
        <h1>Wisata<span>Tugas</span></h1>
        <div class="wrapper">
            <p>Halaman<br><span>admin</span></p>
            <button class="btn"><i class="fas fa-suitcase-rolling"></i> Destinasi Wisata</button>
            <button class="btn"><i class="bi bi-chat-left-dots"></i> kritik dan saran</button>
            <button class="btn"><i class="bi bi-box-arrow-left"></i> keluar</button>
        </div>
    </div>
    <div class="container">
        <table border="1" class="my-table">
            <thead>
                <th>No.</th>
                <th>Nama Wisata</th>
                <th>Lokasi Wisata</th>
                <th>Aksi</th>
            </thead>
            <button id="tambahWisataBtn" class="btn hide" onclick="location.href='tambah_wisata.php'"><i class="fas fa-plus"></i> Tambah Wisata</button>
            <tbody>
            <?php
            $i = 0;
            if (!empty($wisata)) {
                foreach ($wisata as $rows) :
            ?>
                <tr>
                    <td> <?php echo $i + 1 ?></td>
                    <td> <?php echo htmlspecialchars($rows['nama_wisata']) ?></td>
                    <td> <?php echo htmlspecialchars($rows['lokasi_wisata']) ?></td>
                    <td>
                        <a href="edit_wisata.php?id=<?= $rows['id'] ?>">Edit</a>
                        <a href="hapus_wisata.php?id=<?= $rows['id'] ?>">Hapus</a>
                    </td>
                </tr>
            <?php
                $i++;
                endforeach;
            } else {
                // Tampilkan tabel kosong
                echo '<tr><td colspan="4">Tidak ada data wisata</td></tr>';
            }
            ?>
            </tbody>
            
        </table>

        <table border="1" class="my-table hide">
            <thead>
                <th>No.</th>
                <th>Nama Pengadu</th>
                <th>Kritik dan Saran</th>
                <th>Edit</th>
            </thead>
            <tbody>
            <?php
            $i = 0;
            if (!empty($krisar)) {
                foreach ($krisar as $rows) :
            ?>
                    <tr>
                        <td> <?php echo $i + 1?></td>
                        <td> <?php echo htmlspecialchars($rows['nama_pengadu'])?></td>
                        <td> <?php echo htmlspecialchars($rows['kritik_saran'])?></td>
                        <td>
                            <a href="./fungsi/hapus_kritik.php?id=<?= $rows['id'] ?>">hapus</a>
                        </td>
                    </tr>
            <?php
                $i++;
                endforeach;
            } else {
                echo '<tr><td colspan="4">Tidak ada kritik dan saran</td></tr>';
            }
            ?>
            </tbody>
        </table>
    </div>

    <script>
    const btnDestinasiWisata = document.querySelector('.btn:nth-child(1)');
    const btnKritikSaran = document.querySelector('.btn:nth-child(2)');
    const btnKeluar = document.querySelector('.btn:last-child');
    
    const tambahWisataBtn = document.getElementById('tambahWisataBtn');

    btnDestinasiWisata.addEventListener('click', function () {
        // Tampilkan tabel destinasi wisata dan sembunyikan tabel kritik saran
        document.querySelector('.my-table:nth-child(2)').classList.add('hide');
        document.querySelector('.my-table:nth-child(1)').classList.remove('hide');

        // Tampilkan tombol "Tambah Wisata"
        tambahWisataBtn.classList.remove('hide');
    });

    btnKritikSaran.addEventListener('click', function () {
        // Tampilkan tabel kritik saran dan sembunyikan tabel destinasi wisata
        document.querySelector('.my-table:nth-child(1)').classList.add('hide');
        document.querySelector('.my-table:nth-child(2)').classList.remove('hide');

        // Sembunyikan tombol "Tambah Wisata"
        tambahWisataBtn.classList.add('hide');
    });

    btnKeluar.addEventListener('click', function(){
        document.location.href = '../fungsi/logout.php'
    });

</script>
<script src="https://kit.fontawesome.com/your-fontawesome-kit-id.js" crossorigin="anonymous"></script>
</body>
</html>
