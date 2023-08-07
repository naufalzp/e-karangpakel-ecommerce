<?php
session_start();
if(!isset($_SESSION['login'])){
  header('location:../login.php');  
}
else{
  if(!isset($_SESSION['adminkey'])){
    header('location:../index.php');
  }
}


include "function.php";
?>
<html>
<head>
  <title>Data Pembelian</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
			<h2>Data Pembelian</h2>
				<div class="data-tables datatable-dark">
                <table id="mauexport" class="table table-hover ">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Metode Pembayaran</th>
                    <th scope="col">Kurir Pengiriman</th>
                    <th scope="col">Produk yang dibeli</th>
                    <th scope="col">Total biaya</th>
                    <th scope="col">Tanggal Checkout</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $co = query("SELECT * FROM checkout");
                  $i = 1;
                  foreach($co as $row):
                  ?>
                  <tr> 
                    <th scope="row"><?php echo $i?></th>
                    <td><?php echo $row['username']?></td>
                    <td><?php echo $row['nama']?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['alamat']?></td>
                    <td><?php echo $row['pembayaran']?></td>
                    <td><?php echo $row['pengiriman']?></td>
                    <td><?php echo $row['product_kt']?></td>
                    <td>Rp <?php echo $row['total_checkout']?></td>
                    <td><?php echo $row['checkout_date']?></td>
                    
                  <?php
                  $i++;
                endforeach;
                
                ?>
                </tbody>
              </table>
				</div>
</div>
	
<script>
$(document).ready(function() {
    $('#mauexport').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy','csv','excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>

</html>