<?php
include "function.php";
$id = $_GET['id_pdt'];
if(hapus($id)>0){
    echo "<script>
                    alert('Berhasil Menghapus Item dari Keranjang');
                    document.location.href = 'cart.php';
                 </script>";
}
else{
    echo "<script>
    alert('Gagal Menghapus Item dari Keranjang');
    document.location.href = 'cart.php';
 </script>";                
}



?>