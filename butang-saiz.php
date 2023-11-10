<link rel="stylesheet" href="butang-saiz-style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Braah+One&display=swap" rel="stylesheet">
<script>
    function ubahsaiz(gandaan){
        //mendapatkan saiz semasa tulisan pada jadual
        var saiz = document.getElementById("saiz");
        var saiz_semasa = saiz.style.fontSize || 1;

        // menyemak jika pengguna menekan butang, nilai yang akan dihantar
        //     butang reset    - nilai 2 dihantar   - kembali kepada saiz asal tulisan
        //     butang +        - nilai 1 dihantar   - besarkan saiz asal tulisan
        //     butang -        - nilai -1 dihantar  - kecilkan kepada saiz asal tulisan

        if (gandaan == 2){
            saiz.style.fontSize = "1em";
        }
        else{
            saiz.style.fontSize = (parseFloat(saiz_semasa) + (gandaan * 0.2)) + "em";
        }
    }
</script>
<!-- kod untuk butang mengubah saiz tulisan -->
<div class='butang-saiz-box'>
    <span class='text-ust'>UBAH SAIZ TULISAN</span><br>
    <input class='btn-inc' type="button" name = 'reSize' value = '&nbsp;+&nbsp;' onclick = "ubahsaiz(1)" />
    <input class='btn-dec' type="button" name = 'reSize1' value = '&nbsp;-&nbsp;' onclick = "ubahsaiz(-1)" />
    <input class='btn-reset' type="button" name = 'reSize1' value = 'reset' onclick = "ubahsaiz(2)" />
    <br>
    <button class='btn-cetak' onclick = "window.print()">Cetak</button>   
</div>