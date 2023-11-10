<?php 

    session_start();

    include('connection.php');
    include('header.php');
    include('guard-pembeli.php');

?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Braah+One&display=swap" rel="stylesheet">
<link rel='stylesheet' href='carian-style.css'>
<!-- borang pemilihan kasut -->
<form action="" method = 'POST'>
    <div class='container-carian'>
        <div class='jenama'>
            <div class='pilihan-jenama'>
                <select name="jenama">
                    <option selected disabled>Sila Pilih Jenama</option>
                    <?php 
                        #arahan SQL untuk memaparkan jenama yang ada dalam jadual jenama
                        $sql_jenama = "SELECT* FROM jenama order by jenama";
                        #laksanakan code SQL
                        $laksana_jenama = mysqli_query($condb, $sql_jenama);
                        while ($m=mysqli_fetch_array($laksana_jenama)) {    
                            echo "<option value='".$m['jenama']."'>".$m['jenama']."</option>";
                        }
                    ?>
                </select>
            </div> 
        </div>
        <br>
        <!-- butang cari -->
        <div class='cari'>
            <input class='butang-cari' type="submit" value='Cari'>
        </div>          
    </div>
</form>
    <div class='selepas-carian'>
        <?php 
        #memeriksa jika terdapat carian
        if (!empty($_POST['jenama'])) {
            #umpukan syarat SQL tambahan jenama kasut
            $tambahan = "";
            $carian_jenama='';

            if (!empty($_POST['jenama'])) {
                $tambahan = $tambahan." "."AND jenama.jenama = '".$_POST['jenama']."'";
                $carian_jenama = $carian_jenama. "<span class='jenama-dicari'>JENAMA : ".$_POST['jenama']."</span><br>";
            }

            echo $carian_jenama;
            #arahan SQL query untuk memaparkan kasut berdasarkan jenama yang dipilih
            $sql_pilihan = "SELECT id_Kasut, namaKasut, jenama, warna, saiz, harga_Seunit, gambar from kasut, jenama
                            where kasut.kod_jenama = jenama.kod_jenama
                            and   jenama.jenama = jenama.jenama
                                $tambahan
                            and id_Kasut not in(select id_Kasut from pesanan)
                            group by kasut.namaKasut
                            order by kasut.harga_Seunit";
            
            #laksanakan proses carian berdasarkan arahan SQL
            $laksana_pilihan = mysqli_query($condb , $sql_pilihan);

            #jika tiada kasut bagi jenama yang dipilih
            if (mysqli_num_rows($laksana_pilihan) == 0) {
                echo "<div class='carian-tidak-ditemui'>
                        <p>Carian tidak ditemui</p>
                    </div>";
            }
            #jika terdapat kasut berdasarkan jenama yang dipilih
            else {
                echo"<div class='result-box'>";
                    echo"<div class='box-product'>";
                    while ($n=mysqli_fetch_array($laksana_pilihan)) {
                        
                        $data_get=array(
                            'id_Kasut' => $n['id_Kasut'],
                            'namaKasut' => $n['namaKasut'],
                            'jenama' => $n['jenama'],
                            'warna' => $n['warna'],
                            'saiz' => $n['saiz'],
                            'harga_Seunit' => $n['harga_Seunit'],
                            'gambar' => $n['gambar']
                        );
                        echo " <table border='5px'>
                                    <tr class='tr-img'>
                                        <td class='td-img'>
                                            <img class='gambar-kasut-belumtempah' width='40%' src='img/".$n['gambar']."'>
                                            <br>
                                            <br>
                                            <div class='div-info'>
                                                Nama Kasut<br>
                                                Jenama<br>
                                                Warna<br>
                                                Saiz<br>
                                                Harga<br>
                                            </div>
                                            <div class='div-desc'>
                                                : &nbsp".$n['namaKasut']."<br>
                                                : &nbsp".$n['jenama']."<br>
                                                : &nbsp".$n['warna']."<br>
                                                : &nbsp".$n['saiz']."<br>
                                                : &nbspRM".$n['harga_Seunit']."<br>
                                            </div>
                                            <br>
                                            <br>
                                            <a class='link-tempah' href='pembeli-tempah-borang2.php?".http_build_query($data_get)."'>
                                                            <button class='butang-tempah'>TEMPAH</button></a>
                                        </td>
                                    </tr>
                                </table>";
                             }
                    echo"</div>";
                    include('footer.php');
                echo"</div>";
            }
        }
    ?>
    </div> 
</div>