<?php 
    #memulakan fungsi session
    session_start();

    // menyemak kewujudan data post yang dihantar dari pembeli-login-borang
    if (!empty($_POST['nomborIC']) and !empty($_POST['katalaluan'])) {
        #memanggil fail connection.php
        include('connection.php');

        #arahan SQL query untuk membandingkan data yang dimasukkan 
        #wujud di pangkalan data atau tidak 
        $query_login = "SELECT * from pembeli
        where 
                nokpPembeli          = '".$_POST['nomborIC']."'
        and     katalaluan_Pembeli   = '".$_POST['katalaluan']."' Limit 1";

         #melaksanakan arahan membandingkan data
        $laksana_query = mysqli_query($condb, $query_login);

        #jika terdapat 1 data yang sepadan, login berjaya
        if (mysqli_num_rows($laksana_query)==1) {
            
            $m = mysqli_fetch_array($laksana_query);

            #mengumpukkan kepada pembolehubah session
            $_SESSION['tahap'] = "pembeli";
            $_SESSION['nomborIC'] = $m['nokpPembeli'];

             #membuka laman index.php
            echo "<script>window.location.href='index.php';</script>";
        }
        else {
            #login gagal. kembali ke laman admin-login-borang.php
            echo "<script>alert('LOGIN GAGAL');
            window.location.href='pembeli-login-borang.php';</script>";
        }
    }
    else {
        #data yang dihantar dari laman admin-login-borang.php kosong
        echo"<script>alert('Sila masukkan Nombor IC and Katalaluan');
        window.location.href='pembeli-login-borang.php';</script>";
    }

?>