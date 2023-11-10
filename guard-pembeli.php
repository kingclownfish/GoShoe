<?php 
    #menyemak nilia pembolehubah session ['tahap']
    if($_SESSION['tahap'] != "pembeli"){
        // jika nilainya tidak sama dengan pembeli. aturcara akan dihentikan
        die("<script>alert('sila login');
        window.location.href = 'logout.php'</script>");
    }
?>