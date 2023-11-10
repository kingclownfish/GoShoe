<?php

    session_start();

    include('connection.php');
    include('guard-admin.php');
    include('header.php');

?>
<link rel="stylesheet" href="senaraikasut-admin.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Braah+One&display=swap" rel="stylesheet">
<h3>SENARAI KASUT</h3>
<div class='div-arahan'><i>Kasut yang dibeli, tidak dipaparkan disini</i></div>
<hr color='limegreen' />
<form action="" method='POST'>
    <select name="jenama">
        <option selected disabled>Sila pilih jenama</option>
        <?php 
            $sql_jenama = "SELECT * FROM jenama order by jenama";
            $laksana_carian = mysqli_query($condb,$sql_jenama);
            while ($m = mysqli_fetch_array($laksana_carian)) {
                echo "<option value='".$m['jenama']."'>".$m['jenama']."</option>";  
            }
        ?>
    </select>
        <input class='btn-papar' type="submit" value = 'Papar'>
</form>
<div class='btn-daftar-kasut'><button onclick='window.location.href="daftar-kasut-borang.php";'>Daftar Kasut Baru</button><br></div>
<?php include("butang-saiz.php") ?>
<table id="saiz">
    <?php 
        $tambahan ="";
        if (!empty($_POST['jenama'])) {
            $tambahan = "AND jenama.jenama = '".$_POST['jenama']."'";
        }

        $arahan_papar = "SELECT* FROM kasut, jenama
        where 
            jenama.kod_jenama = kasut.kod_jenama
        and kasut.warna = kasut.warna
        and kasut.saiz = kasut.saiz
        and kasut.id_Kasut not in(select id_Kasut from pesanan)
        $tambahan
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
            echo "<tr> 
                    <td class='td-img'><img width = '50%' src = 'img/".$m['gambar']."'</td>
                    <td class='td-desc'>
                        <div class='div-info'>
                            Nama Kasut<br>
                            Jenama<br>
                            Warna<br>
                            Saiz<br>
                            Harga<br>
                        </div>
                        <div class='div-desc'>
                        : ".$m['namaKasut']."<br>
                        : ".$m['jenama']."<br>
                        : ".$m['warna']."<br>
                        : ".$m['saiz']."<br>
                        :  RM".$m['harga_Seunit']."<br>
                        </div>
                    </td>
                    <td class='div-kemaskini-hapus'>
                        <a class='link-kemaskini' href='kemaskini-kasut-borang.php?id_Kasut=".http_build_query($data_get)."'><button class='butang-kemaskini'>Kemas Kini</button></a>
                        <br>
                        <a class='link-hapus' href='padam-kasut-proses.php?id_Kasut=".$m['id_Kasut']."'
                        onClick=\"return confirm('Anda pasti anda ingin memadam data ini.')\"><button class='butang-hapus'>Hapus</button></a>
                    </td>
                </tr>";
        }
    ?>
</table>
<div class="footer">
    <?php include('footer.php') ?>
</div>