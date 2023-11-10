<link rel="stylesheet" href="style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Vina+Sans&display=swap" rel="stylesheet">
<!-- logo sistem  -->
<div class="div-logo-goshoe">
    <img class='logo-goshoe' src="img/goshoe-full2.png">
</div>
    <?php
        if (!empty($_SESSION['tahap']) and $_SESSION['tahap'] == "admin") {
            // menu utama bagi admin
            echo "
            <div class='btn-admin'>
                 <a href = 'index.php'><button class='nav-button'>Menu Utama</button></a>
                 <a href = 'daftar-kasut-borang.php'><button class='nav-button'>Daftar kasut</button></a>
                 <a href = 'senarai-kasut-admin.php'><button class='nav-button'>Senarai kasut</button></a>
                 <a href = 'import-kasut-borang.php'><button class='nav-button'>Import</button></a>
                 <a href = 'senarai-pesanan.php'><button class='nav-button'>Senarai pesanan</button></a>
                 <a href = 'logout.php'><button class='nav-button'>Log out</button></a>
            </div>
            ";
        }
        else if(!empty($_SESSION['tahap']) and $_SESSION['tahap'] == "pembeli"){
            // menu utama bagi pembeli
            echo "
            <div class='btn-pembeli'>
                <a href = 'index.php'><button class='nav-button'>Menu Utama</button></a>
                <a href = 'carian.php'><button class='nav-button'>Carian</button></a>
                <a href = 'senarai-kasut-pembeli.php'><button class='nav-button'>Senarai kasut</button></a>
                <a href = 'senarai-tempahan.php'><button class='nav-button'>Senarai tempahan</button></a>
                <a href = 'logout.php'><button class='nav-button'>Log out</button></a>
            </div>
            ";
        }
        else {
            // menu utama jika admin atau pembeli tidak login
            echo "
            <div class='btn-none'>
                 <a href = 'index.php'><button class='nav-button'>Menu Utama</button></a>
                 <a href = 'pembeli-signup-borang.php'><button class='nav-button'>Pengguna Baru</button></a>
                 <a href = 'pembeli-login-borang.php'><button class='nav-button'>Login Pengguna</button></a>
                 <a href = 'admin-login-borang.php'><button class='nav-button'>Login Admin</button></a>
            </div>
            ";
        }
    ?>