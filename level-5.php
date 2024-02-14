
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/styleLevel-5.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body>
    <div class="container">
        <a href="index.php"><i class="bi bi-arrow-left" style="margin-right: 10px;"></i>Kembali</a>
        <div class="publik">            
            <div class="hero">
                <h1>Pengaduan Publik</h1>
                <p>Kritik dan saran sangat membantu kami</p>
            </div>
            <div class="dalam">
                <form action="publik.php" method="post">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" required>
                    <label for="kritik" require>Kritik dan saran</label>
                    <textarea name="kritik" id="kritik" cols="30" rows="10"></textarea>
                    <button type="submit">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>