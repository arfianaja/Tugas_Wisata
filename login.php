<?php 

    session_start();
    require './fungsi.php';

    if(isset($_SESSION['login']) == true ){
        header("location: admin-page.php");
    }

    if(isset($_POST['login'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

        $data = mysqli_query($koneksi, "SELECT * FROM `admin` WHERE username = '$username'");

        if(mysqli_num_rows($data) === 1) {
            $row = mysqli_fetch_assoc($data);

            if($row['password'] === $password){
                $_SESSION['login'] = true;
                header("location: admin-page.php");
                exit;
            }
        }

        $error = true;

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>LOGIN</title>
    <link rel="stylesheet" href="style/style-login.css">
</head>
<body>
    <nav>
        <a href="index.php#level-1"><h1><img src="image/logo.png" alt="" srcset="" width="25px"> Tugas Wisata</h1></a>
        <a href="index.php#level-4"><i class="bi bi-signpost-2" style="margin-right: 10px;"></i>Destinasi Wisata</a>
        <a href="index.php#level-5"><i class="bi bi-chat-square-text" style="margin-right: 10px;"></i>Pengaduan Publik</a>
        <a href="login.php"><i class="bi bi-door-open" style="margin-right: 10px;"></i>Login</a>
    </nav>
    <div class="login">
        <div class="circle"></div>

        <?php 

            if(isset($error)){
                echo "
                    <script>
                        alert('username atau password salah!!')
                    </script>
                ";
            }
        
        ?>

        <form action="" method="post">
            <h1>Login</h1>
            <input type="text" name="username" id="username" placeholder="username" autocomplete="off">
            <input type="password" name="password" id="password" placeholder="password">
            <p class="kecil">*Hanya admin yang dapat mengubah data</p>
            <button type="submit" name="login">Masuk</button>
        </form>
    </div>
</body>
</html>