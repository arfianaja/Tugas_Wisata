<?php

    require "fungsi.php";
    if (publik($_POST)>0){
        echo "
            <script>
                alert('Kritik Anda telah dikirim')
                document.location.href='index.php'
            </script>
        ";
    }
    else {
        echo "
            <script>
                alert('Kritik Anda gagal dikirim')
                document.location.href='index.php'
            </script>
        ";
    }

?>