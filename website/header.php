<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - Medilab Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medilab
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header sticky-top">

    <div class="topbar d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i>
          <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
          <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>
    </div><!-- End Top Bar -->

    <div class="branding d-flex align-items-center">

      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="home.php" class="logo d-flex align-items-center me-auto">
         
          <h1 style="color:#fff;">Medilab</h1>
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="home.php" class="active">Home<br></a></li>
            <li><a href="#about">About</a></li>
            <li><a href="service.php">Services</a></li>
            <li><a href="#departments">Departments</a></li>
            <li><a href="#doctors">Doctors</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="contact.php">Conatct Us</a></li>
            <li class="dropdown "><a href="#"><span>Tester's</span> <i class="bi bi-chevron-down toggle-dropdown "></i></a>
              <ul class="bg-black">
                <li><a href="tester.php" class="text-light">Tester</a></li>
                <li><a href="cpri_tester.php" class="text-light">CPRI Tester</a></li>
              </ul>
            </li>
            <li><a href="add_product.php"> Add Products</a></li>
            
            <li class="nav-item dropdown d-none d-lg-block user-dropdown">
              
              <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              
                <img class=" rounded-circle" src="../images/users/<?php echo $_SESSION['image']?>" alt="Profile image" style="height:50px;width:100%;"> </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                
                  <p class="mb-1 mt-3 fw-semibold text-dark"><?php echo $_SESSION['full_name']?></p>
                  <p class="fw-light text-muted mb-0 text-dark"><?php echo $_SESSION['email']?></p>
                </div>
                <a href="./user-dashboard/src/index.php" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline me-2"></i> <h6 class="text-dark ">Dash Board</h6> <span class="badge badge-pill badge-danger">1</span></a>

                <a href="logout.php" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline me-2"></i> <p class="text-danger ">Logout</p> <span class="badge badge-pill badge-danger">1</span></a>

              </div>
            </li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        

      </div>

    </div>

  </header>
   <!-- Scroll Top -->
   <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>
  <!-- Vendor JS Files -->
  <script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs@1.5.0/dist/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</script>
</body>

</html>