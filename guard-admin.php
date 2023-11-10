<?php 
    #menyemak nilai pembolehubah session ['tahap']
    if($_SESSION['tahap'] != "admin"){
        #jika nilianya tidak sama dengan admin. aturcara akan dihentikan
        die("<script>alert('sila login');
        window.location.href = 'logout.php'</script>");
    }
?>