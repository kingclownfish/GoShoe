<?php 

    session_start();

    include('header.php');
    include('guard-admin.php');

?>
<h2>IMPORT FAIL</h2>
<link rel="stylesheet" href="import-fail-style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Braah+One&display=swap" rel="stylesheet">
<!-- borang import -->
<form action="import-kasut-proses.php" method='POST' enctype="multipart/form-data">
    <div class='container-import'>
        <!-- arahan import -->
        <p>Sila pilih fail yang berformat <b>*.txt</b></p>
        <input class='input-import' type="file" name='data_kasut'>
        <br>
        <br>
        <br>
        <!-- butang muat naik -->
        <input class='btn-muat-naik' type="submit" value='Muat Naik' name='muat_naik'>
    </div>
</form>
<?php include('footer.php') ?>      