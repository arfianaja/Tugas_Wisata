<?php 

    require 'fungsi.php';

    $id = $_GET["id"];

    if(hapus_wis($id) > 0) {
        echo "
            <script>
                alert('Wisata telah di hapus')
                document.location.href='admin-page.php'
            </script>
        ";
    } else {
        echo "
            <script>
                alert('terjadi kesalahan')
                document.location.href='admin-page.php'
            </script>
        ";
    }

?>