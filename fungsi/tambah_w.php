<?php 

    require '../fungsi.php';

    if(tambah_wis($_POST) > 0) {
        echo "
            <script>
                alert('data telah di tambah')
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