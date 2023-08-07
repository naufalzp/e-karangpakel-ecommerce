<?php
session_start();
if(isset($_SESSION['login'])){
    header("location:index.php");
}
include "function.php";
if(isset($_POST['register'])){
    
    if(register($_POST) > 0){
        echo "<script>alert('user added');</script>";
    }
    else{
        echo mysqli_error($conn);
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Register -</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="./admin/assets/img/favicon.png" rel="icon">
  <link href="./admin/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="./admin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="./admin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="./admin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="./admin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="./admin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="./admin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="./admin/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="./admin/assets/css/style.css" rel="stylesheet">
</head>

<body style="background-image: url('')">

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="./" class="logo d-flex align-items-center w-auto">
                  <span class="d-none d-lg-block">E-Karangpakel</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Buat akun</h5>
                    <p class="text-center small">Masukan data anda</p>
                  </div>

                  <form class="row g-3 needs-validation" action="" method="POST">
                    
                      <div class="col-12">
                        <label for="yourUsername" class="form-label">Username</label>
                        <div class="input-group has-validation">
                          <input type="text" name="username" class="form-control" id="yourUsername" required>
                          <div class="invalid-feedback">Please choose a username.</div>
                        </div>
                      </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Your Email</label>
                      <input type="email" name="email_user" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>


                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="pw" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Konfirmasi Password</label>
                      <input type="password" name="pw2" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                    <div class="col-12"> 
                      <button class="btn btn-success w-100" name="register" type="submit">Create Account</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Sudah Punya Akun? <a href="login.php">Masuk</a></p>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="./admin/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="./admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="./admin/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="./admin/assets/vendor/echarts/echarts.min.js"></script>
  <script src="./admin/assets/vendor/quill/quill.min.js"></script>
  <script src="./admin/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="./admin/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="./admin/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="./admin/assets/js/main.js"></script>

</body>

</html>