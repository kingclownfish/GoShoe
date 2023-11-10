<?php 
    #memulakan fungsi session
    session_start();

    include('guard-pembeli.php');

    #menyemak kewujudan data GET nokp pembeli
    if (!empty($_GET)) {
        #memanggil fail connection.php
        include('connection.php');

        // arahan untuk memadam data kasut berdasarkan id_kasut yang dihantar (GET)
        $arahan = "DELETE FROM pesanan 
                  WHERE 
                  id_Kasut ='".$_GET['id_Kasut']."'
              AND nokpPembeli = '".$_SESSION['nomborIC']."' ";

        // melaksanakan arahan dan menguji proses padam rekod
        if (mysqli_query($condb, $arahan)) {
            // jika data berjaya dipadam. papar popup             
            echo "<script>alert('PADAM BERJAYA');
            window.location.href = 'senarai-tempahan.php';</script>";
        }
        else {
            #jika data gagal dipadam.papar popup
            echo "<script>alert('PADAM GAGAL!');
            window.location.href = 'senarai-tempahan.php'</script>";
        }
    }
    else {
        // jika data GET tidak wujud (empty). papar popup
        die("<script>alert('Ralat! Tiada data ');
        window.location.herf = 'senarai-tempahan.php';</script>");
    }
    
?>