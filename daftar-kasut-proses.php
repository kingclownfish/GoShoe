<?php 
    // memulakan fungsi SESSION
    session_start();

    // menyemak kewujudan data post
    if(!empty($_POST)){

        // memanggil fail connection
        include('connection.php');

        // data validation : harga kasut tidak boleh kurang atau sama dengan RM0
        if($_POST['harga_Seunit'] <= 0){
            die("<script>alert('Ralat pada harga');
            window.history.back();</script>");
        }
        // memproses maklumat gambar yang di upload
        // proses ini lebih kepada menukar nama fail gambar
        $timestmp = date("Y-m-d-His");
        $nama_fail = basename($_FILES['gambar']["name"]);
        $format_gambar = pathinfo($nama_fail, PATHINFO_EXTENSION);
        $lokasi = $_FILES['gambar']['tmp_name'];
        $nama_baru = $timestmp.".".$format_gambar;

        #arahan sql untuk menyimpan data kasut baru
        $sql_simpan_kasut= "INSERT INTO kasut 
        (namaKasut, kod_jenama, warna, saiz, harga_Seunit, gambar) 
        VALUES
        ('".$_POST['namaKasut']."', '".$_POST['kod_jenama']."', '".$_POST['warna']."', '".$_POST['saiz']."', '".$_POST['harga_Seunit']."', '$nama_baru')";

        #laksakan arahan sql
        $laksana_sql_kasut = mysqli_query($condb, $sql_simpan_kasut);

        // menyemak proses melaksanakan berjaya atau tidak
        if($laksana_sql_kasut){
            // muat naik gambar
            move_uploaded_file($lokasi,"img/".$nama_baru);

            // jika berjaya kembali ke fail senarai-kasut.php
            die("<script>alert('Pendaftaran Berjaya');
            window.location.href = 'senarai-kasut-admin.php'</script>");
        }
        else {
            // jika gagal
            die("<script>alert('Pendaftaran Gagal');
            window.history.back();</script>");
        }
    }
    else {
        // jika maklumat kasut diisi tidak lengkap
        die("<script>alert('Sila lengkapkan maklumat');
        window.location.href = 'daftar-kasut-borang.php2'</script>");
    }
    
?>