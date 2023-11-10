<?php

    session_start();

    include('connection.php');
    include('guard-pembeli.php');
    include('header.php');

?>
<link rel="stylesheet" href="senaraikasut-pembeli.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Braah+One&display=swap" rel="stylesheet">
<h3>SENARAI KASUT</h3>
<div class='arahan-extra'><i>Kasut yang dibeli tidak akan dipaparkan</i><br></div>
<br>
<?php include("butang-saiz.php") ?>
<div id="saiz" class="container-senarai-kasut-pembeli">
    <?php 
        $tambahan ="";
        $tambahan_jenama ="";
        $tambahan_warna ="";
        $tambahan_saiz ="";
        if (!empty($_POST['jenama'])) {
            $tambahan_jenama = "AND kasut.jenama = '".$_POST['jenama']."'";
        }

        $arahan_papar = "SELECT* FROM kasut, jenama
        where 
            kasut.kod_jenama = jenama.kod_jenama AND
            kasut.id_Kasut not in(select id_Kasut from pesanan)
            order by kasut.id_Kasut DESC";
        
        $laksana = mysqli_query($condb, $arahan_papar);

        while ($m=mysqli_fetch_array($laksana)) {
            $data_get = array(
                'namaKasut' => $m['namaKasut'],
                'kod_jenama' => $m['kod_jenama'],
                'jenama' => $m['jenama'],
                'warna' => $m['warna'],
                'saiz' => $m['saiz'],
                'harga_Seunit' => $m['harga_Seunit'],
                'gambar' => $m['gambar'],
                'id_Kasut' => $m['id_Kasut'],
            );
            echo" <link rel='stylesheet' href='style.css'> 
                    <div class='content'>
                        <img class='gambar-kasut-belumtempah' width='40%' src='img/".$m['gambar']."'>
                        <br>
                        <div class='div-info'>
                            Nama Kasut<br>
                            Jenama<br>
                            Warna<br>
                            Saiz<br>
                            Harga<br>
                        </div>
                        <div class='div-desc'>
                            : &nbsp".$m['namaKasut']."<br>
                            : &nbsp".$m['jenama']."<br>
                            : &nbsp".$m['warna']."<br>
                            : &nbsp".$m['saiz']."<br>
                            : &nbspRM".$m['harga_Seunit']."<br>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <a class='link-tempah' href='pembeli-tempah-borang2.php?".http_build_query($data_get)."'>
                                        <button class='butang-tempah'>TEMPAH</button></a>
                </div>";
        }
    ?>
</div>  
<?php include('footer.php') ?>