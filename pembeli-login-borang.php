<?php 

    session_start();
    include('header.php');

?>
<link rel="stylesheet" href="style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Braah+One&display=swap" rel="stylesheet">
<div class="body-logmasuk">
    <!-- arahan pembeli untuk daftar -->
    <h3 class="arahan-login">
        SILA MASUKKAN NOMBOR IC DAN KATA LALUAN
    </h3>
    <div>
        <div class="login-center">
            <!-- tajuk login pembeli  -->
            <h4>LOGIN PEMBELI</h4>
            <form action="pembeli-login-proses.php" method='POST'>
                <div class='div-info-sign'>
                    Nombor IC <br>
                    Kata Laluan <br>
                </div>
                <div class='div-desc-sign'>
                    <!-- input nombor IC -->
                    : &nbsp<input class='input-no-ic' type="text" name = "nomborIC" required><br>   
                    <!-- input kata laluan pembeli -->
                    : &nbsp<input class='input-pw' type="password" name = "katalaluan" required><br>
                </div>
                <!-- butang log masuk -->
                <div class="butang-logmasuk">
                    <input class="btn-login" type="submit" value="Log Masuk">
                </div>
            </form>
        </div>
    </div>
</div> 
<div class="footer-logmasuk">
    <?php include("footer.php"); ?>
</div>

