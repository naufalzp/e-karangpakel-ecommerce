<?php
session_start();

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
  <link rel="stylesheet" href="./assets/css/home.css">

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
            <a href="#" class="nav-link text-large">Beranda</a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">Tentang</a>
          </li>

          <li class="nav-item">
            <a href="#produk" class="nav-link">Produk</a>
          </li>

          <li class="nav-item">
            <a href="#berita" class="nav-link">Berita</a>
          </li>

          <li class="nav-item">
            <a href="#video" class="nav-link">Video</a>
          </li>

          <li class="nav-item">
            <a href="./contact.php" class="nav-link">Kontak</a>
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

      <!-- 
        - #HERO
      -->

      <section class="hero">
        <div class="container">

          <div class="hero-content">

            <!-- <p class="hero-subtitle">25% off all products.</p> -->

            <h2 class="h1 hero-title">
              Selamat Datang
              di <br><span class="span">E-Karangpakel</span>
            </h2>

            <p class="hero-text">
              UMKM Desa Karangpakel
            </p>

            <a href="#produk" class="btn btn-lg btn-success border-0 rounded-5 p-4" style="width:50%;">
              <span class="span" style="font-size:large;">Belanja</span>
            </a>

          </div>

          <figure class="hero-banner">
            <img src="./assets/images/hero-banner.png" width="603" height="634" loading="lazy" alt="Vegetables"
              class="w-100">
          </figure>

        </div>
      </section>





      <!-- 
        - #SERVICE
      -->

      <section class="section service">
        <div class="container">

          <ul class="service-list">

            <li class="service-item">
              <div class="item-icon">
                <img src="./assets/images/service-icon-1.png" width="40" height="40" loading="lazy" alt="Truck icon">
              </div>

              <h3 class="h3 item-title">Gratis Ongkir</h3>
            </li>

            <li class="service-item">
              <div class="item-icon">
                <img src="./assets/images/service-icon-2.png" width="40" height="40" loading="lazy"
                  alt="Payment card icon">
              </div>

              <h3 class="h3 item-title">Pembayaran Aman</h3>
            </li>

            <li class="service-item">
              <div class="item-icon">
                <img src="./assets/images/service-icon-3.png" width="40" height="40" loading="lazy" alt="Helpline icon">
              </div>

              <h3 class="h3 item-title">24/7 Bantuan</h3>
            </li>

          </ul>

        </div>
      </section>





      <!-- 
        - #OFFERS
      -->

      <section class="section offers" id="promo">
        <div class="container">

          <ul class="offers-list has-scrollbar">
            <?php
            $ppromo = query("SELECT * FROM product WHERE promo_pdt=1");
            foreach($ppromo as $row):
            ?>
            <li class="offers-item">
              <a href="./product-details.php?id_pdt=<?= $row['id_pdt'];?>" class="offers-card">

                <figure class="card-banner">
                  <img src="./assets/images/<?= $row['foto_pdt']?>" width="292" height="230" loading="lazy"
                    alt="Fresh vegetables package" class="w-100 shadow rounded-5">
                </figure>

                <div class="card-content">
                  <p class="card-subtitle">Diskon <?= $row['disc_pdt']?>%</p>

                  <h3 class="h3 card-title"><?= $row['name_pdt']?></h3>

                  <div class="btn btn-lg btn-success border-0 p-3">Beli Sekarang</div>
                </div>

              </a>
            </li>
            <?php endforeach;?>

          </ul>

        </div>
      </section>





      <!-- 
        - #PRODUCT
      -->

      <section class="section product" id="produk">
        <div class="container">

          <p class="section-subtitle"> -- Asli Desa Karangpakel --</p>

          <h2 class="h2 section-title">Kategori</h2>

          <ul class="filter-list">

            <li>
              <button id="makanan" class="filter-btn btn btn-success border-0 filter-text">
                <i class="fa-solid fa-utensils fa-2xl"></i>
                Makanan
              </button>
            </li>

            <li>
              <button id="minuman" class="filter-btn btn btn-success border-0 filter-text">
                <i class="fa-solid fa-whiskey-glass fa-2xl"></i>
                Minuman
              </button>
            </li>

            <li>
              <button id="kerajinan" class="filter-btn btn btn-success border-0 filter-text">
                <i class="fa-solid fa-tarp  fa-2xl"></i>
                Kerajinan
              </button>
            </li>

          </ul>
          <div id="fmakanan" class="">
            <ul class="grid-list">

              <!-- MAKANAN -->
              <?php
            $pmakan = query("SELECT * FROM product WHERE ctg_product=1");
            foreach($pmakan as $row):
            ?>
              <li>
                <div class="product-card">

                  <figure class="card-banner">
                    <img src="./assets/images/<?= $row['foto_pdt'];?>" class="rounded-5 shadow" width="189" height="189"
                      loading="lazy">

                    <div class="btn-wrapper">
                      <a href="./product-details.php?id_pdt=<?= $row['id_pdt'];?>" class="product-btn" aria-label="Lihat">
                        <ion-icon name="eye-outline"></ion-icon>

                        <div class="tooltip">Lihat</div>
                      </a>
                    </div>
                  </figure>

                  <h3 class="h4 card-title">
                    <a href="./product-details.html"><?= $row['name_pdt'];?></a>
                  </h3>

                  <div class="price-wrapper">
                    <data class="price" value="<?= $row['price_pdt'];?>">Rp <?= $row['price_pdt'];?></data>
                  </div>

                <a href="./product-details.php?id_pdt=<?= $row['id_pdt'];?>"><button class="btn btn-lg btn-success border-0 p-3">Tambahkan ke Keranjang</button></a>

                </div>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>
          <div id="fminuman" class="d-none">
            <ul class="grid-list">

              <!-- MINUMAN -->
              <?php
            $pminuman = query("SELECT * FROM product WHERE ctg_product=2");
            foreach($pminuman as $row):
            ?>
              <li>
                <div class="product-card">

                  <figure class="card-banner">
                    <img src="./assets/images/<?= $row['foto_pdt'];?>" class="rounded-5 shadow" width="189" height="189"
                      loading="lazy">

                    <div class="btn-wrapper">
                      <a href="./product-details.php?id_pdt=<?= $row['id_pdt'];?>" class="product-btn" aria-label="Lihat">
                        <ion-icon name="eye-outline"></ion-icon>

                        <div class="tooltip">Lihat</div>
                      </a>
                    </div>
                  </figure>

                  <h3 class="h4 card-title">
                    <a href="./product-details.html"><?= $row['name_pdt'];?></a>
                  </h3>

                  <div class="price-wrapper">
                    <data class="price" value="<?= $row['price_pdt'];?>">Rp <?= $row['price_pdt'];?></data>
                  </div>

                  <a href="./product-details.php?id_pdt=<?= $row['id_pdt'];?>"><button class="btn btn-lg btn-success border-0 p-3">Tambahkan ke Keranjang</button></a>

                </div>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>
          <div id="fkerajinan" class="d-none">
            <ul class="grid-list">

              <!-- KERAJINAN -->
              <?php
            $pkerajinan = query("SELECT * FROM product WHERE ctg_product=3");
            foreach($pkerajinan as $row):
            ?>
              <li>
                <div class="product-card">

                  <figure class="card-banner">
                    <img src="./assets/images/<?= $row['foto_pdt'];?>" class="rounded-5 shadow" width="189" height="189"
                      loading="lazy">

                    <div class="btn-wrapper">
                      <a href="./product-details.php?id_pdt=<?= $row['id_pdt'];?>" class="product-btn" aria-label="Lihat">
                        <ion-icon name="eye-outline"></ion-icon>

                        <div class="tooltip">Lihat</div>
                      </a>
                    </div>
                  </figure>

                  <h3 class="h4 card-title">
                    <a href="./product-details.html"><?= $row['name_pdt'];?></a>
                  </h3>

                  <div class="price-wrapper">
                    <data class="price" value="<?= $row['price_pdt'];?>">Rp <?= $row['price_pdt'];?></data>
                  </div>

                  <a href="./product-details.php?id_pdt=<?= $row['id_pdt'];?>"><button class="btn btn-lg btn-success border-0 p-3">Tambahkan ke Keranjang</button></a>

                </div>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </section>





      <!-- 
        - #BLOG
      -->

      <section class="section blog" id="berita">
        <div class="container">

          <p class="section-subtitle"> -- Berita Update Terusss.. --</p>

          <h2 class="h2 section-title">Berita</h2>

          <ul class="blog-list">
            <?php
            $pberita = query("SELECT * FROM berita ");
            $i=1;
            foreach($pberita as $row):
            ?>
            <li>
              <div class="blog-card">

                <div class="card-banner ">
                  <img src="./assets/images/<?= $row['foto_berita'];?>" class="cover" loading="lazy" class="w-100">
                </div>

                <div class="card-content">
                  <div class="card-wrapper">
                    <h3 class="h3 card-title">
                      <a href="" data-bs-toggle="modal"
                        data-bs-target="#beritaModal<?= $i;?>"><?= $row['name_berita']; ?></a>
                    </h3>
                  </div>

                  <button type="button" class="btn btn-success btn-lg" data-bs-toggle="modal"
                    data-bs-target="#beritaModal<?= $i;?>">
                    Baca
                  </button>
                </div>


              </div>
            </li>
            <!-- Modal -->
            <div class="modal fade" id="beritaModal<?= $i;?>" tabindex="-1" aria-labelledby="beritaModalLabel<?= $i;?>"
              aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="beritaModalLabel<?= $i;?>">Detail Berita</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <h2><?= $row['name_berita'];?></h2><br>
                    <img src="./assets/images/<?= $row['foto_berita'];?>" class="cover2" loading="lazy"
                      class="w-100"><br>
                    <?= $row['isi_berita'];?>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            <?php
              $i++;
          endforeach;
              ?>
          </ul>

        </div>
      </section>





      <!-- 
        - #VIDEO
      -->

      <section class="section" id="video">
        
      <p class="section-subtitle"> -- Video yang Ngetrend --</p>

<h2 class="h2 section-title">Video</h2>

        <div class="container d-flex justify-content-center">
          <div style="width:50%; height: 50%;">
            <div id="carouselExampleIndicators" data-pause="hover" class="carousel slide" data-bs-ride="true">
              <div class="carousel-indicators">
                <?php
                $pvideo = query("SELECT * FROM video");
                $ds = 0;
                $s = 1;
                foreach($pvideo as $row):
                ?>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $ds; ?>"<?php if ($ds == 1) {
                  echo 'class="active"';
                }
                ;?>  aria-current="true" aria-label="Slide <?= $s;?>"></button>

                <?php
                $ds++;
                $s++;
              endforeach;?>
              </div>
              <div class="carousel-inner ">
              <?php
                $pvideo = query("SELECT * FROM video");
              $ac = 0;
                foreach($pvideo as $row):
                ?>
                <div class="carousel-item <?php if ($ac == 0) {echo 'active';}?> text-center">
                  <?= $row['link_video'];?>
                  </div>

                <?php
                $ac++;
              endforeach;?>
                  
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
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
              Ini adalah website yang menampung Usaha Mikro Kecil Menengah (UMKM) Desa Karangpakel di Kecamatan Trucuk, Klaten, Jawa Tengah, Indonesia.
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