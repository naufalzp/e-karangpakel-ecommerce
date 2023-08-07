<?php
include "function.php";
$id = $_GET['id_berita'];
if(hapusBerita($id)>0){
    echo "<script>
                    alert('Berhasil Menghapus Berita');
                    window.location.href = 'berita.php';
                 </script>";
}
else{
    echo "<script>
    alert('Gagal Menghapus Berita');
    window.location.href = 'berita.php';
 </script>";                
}



?>