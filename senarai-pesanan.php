<?php 
    session_start();
    include('header.php');
    include('connection.php');
    include('guard-admin.php');
?>
<link rel="stylesheet" href="senarai-pesanan-style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Braah+One&display=swap" rel="stylesheet">
<h3>SENARAI PESANAN</h3>
<form action=" " method='POST'>
    Carian nama pembeli : <input type="text" name='namapembeli'>
                 <input type="submit" value='CARI'>
</form>
<?php  
    include('butang-saiz.php');
?>
<table width = '100%' border = '1' id='saiz'>
    <tr class='attributs'>
        <td>Nama Pembeli</td>
        <td>Nokp Pembeli</td>
        <td>Nama Kasut</td>
        <td>Kuantiti</td>
        <td>Jumlah Harga</td>
        <td>No Telefon</td>
        <td>Tarikh Pesan</td>
        <td class='td-hapus'></td>
    </tr>
    <?php 
        $tambahan = "";
        if(!empty($_POST['namapembeli'])){
            $tambahan = "AND namaPembeli like '%".$_POST['namapembeli']."%'";
        }

        $arahan_papar = "SELECT* FROM 
        pesanan,pembeli,kasut,telefon,jenama
        WHERE 
                telefon.notel = pembeli.notel
        AND     jenama.kod_jenama = kasut.kod_jenama
        AND     pesanan.nokpPembeli = pembeli.nokpPembeli
        AND     pesanan.id_Kasut = kasut.id_Kasut
        $tambahan ";

        $laksana = mysqli_query($condb,$arahan_papar);

        while ($m = mysqli_fetch_array($laksana)) {
            $data_get = array(
                'namaKasut' => $m['namaKasut'],
                'jenama' => $m['jenama'],
                'warna' => $m['warna'],
                'saiz' => $m['saiz'],
                'harga_Seunit' => $m['harga_Seunit'],
                'gambar' => $m['gambar'],
                'id_Kasut' => $m['id_Kasut'],
                'nokpPembeli' => $m['nokpPembeli'],
                'kuantiti' => $m['kuantiti'],
                'jum_Harga' => $m['jum_Harga'],
                'tarikh_Pesan' => $m['tarikh_Pesan'],
                'notel' => $m['notel'],
                'namaPembeli' => $m['namaPembeli'],
            );

            echo "<tr>
            <td>".$m['namaPembeli']."</td>
            <td>".$m['nokpPembeli']."</td>
            <td>".$m['namaKasut']."</td>
            <td>".$m['kuantiti']."</td>
            <td>RM ".$m['jum_Harga']."</td>
            <td>".$m['notel']."</td>    
            <td>".$m['tarikh_Pesan']."</td>
            <td><a class='link-hapus' href='padam-pesanan-admin.php?id_Kasut=".$m['id_Kasut']." && nokpPembeli=".$m['nokpPembeli']."'
            onClick=\"return confirm('Anda pasti anda ingin memadam data ini.')\"><button class='btn-hapus'>Hapus</button></a></td>
            </tr>";
        }
    ?>
</table>
<?php include('footer.php'); ?>