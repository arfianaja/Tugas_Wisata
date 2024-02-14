<?php 

    require '../fungsi.php';

    if(edit_wis($_POST) > 0) {
        echo "
            <script>
                alert('data telah di ubah')
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