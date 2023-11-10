<?php 
  #memulakan fungsi session
  session_start();

  #menyemak kewujudan data POST
  if (!empty($_POST)) {
    include("connection.php");

    #arahan sql query untuk menympan data jenama baru
    $sql_simpan_jenama="INSERT INTO jenama
    (kod_jenama, jenama)
    VALUES
    ('".$_POST['kod_jenama']."', '".$_POST['jenama']."')";

    #melaksanakan kod sql
    $laksana_query = mysqli_query($condb, $sql_simpan_jenama);

    if ($laksana_query) {
      #jenama berjaya disimpan
      die("<script>alert('Pendaftaran Jenama Berjaya');
      window.location.href='daftar-kasut-borang.php'</script>");
    }
    else{
      #jenama gagal untuk simpan
      die("<script>alert('Pendaftaran Jenama Gagal');
      window.history.back();</script>");
    }
  }
  else {
    #data POST tidak wujud
    die("<script>alert('Sila lengkapkan maklumat');
    window.location.href='daftar-jenama-borang.php'</script>");
  }

?>