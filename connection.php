<?php

    $nama_host = "localhost";
    $nama_sql = "root";
    $pass_sql = "";
    $nama_db = "goshoe1";
    
    $condb = mysqli_connect($nama_host, $nama_sql, $pass_sql, $nama_db);

    // menguji adakah hubungan berjaya dibuka
    if(!$condb){
        die("Sambungan ke pangkalan data gagal");
    }
    else{
        #echo "Sambungan ke pangkalan data berjaya";
    }

?>