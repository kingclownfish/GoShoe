<?php 
    session_start();
    include ('header.php');
?>
<link rel="stylesheet" href="style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Braah+One&display=swap" rel="stylesheet">
<div class="body-signup">
    <!-- arahan pembeli untuk daftar -->
    <h3 class="arahan-login"> SILA ISI MAKLUMAT BERIKUT </h3>
    <div>
        <div class="signup-center">
            <!-- tajuk daftar pembeli  -->
            <h4>DAFTAR PEMBELI</h4>
            <!-- borang pembeli untuk daftar -->
            <form action="pembeli-signup-proses.php" method = "POST">
                <div class='div-info-sign'>
                    Nama Penuh <br>
                    Nombor IC <br>
                    Katalaluan <br>
                    Nombor Telefon <br>
                </div>
                <div class='div-desc-sign'>
                    <!-- input nama pembeli -->
                    : &nbsp<input class='input-nama' type="text" name = "namaPembeli" required><br>
                    <!-- input nombor IC -->
                    : &nbsp<input class='input-no-ic' type="text" name = "nomborIC" required><br>   
                    <!-- input katalaluan -->
                    : &nbsp<input class='input-pw' type="password" name = "katalaluan" required><br>
                    <!-- input nombor telefon -->
                    : &nbsp<input class='input-no-tele' type="text" name="notel" required><br>
                </div>
                <!-- butang daftar -->
                <div class="butang-signup">
                    <input class='btn-daftar-signup' type="submit" value="Daftar">
                </div>
            </form>
        </div>
    </div>
</div>
<div class="footer-logmasuk">
    <?php include("footer.php"); ?>
</div>  