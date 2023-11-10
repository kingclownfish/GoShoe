<?php
    #memulakan fungsi session
    session_start();

    #memanggil fail header.php dan fail connection.php
    include('header.php');
    include('connection.php');
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Braah+One&display=swap" rel="stylesheet">
<link rel="stylesheet" href="index-style.css">
<!-- tajuk menu utama -->
<h3>TAWARAN KASUT TERMURAH !!!</h3>
<?php
    // arahan sql untuk memaparkan senarai kasut yang termurah
    $sql_pilih = "SELECT* FROM kasut, jenama
    where
        kasut.kod_jenama = jenama.kod_jenama
    ORDER BY harga_Seunit ASC limit 3";
    #laksanakan kod sql
    $laksana_pilih = mysqli_query($condb,$sql_pilih);

    // jika tiada data kasut dalam jadual kasut
    if (mysqli_num_rows($laksana_pilih) == 0) {
        echo "Tiada kasut yang telah direkodkan";
    }
    // jika ada data kasut dalam jadual kasut
    else {
        echo "<table border = '1'>";

        while($n = mysqli_fetch_array($laksana_pilih)){
            $data_get = array(
                'namaKasut' => $n['namaKasut'],
                'kod_jenama' => $n['kod_jenama'],
                'jenama' => $n['jenama'],
                'warna' => $n['warna'],
                'saiz' => $n['saiz'],
                'harga_Seunit' => $n['harga_Seunit'],
                'gambar' => $n['gambar'],
                'id_Kasut' => $n['id_Kasut'],
            );
            echo "<tr> 
                        <td class='td-img'><img width = '50%' src = 'img/".$n['gambar']."'</td>
                        <td class='td-desc'>
                            <div class='div-info'>
                                Nama Kasut<br>
                                Jenama<br>
                                Warna<br>
                                Saiz<br>
                            </div>
                            <div class='div-desc'>
                            : ".$n['namaKasut']."<br>
                            : ".$n['jenama']."<br>
                            : ".$n['warna']."<br>
                            : ".$n['saiz']."<br>
                            </div>
                        </td>
                        <td class='div-price'>
                            <div class='div-harga'>
                                HARGA<br>
                            </div>
                            RM".$n['harga_Seunit']."<br>
                            <br>
                            <a class='link-tempah' href='pembeli-tempah-borang2.php?".http_build_query($data_get)."'>
                                        <button class='butang-tempah'>TEMPAH</button></a>
                        </td>
                </tr>";
        }
        echo "</table>";
    }
?>
<?php include('footer.php') ?>