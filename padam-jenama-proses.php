<?php 
    // memulakan fungsi SESSION
    session_start();

    include('guard-admin.php');

    // menyemak kewujudan data GET jenama
    if (!empty($_GET)) {
        // memanggil fail connection.php
        include('connection.php');

        // arahan kod sql untuk memadam jenama berdasarkan kod_jenama yang dihantar (GET)
        $arahan = "DELETE FROM jenama WHERE kod_jenama ='".$_GET['kod_jenama']."'";

        // melaksanakan arahan dan menguji proses padam rekod
        if (mysqli_query($condb, $arahan)) {
            // jika data dapat dipadam
            echo "<script>alert('PADAM BERJAYA');
            window.location.href = 'daftar-jenama-borang.php';</script>";
        }
        else {
            // jika data gagal untuk padam
            echo "<script>alert('PADAM GAGAL!');
            window.location.href = 'daftar-jenama-borang.php'</script>";
        }
    }
    else {
        // jika data GET tidak wujud
        die("<script>alert('Ralat! akses secara terus');
        window.location.herf = 'daftar-jenama-borang.php';</script>");
    }
    
?>