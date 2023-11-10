<?php
 #memulakan fungsi session
    session_start();

    #menymak kewujudan data post
    if (!empty($_POST)) {
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $tarikh_tempah = date("y-m-d");
        include('connection.php');

        #arahan query untuk menyimpan data pesanan
        $sql_simpan = "INSERT INTO pesanan
                      (nokpPembeli, id_Kasut, kuantiti, jum_Harga, tarikh_Pesan)
                      VALUES
                      ('".$_SESSION['nomborIC']."', '".$_POST['id_Kasut']."', '".$_POST['kuantiti']."', '".$_POST['jumlah_harga']."', '$tarikh_tempah')";

        #lakssanakan arahan untuk menympan data pesanan
        $laksana_query = mysqli_query($condb, $sql_simpan);

        // menyemak samada proese menyimpan data pesanan berjaya atau tidak 
        if ($laksana_query) {
            die("<script>alert('Penempahan berjaya');
                        window.location.href='senarai-tempahan.php';</script>");
        }
        else {
        #jika gagal 
          echo mysqli_error($condb); die();
          die("<script>alert('Penempahan Gagal');
              window.location.href='pembeli-tempah-borang.php';</script>");
        }
    }
    else {
        die("<script>alert('Sila lengkapkan maklumat');
        window.location.href='pembeli-tempah-borang.php';</script>");
    }

?> 