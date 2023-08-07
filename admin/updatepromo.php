<?php
include "function.php";
$id = $_GET['id_pdt'];
$promo = $_GET['promo_pdt'];

mysqli_query($conn, "UPDATE product SET promo_pdt='$promo' WHERE id_pdt='$id'");
header("location:produk.php");

?>