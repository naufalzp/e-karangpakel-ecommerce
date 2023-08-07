<?php
include "function.php";
$id = $_GET['id_video'];
if(hapusVideo($id)>0){
    echo "<script>
                    alert('Berhasil Menghapus video');
                    window.location.href = 'video.php';
                 </script>";
}
else{
    echo "<script>
    alert('Gagal Menghapus video');
    window.location.href = 'video.php';
 </script>";                
}



?>