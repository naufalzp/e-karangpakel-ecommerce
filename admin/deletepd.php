<?php
include "function.php";
$id = $_GET['id_pdt'];
if(hapusProduk($id)>0){
    echo "<script>
                    alert('Berhasil Menghapus Produk');
                    window.location.href = 'produk.php';
                 </script>";
}
else{
    echo "<script>
    alert('Gagal Menghapus Produk');
    window.location.href = 'produk.php';
 </script>";                
}



?>