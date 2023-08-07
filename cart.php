<?php
session_start();
if(!isset($_SESSION['login'])){
    header('location:login.php');
  }
include "function.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Karangpakel</title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!-- 
    - bootstrap css link
  -->
  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/main.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&family=Roboto:wght@400;500;700&display=swap"
    rel="stylesheet">
</head>

<body>
  <!-- 
    - #HEADER
  -->
  <nav id="navBar" class="navbar navbar-expand-lg bg-light sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <h1 class="h1">
          <a href="#" class="logo">E-Karang<span class="span">pakel</span></a>
        </h1>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a href="./" class="nav-link text-large">Beranda</a>
          </li>

          <li class="nav-item">
            <a href="./" class="nav-link">Tentang</a>
          </li>

          <li class="nav-item">
            <a href="./index.php#produk" class="nav-link">Produk</a>
          </li>

          <li class="nav-item">
            <a href="./index.php#berita" class="nav-link">Berita</a>
          </li>

          <li class="nav-item">
            <a href="./index.php#video" class="nav-link">Video</a>
          </li>

          <li class="nav-item">
            <a href="contact.php" class="nav-link">Kontak</a>
          </li>

        </ul>
        <div class="header-action">
          <div class="d-sm-block d-lg-none ">

          </div>

          <div class="search-wrapper" data-search-wrapper>


            <button class="header-action-btn" aria-label="Toggle search" data-search-btn>
              <ion-icon name="person-outline" class="search-icon"></ion-icon>
              <ion-icon name="close-outline" class="close-icon"></ion-icon>
            </button>
            <div class="input-wrapper">
              <?php
              if(isset($_SESSION['login'])){
                $uname = $_SESSION['username'];
                if(isset($_SESSION['adminkey'])){
                  echo '<p>Hi!, ' . $uname . '</p>
                  <a href="./admin/">Admin Dasboard</a>
                  <a href="profile.php">Profile</a>
                  <a href="logout.php">Logout</a>';
                }
                else{
                  echo '<p>Hi!, '.$uname.'</p>
                  <a href="profile.php">Profile</a>
                    <a href="logout.php">logout</a>';
                  }
              }
              else{
                echo'<a href="login.php">login</a><a href="register.php">register</a>';
              }
              ?>


            </div>

          </div>
          <div class="d-sm-block d-lg-none ">

          </div>
          <button class="header-action-btn" aria-label="Open shopping cart" data-panel-btn="cart">
            <ion-icon name="basket-outline"></ion-icon>
            <?php
            $jml = query("SELECT SUM(jml_pdt) AS jml FROM cart");
            foreach($jml as $row):
              ?>
            <data class="btn-badge" value="2"><?= $row['jml'];?></data>
            <?php endforeach;?>
          </button>
          <div class="d-sm-block d-lg-none ">

          </div>

        </div>

      </div>
    </div>
  </nav>



  <!-- 
    - #ASIDE
  -->

  <aside class="aside">

    <div class="side-panel" data-side-panel="cart">

      <button class="panel-close-btn" aria-label="Close cart" data-panel-btn="cart">
        <ion-icon name="close-outline"></ion-icon>
      </button>

      <ul class="panel-list">
        <?php
            $jmlcart = query("SELECT *,SUM(price_pdt) as jml_price,SUM(jml_pdt) AS jml FROM cart GROUP BY id_pdt");
            foreach($jmlcart as $row):
            ?>
        <li class="panel-item">
          <a href="#" class="panel-card">

            <figure class="item-banner">
              <img src="./assets/images/<?=$row['foto_pdt']?>" width="46" height="46" loading="lazy"
                alt="Bright Side Vegetarian">
            </figure>

            <div>
              <p class="item-title"><?=$row['name_pdt']?></p>

              <span class="item-value">Rp <?=$row['jml_price']?></span>
              <span class="item-value">x<?=$row['jml']?></span>
            </div>

          </a>
        </li>
        <?php
      endforeach;
        ?>

      </ul>

      <div class="subtotal">
        <p class="subtotal-text">Total: </p>
        <?php
        $total = query("SELECT SUM(price_pdt) AS total FROM cart");
        foreach($total as $row):
        ?>
        <data class="subtotal-value" value="<?=$row['total']?>">Rp <?=$row['total']?></data>
        <?php endforeach;?>
      </div>

      <a href="./cart.php" class="panel-btn">Lihat Keranjang</a>

    </div>

  </aside>




  <main>
    <article>



      <section class="h-100" style="background-color: #eee;">
        <div class="container h-100 py-5">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-10">

              <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
              </div>
              <?php
            $crt = query("SELECT *,SUM(price_pdt) AS price_crt,SUM(jml_pdt) AS jml_crt FROM cart GROUP BY id_pdt"); 
            if(!$crt){
              echo '<div class="text-center"><h1 >Tidak ada barang di keranjang <a class="text-primary"href="./">Silahkan kembali berbelanja</a></h1></div>';  
            }
            foreach ($crt as $row):
            ?>
              <div class="card rounded-3 mb-4" style="font-size:large">
                <div class="card-body p-4">
                  <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-md-2 col-lg-2 col-xl-2">
                      <img src="assets/images/<?= $row['foto_pdt'];?>" class="img-fluid rounded-3">
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                      <p class="lead fw-normal mb-2" style="font-size:large"><?= $row['name_pdt'];?></p>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">

                      <form action="" method="post">
                        <input type="number" class="d-none" name="id_pdt" value="<?= $row['id_pdt'];?>">
                        <input style="font-size:large" id="form1" min="1" name="quantity" value="<?= $row['jml_crt'];?>"
                          type="number" class="form-control form-control-sm" />

                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                      <h5 class="mb-0" style="font-size:large">Rp <?= $row['price_crt'];?></h5>
                    </div>
                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                      <button type="submit" name="upd" class="btn btn-warning btn-lg ">Update</button>
                      </form>
                      <a href="delete.php?id_pdt=<?= $row['id_pdt'];?>" class="btn btn-danger btn-lg ">Delete</a>
                    </div>
                  </div>
                </div>
              </div>
              <?php
            endforeach;?>
              <?php
        if(isset($_POST['upd'])){
            $update_value = $_POST['quantity'];
            $update_id = $_POST['id_pdt'];
            $realprice = query("SELECT price_pdt FROM product WHERE id_pdt=$update_id");
            foreach($realprice as $row){
                $harga = $row['price_pdt'];
                $up=mysqli_query($conn, "UPDATE cart SET jml_pdt = '$update_value',price_pdt = $harga*$update_value WHERE id_pdt = LAST_INSERT_ID('$update_id') ");
            }
            if($up){
                echo "<script>
                    window.addEventListener('load', function() { window.location.href=window.location.href;}, false);
                 </script>";
            };
         };
         if(!$crt){
                $dnone = "d-none";
        }
        ?>
              <div class="card <?= $dnone;?>">
                <div class="card-body d-flex justify-content-between">
                  <button data-bs-toggle="modal" data-bs-target="#checkoutModal" name="checkout"
                    class="btn btn-warning btn-block btn-lg">Checkout</button>

                  <?php
            $crt = query("SELECT SUM(price_pdt) AS price_crt FROM cart");
            foreach($crt as $row):
            ?>
                  <p>Total: <b>Rp <?= $row['price_crt'];?></b></p>
                  <?php    
            endforeach;
            ?>
                </div>
              </div>

            </div>
          </div>
        </div>
      </section>
    </article>
  </main>
  <?php
            $mdl = query("SELECT *,SUM(price_pdt) AS price_mdl,SUM(jml_pdt) AS jml_mdl FROM cart GROUP BY id_pdt");
$price_total = 0;
            foreach($mdl as $row){
                @$product_name[] = $row['name_pdt'] .' ('. $row['jml_mdl'] .') ';
    $sum = query("SELECT SUM(harga_pdk) AS harga FROM cart");
    foreach($sum as $rw){
      $product_price = $rw['harga'];
      $price_total += $product_price;
    }
            }  
            if(isset($product_name)) {
              @$total_product = implode(', ',@$product_name);
            }

            ?>
  <div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="checkoutModalLabel">Proses Checkout</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="bg-secondary text-white p-4 rounded-3">
            <p>Produk: <?= $total_product?></p>
            <p>Total Biaya: Rp <?= $price_total?></p>
          </div>
          <label for="dt">Data Diri : </label>
          <form class="form-group" action="" id="dt" method="POST">
            <input class="form-control" type="text" name="nama" placeholder="Nama">
            <input class="form-control" type="email" name="email" placeholder="Email">
            <textarea class="form-control" name="alamat" placeholder="Alamat" id="alamat" rows="5"></textarea>
            <label for="pmb">Pembayaran : </label>
            <div class="form-check" id="pmb">
              <input class="form-check-input" type="radio" name="pembayaran" value="COD" id="pembayaran1">
              <label class="form-check-label" for="pembayaran1">COD</label>
            </div>
            <div class="form-check" id="pmb">
              <input class="form-check-input" type="radio" name="pembayaran" value="BANK" id="pembayaran2">
              <label class="form-check-label" for="pembayaran2">Transfer Bank</label>
            </div>

            <label for="pmb2">Pengiriman : </label>
            <div class="form-check" id="pmb2">
              <input class="form-check-input" type="radio" name="pengiriman" value="JNE" id="pengiriman1">
              <label class="form-check-label" for="pengiriman1">
                JNE
              </label>
            </div>
            <div class="form-check" id="pmb2">
              <input class="form-check-input" type="radio" name="pengiriman" value="JNT" id="pengiriman2">
              <label class="form-check-label" for="pengiriman2">
                JNT
              </label>
            </div>
            <div class="form-check" id="pmb2">
              <input class="form-check-input" type="radio" name="pengiriman" value="SiCepat" id="pengiriman3">
              <label class="form-check-label" for="pengiriman3">
                SiCepat
              </label>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" name="kirim" data-bs-dismiss="modal" class="btn btn-primary">Checkout</button>
        </div>
        </form>
      </div>
    </div>
  </div>
        <?php
if(isset($_POST['kirim'])){
  $user = $_SESSION['username'];
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $alamat = $_POST['alamat'];
  $pembayaran = $_POST['pembayaran'];
  $pengiriman = $_POST['pengiriman'];
  
  
  
$masuk=mysqli_query($conn, "INSERT INTO checkout(username,nama,email,alamat,pembayaran,pengiriman,product_kt,total_checkout) VALUES('$user','$nama','$email','$alamat','$pembayaran','$pengiriman','$total_product','$price_total')");
  if($masuk){
            mysqli_query($conn,"DELETE FROM cart");
            echo '<meta http-equiv = "refresh" content = "0; url = co.php" />';
  }
}
?>
  <!-- 
    - #FOOTER
  -->

  <footer class="footer">

    <div class="footer-top">
      <div class="container">

        <div class="footer-brand">

          <a href="./index.html" class="logo">E-Karang<span class="span">pakel</span></a>

          <p class="footer-text">
            Ini adalah website yang menampung Usaha Mikro Kecil Menengah (UMKM) Desa Karangpakel di Kecamatan Trucuk,
            Klaten, Jawa Tengah, Indonesia.
          </p>

          <ul class="social-list">

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-facebook"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-twitter"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-skype"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-linkedin"></ion-icon>
              </a>
            </li>

          </ul>

        </div>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Kontak</p>
          </li>

          <li class="footer-item">
            <div class="contact-icon">
              <ion-icon name="location-outline"></ion-icon>
            </div>

            <address class="contact-link">
              Desa Karangpakel, Kecamatan Trucuk, Klaten, Jawa Tengah, Indonesia
            </address>
          </li>

          <li class="footer-item">
            <div class="contact-icon">
              <ion-icon name="call-outline"></ion-icon>
            </div>

            <a href="tel:+6288988011295" class="contact-link">+62 88988011295</a>
          </li>

          <li class="footer-item">
            <div class="contact-icon">
              <ion-icon name="mail-outline"></ion-icon>
            </div>

            <a href="mailto:nzpstorage@gmail.com" class="contact-link">nzpstorage@gmail.com</a>
          </li>

        </ul>



      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">

        <p class="copyright">
          &copy; 2022 <a href="#" class="copyright-link">naufalzhafif</a>. All Rights Reserved.
        </p>


      </div>
    </div>

  </footer>





  <!-- 
    - #BACK TO TOP
  -->

  <a href="#top" class="back-to-top" aria-label="Back to Top" data-back-top-btn>
    <ion-icon name="arrow-up-outline"></ion-icon>
  </a>


  <script src="https://kit.fontawesome.com/0d2e8c7959.js" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="./assets/js/sekrip.js"></script>
  <!-- <script src="./assets/js/script.js"></script> -->
  <script src="./assets/js/bootstrap.bundle.js"></script>
  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>