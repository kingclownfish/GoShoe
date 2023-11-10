<?php 
    // memulakan fungsi session
    session_start();

    // memanggil fail guard-admin.php
    include("guard-admin.php");

    // menyemak kewujudan data POST
    if (!empty($_POST)) {
        // memanggil fail connection.php
        include("connection.php");

        // pengesahan data 
        if($_POST['harga_Seunit'] <= 0){
            die("<script>alert('Sila letak maklumat yang sah');
            window.history.back();</script>");
        }
        // arahan sql untuk kemaskini maklumat kasut
        $arahan = "UPDATE kasut set 
                    harga_Seunit = '".$_POST['harga_Seunit']."',
                    namaKasut = '".$_POST['namaKasut']."',
                    warna = '".$_POST['warna']."',
                    saiz = '".$_POST['saiz']."'
                    WHERE 
                        id_Kasut = '".$_GET['id_Kasut_lama']."' ";

        // melaksanakan dan menyemak proses kemaskini
        if (mysqli_query($condb, $arahan)) {
            echo "<script>alert('KEMASKINI BERJAYA!');
            window.location.href = 'senarai-kasut-admin.php';</script>";
        }
        else {
            // kemaskini gagal
            echo "<script>alert('KEMASKINI GAGAL!');
            window.location.back();</script>";
        }
    }
    else {
        // data POST empty
        die("<script>alert('sila lengkapkan data');
        window.location.herf = 'senarai-kasut.php';</script>");
    }
?>
