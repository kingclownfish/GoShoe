<?php 

    session_start();
    include('header.php');

?>
<link rel="stylesheet" href="style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Braah+One&display=swap" rel="stylesheet">
<div class="body-logmasuk">
    <!-- arahan admin untuk log masuk -->
    <h3 class="arahan-login">
        SILA MASUKKAN KOD ADMIN DAN KATA LALUAN
    </h3>
    <div>
        <div class="login-center">
            <!-- tajuk login admin -->
            <h4>LOGIN ADMIN</h4>
            <form action="admin-login-proses.php" method='POST'>
                <div class='div-info-sign'>
                    Kod Admin <br>
                    Kata Laluan <br>
                </div>
                <div class='div-desc-sign'>
                    <!-- input kod admin -->
                    : <input class='input-kod-admin' type="text" name = "kod_admin"><br>
                    <!-- input kata laluan -->
                    : <input class='input-pw' type="password" name = "katalaluan_admin"><br>
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

