<?php

    session_start();

    include('connection.php');
    include('guard-pembeli.php');
    include('header.php');

?>
<link rel="stylesheet" href="style.css">
<h3>SENARAI KASUT</h3>
<?php include('butang-saiz.php'); ?>
<?php 
    $tambahan ="";
    $tambahan_jenama ="";
    $tambahan_warna ="";
    $tambahan_saiz ="";
    if (!empty($_POST['jenama'])) {
        $tambahan_jenama = "AND kasut.jenama = '".$_POST['jenama']."'";
    }
    if (!empty($_POST['warna'])) {
        $tambahan_warna = "AND kasut.warna = '".$_POST['warna']."'";
    }
    if (!empty($_POST['saiz'])) {
        $tambahan_saiz = "AND kasut.saiz = '".$_POST['saiz']."'";
    }
    $arahan_papar = "SELECT* FROM kasut
    where 
        kasut.id_Kasut not in(select id_Kasut from pesanan)
        order by kasut.id_Kasut DESC";
    
    $laksana = mysqli_query($condb, $arahan_papar);

    while ($m=mysqli_fetch_array($laksana)) {
        $data_get = array(
            'namaKasut' => $m['namaKasut'],
            'jenama' => $m['jenama'],
            'warna' => $m['warna'],
            'saiz' => $m['saiz'],
            'harga_Seunit' => $m['harga_Seunit'],
            'gambar' => $m['gambar'],
            'id_Kasut' => $m['id_Kasut'],
        );
      }
?>
<?php include('footer.php') ?>