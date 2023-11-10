<?php 
    #memulakan fungsi session
    session_start();

    #menyemak kewujudan data post
    if (!empty($_POST)) {
        include("connection.php");
        
        #data validation :had atas had bawah
        if (strlen($_POST['nomborIC']) !=12 or !is_numeric($_POST['nomborIC'])) {
            die("<script>alert('Sila masukkan 12 digit nombor IC');
            window.location.href='pembeli-signup-borang.php'</script>");
        }
        #data validation :numeric (notel)
        if (!is_numeric($_POST['notel'])) {
            die("<script>alert('Nombor telefon perlu berada dalam bentuk angka');
            window.location.href='pembeli-signup-borang.php'</script>");
        }
        #arahan sql untuk menyimpan data pembeli (telefon)
        $sql_simpan_telefon = "INSERT INTO telefon
        (notel, namaPembeli)
        VALUES
        ('".$_POST['notel']."', '".$_POST['namaPembeli']."')";

        #laksanakan kod sql pembeli (telefon)
        $laksana_query_telefon= mysqli_query($condb, $sql_simpan_telefon);

        #arahan sql untuk menyimpan data pembeli (semua kecuali telefon)
        $sql_simpan_pembeli = "INSERT INTO pembeli
        (nokpPembeli, notel, katalaluan_Pembeli)
        VALUES
        ('".$_POST['nomborIC']."', '".$_POST['notel']."', '".$_POST['katalaluan']."')";

        #laksanakan kod sql pembeli (semua kecuali telefon)
        $laksana_query_pembeli= mysqli_query($condb, $sql_simpan_pembeli);

        #menyemak jika proses menyimpan data berjaya atau tidak
        if ($laksana_query_telefon && $laksana_query_pembeli) {
            #jika berjaya papar popup berjaya daftar
            echo "<script>alert('Pendaftaran berjaya');
            window.location.href='index.php';</script>";
        }
        else {
            #jika gagal papar popup gagal daftar
            echo "<script>alert('Pendaftaran gagal');
            window.location.href='pembeli-signup-borang.php';</script>";
        }
    }
    else {
        #jika pengguna membuka fail ini tanpa mengisi data.
        #minta pengguna isi data terlibih dahulu
        echo "<script>alert('Sila lengkapkan maklumat');
        window.location.href='pembeli-signup-borang.php';</script>";
    }

?>