<?php 
    // memulakan fungsi session
    session_start();

    include('guard-admin.php');

    // menyemak kewujudan data GET
    if (!empty($_GET)) {
        // memanggil fail connection.php
        include('connection.php');

        // arahan kod SQL bagi memadamkan data pesanan berdasarkan data GET id_Kasut dan data GET nokpPembeli
        $arahan = "DELETE FROM pesanan 
        WHERE 
              id_Kasut ='".$_GET['id_Kasut']."'
        AND nokpPembeli = '".$_GET['nokpPembeli']."'";

        // melaksanakan arahan dan menguji proses padam rekod
        if (mysqli_query($condb, $arahan)) {
            // jika data dapat dipadam
            echo "<script>alert('PADAM BERJAYA');
            window.location.href = 'senarai-pesanan.php';</script>";
        }
        else {
            // jika data gagal untuk padam
            echo "<script>alert('PADAM GAGAL!');
            window.location.href = 'senarai-pesanan.php'</script>";
        }
    }
    else {
        // jika data GET tidak wujud
        die("<script>alert('Ralat! akses secara terus');
        window.location.herf = 'senarai-pesanan.php';</script>");
    }
    
?>