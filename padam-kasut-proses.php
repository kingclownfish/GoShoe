<?php 
    // memulakan fungsi session
    session_start();

    include('guard-admin.php');

    // menyemak kewujudan data POST
    if (!empty($_GET)) {
        // memanggil fail connection.php
        include('connection.php');

        // arahan kod sql untuk memadam kasut berdasarkan id_Kasut yang dihantar (GET)
        $arahan = "DELETE FROM kasut WHERE id_Kasut ='".$_GET['id_Kasut']."'";

        // melaksanakan arahan dan menguji proses padam rekod
        if (mysqli_query($condb, $arahan)) {
            // jika data dapat dipadam
            echo "<script>alert('PADAM BERJAYA');
            window.location.href = 'senarai-kasut-admin.php';</script>";
        }
        else {
            // jika data gagal untuk padam
            echo "<script>alert('PADAM GAGAL!');
            window.location.href = 'senarai-kasut-admin.php'</script>";
        }
    }
    else {
        // jika data GET tidak wujud
        die("<script>alert('Ralat! akses secara terus');
        window.location.herf = 'senarai-kasut-admin.php';</script>");
    }
    
?>