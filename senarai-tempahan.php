<?php 

    session_start();

    include('header.php');
    include('connection.php');
    include('guard-pembeli.php');

?>
<link rel="stylesheet" href="senarai-tempahan-style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Braah+One&display=swap" rel="stylesheet">
<h3>SENARAI TEMPAHAN</h3>
<?php 

    $sql_pilihan = "SELECT * FROM pesanan, pembeli, kasut, jenama 
                    WHERE
                    kasut.kod_jenama = jenama.kod_jenama
                AND pembeli.nokpPembeli = pesanan.nokpPembeli
                AND kasut.id_Kasut = pesanan.id_Kasut
                AND pembeli.nokpPembeli = '".$_SESSION['nomborIC']."'
                ORDER BY pesanan.tarikh_Pesan DESC";

    $laksana_pilihan = mysqli_query($condb, $sql_pilihan);

    if (mysqli_num_rows($laksana_pilihan)==0) {
        echo 'tiada tempahan yang anda buat.';
    }
    else {
        echo "
        <div class='box-cetak'><button class='butang-cetak' onclick =\"window.print()\">Cetak</button></div>
        <table border ='1' id='saiz' class='table-tempahan'>";
        while ($n=mysqli_fetch_array($laksana_pilihan)) {
            $data_get=array(
                'namaKasut' => $n['namaKasut'],
                'jenama' => $n['jenama'],
                'warna' => $n['warna'],
                'saiz' => $n['saiz'],
                'harga_Seunit' => $n['harga_Seunit'],
                'gambar' => $n['gambar'],
                'id_Kasut' => $n['id_Kasut'],
            );  
            echo "<tr> 
                    <td class='td-img'><img width = '80%' src='img/".$n['gambar']."'></td>
                    <td class='td-desc'>
                        <div class='div-info'>
                            Nama Kasut<br>
                            Jenama<br>
                            Warna<br>
                            Saiz<br>
                            Kuantiti<br>
                            Harga<br>
                            Jumlah Harga<br>
                            Tarikh Pesan<br>
                        </div>
                        <div class='div-desc'>
                        : ".$n['namaKasut']."<br>
                        : ".$n['jenama']."<br>
                        : ".$n['warna']."<br>   
                        : ".$n['saiz']."<br>
                        : ".$n['kuantiti']."<br>
                        : RM".$n['harga_Seunit']."<br>
                        : RM".$n['jum_Harga']."<br>
                        : ".date("d-m-Y", strtotime($n['tarikh_Pesan']))."<br>
                        </div>
                    </td>
                    <td class='butang'>
                        <span class='kuantiti'>Kuantiti</span> : ".$n['kuantiti']."<br>
                        <div class='ubah-kuantiti'><a href='pembeli-tempah-ubahkuantiti.php?".http_build_query($data_get)."'><button>Ubah Kuantiti</button></a></div>
                        <div><a href='pembeli-padam-pesanan.php?id_Kasut=".$n['id_Kasut']."'
                            onClick=\"return confirm('Anda pasti anda ingin memadam tempahan ini.')\"><button>Hapus</button></a></div>
                </td>
                </tr>";
        }
        echo "</table>";
    }
?>
<?php include('footer.php'); ?>