<?php 
    session_start();
    include('connection.php');
    include('header.php');
    include('guard-admin.php');
?>
<link rel="stylesheet" href="daftarkasut-borang-style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Braah+One&display=swap" rel="stylesheet">
<!-- tajuk daftar kasut -->
<h2>DAFTAR KASUT</h2>
<div class='container'>
    <div class="container-form">
        <h3>SILA MASUKKAN MAKLUMAT KASUT</h3>
        <div class="form-daftar-kasut">
            <!-- borang daftar kasut -->
            <form action="daftar-kasut-proses.php" method = "POST" enctype="multipart/form-data">
                <div class="info-nkasut-jenama">
                    Nama Kasut<br>
                    Jenama<br>
                </div>
                <div class='desc-nkasut-jenama'>
                    <!-- input nama kasut -->
                    : <input type="text" name = "namaKasut" required><br>
                    <!-- drop-down bagi jenama -->
                    : <select name="kod_jenama">
                                <option selected disabled>sila pilih jenama</option>
                                <?php 
                                    $sql_jenama = "SELECT* FROM jenama order by jenama";
                                    $laksana_jenama = mysqli_query($condb, $sql_jenama);
                                    while ($m=mysqli_fetch_array($laksana_jenama)) {
                                        echo "<option value='".$m['kod_jenama']."'>".$m['jenama']."</option>";
                                    }
                                ?>
                        </select><br>
                </div>
                <!-- butang daftar jenama -->
                <div class="daftar-jenama">
                    <button class='btn-daftar-jenama' onclick="window.location.href='daftar-jenama-borang.php';">Daftar Jenama<br></button>
                    <br>
                </div>
                <div class='container-info-desc'>
                    <div class="info-warna-saiz-harga-gambar">
                        Warna<br>
                        Saiz<br>
                        Harga<br>
                        Gambar<br>
                    </div>
                    <div class="desc-info-warna-saiz-harga-gambar">
                        <!-- input warna -->
                        : <input type="text" name = "warna" required><br>
                        <!-- input saiz -->
                        : <input type="text" name = "saiz" required><br>
                        <!-- input harga_seunit  -->
                        : <input type="number" name = "harga_Seunit" required><br>
                        <!-- input gambar -->
                        : <input type="file" name = 'gambar' required><br>
                    </div>
                    <div class="div-daftar-kasut">
                        <!-- butang daftar kasut -->
                        <input class='btn-daftar-kasut' type="submit" name="daftar" value = "Daftar Kasut"><br>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="footer"> <?php include('footer.php'); ?> </div>