<?php
    // memulakan fungsi session
    session_start();

    // memanggil fail connection.php, header.php, guard-admin.php
    include("connection.php");
    include("header.php");
    include('guard-admin.php');

    // menyemak kewujudkan data GET. jika data GET empty, buka fail senarai-kasut.php
    if(empty($_GET)){
        die("<script>window.location.href = 'senarai-kasut-admin.php'</script>");
    }
?>
<link rel="stylesheet" href="kemaskini-kasut-style.css">
<h3>KEMAS KINI</h3>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Braah+One&display=swap" rel="stylesheet">
<!-- borang kemas kini -->
<form action="kemaskini-kasut-proses.php?id_Kasut_lama=<?= $_GET['id_Kasut'] ?>" method = 'POST'>
    <table>
        <tr> 
            <td class='td-img'><img width = '80%' src="img/<?= $_GET['gambar']?>"></td>
                <td class='td-desc'>
                    <div class='div-info'>
                        <b>Nama Kasut</b><br>
                        Jenama<br>
                        Warna<br>
                        Saiz<br>
                        Harga<br>
                    </div>
                    <div class='div-desc'>
                        <!-- input namaKasut -->
                        : &nbsp<b><input type="text" name = "namaKasut" required><br></b>
                        <!-- jenama yang dipaparkan -->
                        : &nbsp<?= $_GET['jenama']?><br>
                        <!-- input warna -->
                        : &nbsp<input type="text" name = "warna" required><br>
                        <!-- input saiz -->
                        : &nbsp<input type="text" name = "saiz" required><br>
                        <!-- input harga_Seunit -->
                        : &nbsp<input type="text" name = "harga_Seunit"  required><br>
                    </div>
                </td>
            </tr>
    </table>
    <!-- butang daftar -->
    <div class='div-btn-daftar'>
        <input class='btn-daftar' type="submit" value = "Daftar"><br>
    </div>
</form>
<?php include ('footer.php')?> 