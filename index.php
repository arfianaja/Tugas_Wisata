<?php
    require "fungsi.php";

    $kabupaten = tampil("SELECT * FROM kabupaten");

    $wisata = tampil("SELECT * FROM wisata");

    // var_dump($kabupaten); die();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-xxx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>Tugas Wisata</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/style-1.css">
    <link rel="stylesheet" href="style/style-2.css">
    <link rel="stylesheet" href="style/style-3.css">
    <link rel="stylesheet" href="style/style-4.css">
    <link rel="stylesheet" href="style/style-5.css">
    <link rel="stylesheet" href="style/style-6.css">
    <link rel="stylesheet" href="style/footer.css">
</head>
<body>
    
    <div id="level-1">
        <nav>
            <a href="#level-1"><h1> Tugas Wisata</h1></a>
            <a href="#level-4"><i class="bi bi-signpost-2" style="margin-right: 10px;"></i>Destinasi Wisata</a>
            <a href="#level-6"><i class="bi bi-info-circle" style="margin-right: 10px;" ></i>Tentang</a>
            <a href="login.php"><i class="bi bi-door-open" style="margin-right: 10px;"></i>Login</a>
        </nav>

        <div class="hero-item">
            <h4>MyTrip Today</h4>
            <a href="#level-4" class="btn1">Kategori Wisata</a>
        </div>

    </div>
    
    <div id="level-4">
        <h1><i class="bi bi-signpost-2" style="margin-right: 20px;"></i>Destinasi Wisata</h1>
        <div class="container">
            <?php foreach($wisata as $rows): ?>
            <a class="card" href="tes1.php?id=<?= $rows['id']?>">
                <img src="./image/<?= $rows['foto_wisata']?>" alt="" class="img-container-1">
                <p class="place"><?= $rows['nama_wisata'] ?></p>
                <p class="location"><i class="bi bi-geo-alt-fill" style="margin-right: 10px;"></i><?= $rows['lokasi_wisata']?></p>
            </a>
            <?php endforeach ?>
        </div>
    </div>

    <!-- footer -->
    <footer style="background-color: rgb(88, 88, 88); padding: 20px; border-top: 1px solid #ddd;">
        <form style="max-width: 500px; margin: 0 auto; padding: 20px; background-color: #fff; border-radius: 10px;" action="publik.php" method="post">

            <h3 style="text-align: center; margin-top: 0; color:black;">Kritik & Saran</h3>

            <label for="nama">Nama</label>

            <input type="text" name="nama" id="nama" required style="width: 100%; padding: 5px; " >

            

            <label for="kritik">Kritik dan saran</label>

            <textarea name="kritik" id="kritik" cols="30" rows="5" style="width: 100%; padding: 5px; border: 1px solid #ccc;" required></textarea>

            

            <button type="submit" style="width: 100%; padding: 10px; background-color: #008aff; color: #fff; border: none; border-radius: 5px; font-weight: bold;">Kirim</button>

        </form>

        

        <div style="margin-top: 20px; text-align: center;">

            <hr style="border-top: 1px solid #ddd;">

            <div style="font-size: 20px; padding: 10px;">

            <i class="fa fa-facebook-square"></i>

            <i class="fa fa-twitter-square"></i>

            <i class="fa fa-instagram"></i>

            </div>

        </div>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</body>
</html>