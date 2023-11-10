<?php 
#memulakan fungsi session
    session_start();

    #memanggil fail header.php, connection.php, guard-pembeli.php
    include('header.php');
    include('connection.php');
    include('guard-pembeli.php');

    #menyemak kewujudan data GET. jika tidak, akan buka fail senarai-kasut.php
    if ((empty($_GET))) {
        die("<script>window.location.href='senarai-kasut.php'</script>");
    }
?>
<link rel="stylesheet" href="pembeli-tempahborang.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Braah+One&display=swap" rel="stylesheet">
<!-- jadual kasut yang ingin mengubah kuantiti -->
<table>
    <tr> 
        <!-- gambar kasut -->
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
                    <!-- input nama kasut -->
                    : <b><?= $_GET['namaKasut']?></b><br>
                    <!-- input jenama -->
                    : <?= $_GET['jenama']?><br>
                    <!-- input warna -->
                    : <?= $_GET['warna']?><br>
                    <!-- input saiz -->
                    : <?= $_GET['saiz']?><br>
                    <!-- input harga seunit -->
                    : RM<?= $_GET['harga_Seunit']?><br>
                </div>
            </td>
            <td class='kuantiti-pilih'>
                <div class="tempah-kuantiti">
                    <!-- arahan pembeli untuk memasukkan kuantiti yang diingin -->
                    <p><u>Sila masukkan kuantiti yang diingini</u></p>
                    <form action="" method="POST">
                        <!-- input kuantiti -->
                        <span class='text-kuantiti'>Kuantiti</span>: <input type="number" name='kuantiti' min='1' max='20'>
                                    <input class='btn-kira' type="submit" name ="kira" value='Kira'> 
                    </form>
                </div>
                    <div>
                        <!-- proses pengiraan jumlah harga berdasarkan kuantiti yang dimasukkan oleh pembeli -->
                        <?php 
                            if (isset($_POST['kira'])) {
                                $kuantiti = $_POST['kuantiti']; 
                                $jum_harga =  (int)$_GET['harga_Seunit'] * (int)$kuantiti;
                                if (empty($kuantiti) && empty($jum_harga)) {
                                    echo" <div class='kuantiti-xnilai'>  
                                            Kuantiti<br>
                                            Jumlah Harga<br>
                                          </div>
                                          <div class='xnilai'>
                                            : [masukkan kuantiti yang diingini]<br>
                                            : [-----] 
                                          </div>";
                                }
                                else{
                                    echo"<div class='kuantiti-nilai'>
                                            Kuantiti<br>
                                            Jumlah Harga<br>
                                        </div>
                                        <div class='nilai'>
                                            : $kuantiti <br>
                                            : RM $jum_harga <br>
                                        </div>";
                                }
                            }
                        ?>
                        <form action="pembeli-ubah-kuantiti.php" method='POST'>
                            <input type="hidden" name = 'id_Kasut' value= '<?= $_GET['id_Kasut']?>'>
                            <input type="hidden" name = 'kuantiti' value= '<?= $kuantiti ?>'>
                            <input type="hidden" name = 'jumlah_harga' value= '<?= $jum_harga ?>'>
                            <input class="butang-tempah" type="submit" value="TEMPAH">
                        </form>
                    </div>
                </div>
            </td>
        </tr>
</table>
<?php include('footer.php'); ?>