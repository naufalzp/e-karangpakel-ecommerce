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
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin - Produk</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <span class="d-none d-lg-block">E-Kp Admin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/admin.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?=$_SESSION['username']?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?=$_SESSION['username']?></h6>
              <span>Admin</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../index.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Exit Dashboard</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
        <a class="nav-link collapsed" href="./">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#user-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person"></i><span>User</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="user-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="user.php" >
              <i class="bi bi-circle"></i><span>Kelola Akun</span>
            </a>
          </li>
          <li>
            <a href="user_add.php">
              <i class="bi bi-circle"></i><span>Tambahkan Akun</span>
            </a>
          </li>
        </ul>
      </li><!-- End user Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#berita-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-newspaper"></i><span>Berita</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="berita-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="berita.php">
              <i class="bi bi-circle"></i><span>Kelola Berita</span>
            </a>
          </li>
          <li>
            <a href="berita_add.php">
              <i class="bi bi-circle"></i><span>Tambahkan Berita</span>
            </a>
          </li>
        </ul>
      </li><!-- End Berita Nav -->
      

      <li class="nav-item">
        <a class="nav-link " data-bs-target="#produk-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-archive"></i><span>Produk</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="produk-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="#" class="active">
              <i class="bi bi-circle"></i><span>Kelola Produk</span>
            </a>
          </li>
          <li>
            <a href="produk_add.php">
              <i class="bi bi-circle"></i><span>Tambahkan Produk</span>
            </a>
          </li>
        </ul>
      </li><!-- End Produk Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#pesanan-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Pesanan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="pesanan-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="pesanan.php">
              <i class="bi bi-circle"></i><span>Kelola Pesanan</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End Pesanan Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#video-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-play-btn"></i><span>Video</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="video-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="video.php">
              <i class="bi bi-circle"></i><span>Kelola Video</span>
            </a>
          </li>
          <li>
            <a href="video_add.php">
              <i class="bi bi-circle"></i><span>Tambahkan Video</span>
            </a>
          </li>
        </ul>
      </li><!-- End video Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Kelola Produk</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
          <li class="breadcrumb-item">Produk</li>
          <li class="breadcrumb-item active">Kelola Produk</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Tanggal Dibuat</th>
                    <th scope="col">Status Promo</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $pdt = query("SELECT * FROM product");
                  $i = 1;
                  foreach($pdt as $row):
                  ?>
                  <tr>
                    <th scope="row"><?=$i?></th>
                    <td><?=$row['name_pdt']?></td>
                    <td><?php
                    if($row['ctg_product']==1){
                      echo "Makanan";
                    }
                    else if($row['ctg_product']==2){
                      echo "Minuman";
                    }
                    else if($row['ctg_product']==3){
                      echo "Kerajinan";
                    }
                    ?></td>
                    <td><img src="../assets/images/<?=$row['foto_pdt']?>"style="object-fit: cover;width: 100px;height: 100px;" alt=""></td>
                    <td><?=$row['create_date']?></td>
                    <td><?php if ($row['promo_pdt']==1) {
                    echo '<a href="updatepromo.php?id_pdt='.$row['id_pdt'].'&promo_pdt=0" class="btn btn-sm btn-success">Aktif</a>';
                  }else{
                    echo '<a href="updatepromo.php?id_pdt='.$row['id_pdt'].'&promo_pdt=1" class="btn btn-sm btn-danger">Mati</a>';
                  }
                    ?></td>
                    <td><button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"data-bs-target="#editModal<?= $i;?>">Edit</button>
                    <a href="deletepd.php?id_pdt=<?= $row['id_pdt'];?>" class="btn btn-danger btn-sm">Hapus</a></td>
                  </tr> 
                  <!-- Modal -->
            <div class="modal fade" id="editModal<?= $i;?>" tabindex="-1" aria-labelledby="editModalLabel<?= $i;?>"
              aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel<?= $i;?>">Edit Produk</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="" method="POST"  enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="form-floating mb-3">
                      <input id="uname" type="text" class="form-control d-none" name="id_pdt" value="<?= $row['id_pdt']?>">
                      <input id="uname" type="text" class="form-control" name="name_pdt" value="<?= $row['name_pdt']?>">
                      <label for="uname">Nama:</label>
                  </div>
                  <div class="mb-3">
                    <input class="form-control" type="file" name="foto" id="formFile">
                  </div>
                    <div class="form-floating mb-3">
                      <input id="uprice" type="text" class="form-control" name="price_pdt" value="<?= $row['price_pdt']?>">
                      <label for="uprice">Harga:</label>
                  </div>
                    <div class="form-floating mb-3">
                      <input id="udisc" type="number" class="form-control" name="disc_pdt" value="<?= $row['disc_pdt']?>">
                      <label for="udisc">Diskon:</label>
                  </div>
                    <div class="form-floating mb-3">
                    <select class="form-select" id="kategori" name="ctg_product" aria-label="Floating label select example">
                        <option value="1">Makanan</option>
                        <option value="2">Minuman</option>
                        <option value="3">Kerajinan</option>
                      </select>
                      <label for="kategori">Kategori Produk:</label>
                    </div>
                    <div class="form-floating mb-3">
                      <textarea class="form-control" placeholder="Deskripsi Produk" name="desc_pdt" style="height: 100px;" ><?= $row['desc_pdt']?></textarea>
                      <label for="floatingTextarea">Deskripsi Produk</label>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" name="simpan" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
                  <?php
                  $i++;
                endforeach;
                if(isset($_POST['simpan'])){
                    $edit=  mysqli_query($conn, "UPDATE product SET ... WHERE ...");
                    if($edit){
                      echo "<script>
                      window.addEventListener('load', function() { window.location.href=window.location.href;}, false);
                   </script>";
                    }
                }
                ?>
                </tbody>
              </table>
              <script>
                function showPw() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
              </script>
              
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
   
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>