<?php

  session_start();

  include("header.php");
  include("guard-admin.php");
  include('connection.php')

?>
<link rel="stylesheet" href="daftar-jenama-style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Braah+One&display=swap" rel="stylesheet">
<h3>PENDAFTARAN JENAMA</h3>
<!-- borang daftar jenama -->
<div class="borang-daftar-jenama">
  <form action="daftar-jenama-proses.php" method='POST' >
    <div class='div-info'>
      Kod Jenama<br>
      Jenama<br>
    </div>
    <div class='div-desc'>
      <!-- input kod jenama -->
       : <input type="text" name="kod_jenama" required><br>
       <!-- input jenama -->
       : <input type="text" name="jenama" required><br>
    </div>
    <div>
      <!-- butang daftar -->
      <input class='btn-daftar' type="submit" value='Daftar'>
    </div>
  </form>
</div> 
<!-- jadual bagi menunjukkan senarai jenama yang telah didaftar -->
<div class="table-jenama">
  <table border="1">
    <tr>
      <td class='td-kod_jenama'>kod_jenama</td>
      <td class="td-jenama">jenama</td>
      <td></td>
    </tr>
    <?php 
    # arahan sql untuk memaparkan senarai jenama
      $arahan_sql = "SELECT* FROM jenama";
      #laksanakan kod sql
      $laksana_sql = mysqli_query($condb, $arahan_sql);

      while($m = mysqli_fetch_array($laksana_sql)){
        echo"
          <tr>
            <td>
              ".$m['kod_jenama']."
            </td>
            <td>
              ".$m['jenama']."
            </td>
            <td>
              <a class='link-hapus' href='padam-jenama-proses.php?kod_jenama=".$m['kod_jenama']."'
              onClick=\"return confirm('Anda pasti anda ingin memadam data ini.')\"><button class='btn-hapus'>Hapus</button></a>
            </td>
          </tr>
        ";
      }
    ?>
  </table>
</div>
<?php include('footer.php') ?>