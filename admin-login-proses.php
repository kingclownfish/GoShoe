<?php 
    #memulakan fungsi session
    session_start();
    #menyemak kewujudan data post yang dihantar dari admin-login-borang.php
    if(!empty($_POST["kod_admin"]) and !empty($_POST['katalaluan_admin'])){
        #memanggil fail connection.php
        include('connection.php');

        #arahan SQL query untuk membandingkan data yang dimasukkan 
        #wujud di pangkalan data atau tidak 
        $query_login = "SELECT* FROM admin
        where
                kod_Admin = '".$_POST['kod_admin']."'
        and     katalaluan_Admin = '".$_POST['katalaluan_admin']."' ";

        #melaksanakan arahan membandingkan data
        $laksana_query = mysqli_query($condb, $query_login);

        #jika terdapat 1 data yang sepadan, login berjaya
        if(mysqli_num_rows($laksana_query) == 1){
            #mengambil data yang ditemui
            $m = mysqli_fetch_array($laksana_query);

            #mengumpukkan kepada pembolehubah session
            $_SESSION["kod_admin"] = $m['kod_Admin'];
            $_SESSION['tahap'] = "admin";

            #membuka laman index.php
            echo "<script>window.location.href= 'index.php';</script>";
        }
        else {
            #login gagal. kembali ke laman admin-login-borang.php
            die("<script>alert('Login Gagal');
            window.location.href='admin-login-borang.php';</script>");
        }               
    }
    else{
        #data yang dihantar dari laman admin-login-borang.php kosong
        die("<script>alert('Sila masukkan kod_admin and katalaluan');
        window.location.href='admin-login-borang.php';</script>");
    }
?>