<?php 

    require '../fungsi.php';

    if(hapus_kritik($_GET["id"]) > 0) {
        echo "
            <script>
                alert('Kritik telah di hapus')
                document.location.href='../admin-page.php'
            </script>
        ";
    } else {
        echo "
            <script>
                alert('terjadi kesalahan')
                document.location.href='../admin-page.php'
            </script>
        ";
    }

?>