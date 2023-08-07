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
  <link rel="stylesheet" href="./assets/css/product-details.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&family=Roboto:wght@400;500;700&display=swap"
    rel="stylesheet">
</head>

<body id="top">

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
          <button class="header-action-btn" aria-label="Open shopping cart" data-panel-btn="cart">
            <ion-icon name="basket-outline"></ion-icon>
            <?php
  $jml = query("SELECT SUM(jml_pdt) AS jml FROM cart");
  foreach($jml as $row):
  ?>
            <data class="btn-badge" value="2"><?= $row['jml'];?></data>
            <?php endforeach;?>
          </button>

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
    <section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
            <?php
            $profil = query("SELECT * FROM users WHERE username='$uname'");
            foreach($profil as $row):
            ?>
          <div class="card-body text-center">
            <center>
                <img src="./admin/assets/img/admin.jpg" style="width: 150px;" class="rounded-circle">
            </center>
            <h5 style="font-size: large;" class="my-3"><?=$_SESSION['username'];?></h5>
            <p style="font-size: large;" class="text-muted mb-1"><?= $row['userkey']?></p>
            
          </div>
        </div>
        
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Username</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?=$_SESSION['username'];?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $row['email_user']?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Tipe Akun</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $row['userkey']?></p>
              </div>
            </div>
            
          </div>
        </div>
        <?php
            endforeach;
        ?>
        <div class="col-lg-12">
        <div class="card mb-4">
              <div class="card-body ">
                <p class="mb-4"><span class="text-primary font-italic me-1">Histori Pembelian</span> Project Status
                </p>
                <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Metode Pembayaran</th>
                    <th scope="col">Kurir Pengiriman</th>
                    <th scope="col">Produk yang dibeli</th>
                    <th scope="col">Total biaya</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $co = query("SELECT * FROM checkout WHERE username='$uname'");
                  $i = 1;
                  foreach($co as $row):
                  ?>
                  <tr> 
                    <th scope="row"><?=$i?></th>
                    <td><?=$row['username']?></td>
                    <td><?=$row['nama']?></td>
                    <td><?=$row['alamat']?></td>
                    <td><?=$row['pembayaran']?></td>
                    <td><?=$row['pengiriman']?></td>
                    <td><?=$row['product_kt']?></td>
                    <td><?=$row['total_checkout']?></td>
                    
                  <?php
                  $i++;
                endforeach;
                
                ?>
                </tbody>
              </table>
              </div>
            </div>
          
        </div>
      </div>
    </div>
  </div>
</section>
    </article>
  </main>



  <!-- 
    - #FOOTER
  -->

  <footer class="footer">

    <div class="footer-top">
      <div class="container">

        <div class="footer-brand">

          <a href="./index.html" class="logo">E-Karang<span class="span">pakel</span></a>

          <p class="footer-text">
            Ini adalah website yang menampung Usaha Mikro Kecil Menengah (UMKM) Desa Karangpakel di
            Kecamatan Trucuk, Klaten, Jawa Tengah, Indonesia.
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