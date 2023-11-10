<?php
    #memulakan fungsi session
    session_start();

    #menyemak kewujudan data POST.
    if (!empty($_POST)) {

        #memanggil fail connection..php
        include('connection.php');
        
        // menyimpan data yang diinput oleh pembeli dalam pemboleh ubah
        $kuantiti = $_POST['kuantiti'];
        $jum_Harga = $_POST['jumlah_harga'];
        $id_Kasut = $_POST['id_Kasut'];
        $nokpPembeli = $_SESSION['nomborIC'];

        #arahan sql untuk update data baru ke dalam jadual pesanan berdasarkan kasut yang dipilih untuk ubah kuantiti
        $arahan = "UPDATE pesanan set 
            kuantiti = $kuantiti,
            jum_Harga = $jum_Harga 
        where
            id_Kasut = $id_Kasut
        AND nokpPembeli = '$nokpPembeli' ";

        
        $laksana_arahan = mysqli_query($condb, $arahan);

        if ($laksana_arahan) {
            die("<script>alert('UBAH KUANTITI BERJAYA');
            window.location.href='senarai-tempahan.php';</script>");
        }
        else {
          echo mysqli_error($condb); die();
          die("<script>alert('UBAH KUANTITI GAGAL');
              window.location.href='pembeli-tempah-borang.php';</script>");
        }
    }
    else {
        die("<script>alert('Sila lengkapkan maklumat');
        window.location.href='pembeli-tempah-borang.php';</script>");
    }

?> 