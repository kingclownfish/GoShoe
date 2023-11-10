<?php 

    if (isset($_POST['muat_naik'])) {
        
        #memanggil fail connection
        include('connection.php');

        #mengambil nama sementara fail
        $namafailsementara = $_FILES['data_kasut']['tmp_name']; 
        #mengambil nama fail
        $namafile = $_FILES['data_kasut']['name'];
        #mengambil jenis fail
        $jenisfail = pathinfo($namafile, PATHINFO_EXTENSION);

        #menguji jenis fail dan saiz fail
        if ($_FILES['data_kasut']['size']>0 AND $jenisfail=="txt") {
            #membuka fail yang diambil
            $fail_data_kasut = fopen($namafailsementara, "r");

            #mendapatkan data dalam fail
            while (!feof($fail_data_kasut)) {
                #ambil data sebaris sahaja bagi setiap pusingan
                $ambilbarisdata = fgets($fail_data_kasut);
                #pecahkan baris data mengikut tanda |
                $pecahkanbaris = explode("|", $ambilbarisdata);

                #data dalam fail akan diumpukan dalam pemboleh berikut 
                list($namaKasut, $jenama, $warna, $saiz, $harga_Seunit, $gambar) = $pecahkanbaris;

                #arahan sql untuk menguji bahawa jenama dalam fail wujud atau tidak
                $sql_jenama = "SELECT kod_jenama from jenama
                                where jenama = '$jenama' ";
                #laksana sql
                $laksana_sql_jenama = mysqli_query($condb, $sql_jenama);

                #output jika jenama dalam fail tidak wujud 
                if (mysqli_num_rows($laksana_sql_jenama) == 0) {
                    echo "<script>alert('Jenama yang dalam fail tidak wujud');
                    window.location.href='import-kasut-borang.php';</script>";
                }
                #proses jika jenama dalam fail wujud
                else {
                    while($row=mysqli_fetch_array($laksana_sql_jenama)){
                        $kod_jenama = $row['kod_jenama'];
                    };
                    $timestmp = date("Y-m-d-His");
                    $format_gambar = pathinfo($gambar, PATHINFO_EXTENSION);
                    $img_kasut = "$gambar";
                    $nama_baru = $timestmp.".".$format_gambar;
                    
                    copy($img_kasut,"img/".$nama_baru);

                    #arahan sql untuk masukkan data ke dalam jadual kasut
                    $arahan_sql_simpan = "INSERT INTO kasut
                                        (namaKasut, kod_jenama, warna, saiz, harga_Seunit, gambar)
                                        VALUES
                                        ('$namaKasut', '$kod_jenama', '$warna', '$saiz', '$harga_Seunit', '$nama_baru')";
                    
                    $laksana_arahan_simpan = mysqli_query($condb, $arahan_sql_simpan);
                    
                    echo "<script>alert('Import fail data selesai');
                        window.location.href='senarai-kasut-admin.php';</script>";
                }
            }
        fclose($fail_data_kasut);
        }
        else {
            echo "<script>alert('hanya fail berformat txt sahaja dibenarkan')
            window.location.href = 'import-kasut-borang.php';</script>";
        }
    }
    else {
        die("<script>alert('RALAT! AKSES SECARA TERUS');
        window.location.href = 'daftar-kasut-borang.php';</script>");
    }
?>