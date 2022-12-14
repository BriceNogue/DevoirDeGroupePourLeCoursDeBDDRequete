<?php
 
// Starting the session, to use and
// store data in session variable
session_start();
  
// If the session variable is empty, this
// means the user is yet to login
// User will be sent to 'login.php' page
// to allow the user to login
if (!isset($_SESSION['phone'])) {
    $_SESSION['msg'] = "You have to log in first";
    //header('location: login.php');
} else {
  //header('location: index.php');
}
  
// Logout button will destroy the session, and
// will unset the session variables
// User will be headed to 'login.php'
// after logging out
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['phone']);
    header("location: login.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - GM-Market</title>
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

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">GM-Market</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li>
          <a href="save_user.php"><button class="btn btn-primary">Sign in</button></a>
        </li>

        <li class="nav-item dropdown">

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="./assets/Sign up-amico.svg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">G. Mambou</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Groupe Mambou</h6>
              <span>Projet de groupe</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
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
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a href="./index.php?page=save_produit" class="nav-link collapsed">
          <i class="bi bi-bag-plus"></i><span>Ajouter un produit</span>
        </a>
        <!--<ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="./index.php?page=save_fournisseur">
              <i class="bi bi-circle"></i><span>Fournisseurs</span>
            </a>
          </li>
          <li>
            <a href="./index.php?page=save_family">
              <i class="bi bi-circle"></i><span>Famille</span>
            </a>
          </li>
          <li>
            <a href="./index.php?page=save_category">
              <i class="bi bi-circle"></i><span>categories</span>
            </a>
          </li>
          <li>
            
          <li>
            <a href="./index.php?page=save_livraison2">
              <i class="bi bi-circle"></i><span>Livraison</span>
            </a>
          </li>
          <li>
            <a href="./index.php?page=listfour">
              <i class="bi bi-circle"></i><span>Liste de Fournisseur</span>
            </a>
          </li>
        </ul>-->
      </li><!-- End Enregistrement Nav -->

      <li class="nav-item">
        <a href="./index.php?page=listProduits" class="nav-link collapsed">
          <i class="bi bi-bag"></i><span>Mon stock</span>
        </a>
        <!--<ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="./index.php?page=listfour">
              <i class="bi bi-circle"></i><span>Fournisseurs</span>
            </a>
          </li>
          
          <li>
            <a href="./index.php?page=listcate">
              <i class="bi bi-circle"></i><span>categories</span>
            </a>
          </li>
          <li>
          <a href="./index.php?page=Controlleurrecherche">
              <i class="bi bi-circle"></i><span>Prod</span>
            </a>
          </li>
          <li>
            <a href="forms-validation.html">
              <i class="bi bi-circle"></i><span>Livraisons</span>
            </a>
          </li>
          <li>
            <a href="./index.php?page=listrecherche">
              <i class="bi bi-circle"></i><span>Recherche</span>
            </a>
          </li>
        </ul>-->
      </li><!-- End List Nav -->

      <li class="nav-item">
        <a href="./index.php?page=listProduits" class="nav-link collapsed">
          <i class="bi bi-bag-check-fill"></i><span>Produits vendu</span>
        </a>
        <!--<ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="./index.php?page=listfour">
              <i class="bi bi-circle"></i><span>Fournisseurs</span>
            </a>
          </li>
          
          <li>
            <a href="./index.php?page=listcate">
              <i class="bi bi-circle"></i><span>categories</span>
            </a>
          </li>
          <li>
          <a href="./index.php?page=Controlleurrecherche">
              <i class="bi bi-circle"></i><span>Prod</span>
            </a>
          </li>
          <li>
            <a href="forms-validation.html">
              <i class="bi bi-circle"></i><span>Livraisons</span>
            </a>
          </li>
          <li>
            <a href="./index.php?page=listrecherche">
              <i class="bi bi-circle"></i><span>Recherche</span>
            </a>
          </li>
        </ul>-->
      </li>

      <li class="nav-item">
        <a href="./index.php?page=listProduits" class="nav-link collapsed">
          <i class="bi bi-currency-euro"></i><span>Achat</span>
        </a>
        <!--<ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="./index.php?page=listfour">
              <i class="bi bi-circle"></i><span>Fournisseurs</span>
            </a>
          </li>
          
          <li>
            <a href="./index.php?page=listcate">
              <i class="bi bi-circle"></i><span>categories</span>
            </a>
          </li>
          <li>
          <a href="./index.php?page=Controlleurrecherche">
              <i class="bi bi-circle"></i><span>Prod</span>
            </a>
          </li>
          <li>
            <a href="forms-validation.html">
              <i class="bi bi-circle"></i><span>Livraisons</span>
            </a>
          </li>
          <li>
            <a href="./index.php?page=listrecherche">
              <i class="bi bi-circle"></i><span>Recherche</span>
            </a>
          </li>
        </ul>-->
      </li><!-- End List Nav -->

      <li class="nav-item">
        <a href="./index.php?page=listProduits" class="nav-link collapsed">
          <i class="bi bi-basket2"></i><span>Produits achete</span>
        </a>
        <!--<ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="./index.php?page=listfour">
              <i class="bi bi-circle"></i><span>Fournisseurs</span>
            </a>
          </li>
          
          <li>
            <a href="./index.php?page=listcate">
              <i class="bi bi-circle"></i><span>categories</span>
            </a>
          </li>
          <li>
          <a href="./index.php?page=Controlleurrecherche">
              <i class="bi bi-circle"></i><span>Prod</span>
            </a>
          </li>
          <li>
            <a href="forms-validation.html">
              <i class="bi bi-circle"></i><span>Livraisons</span>
            </a>
          </li>
          <li>
            <a href="./index.php?page=listrecherche">
              <i class="bi bi-circle"></i><span>Recherche</span>
            </a>
          </li>
        </ul>-->
      </li>

      <!--<li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Statistiques</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="tables-general.html">
              <i class="bi bi-circle"></i><span>Livraison</span>
            </a>
          </li>
          <li>
            <a href="tables-data.html">
              <i class="bi bi-circle"></i><span>Produits</span>
            </a>
          </li>
        </ul>
      </li>-- End statistique Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

  <?php 
    @$page = "./views/".$_GET["page"];
    if($page != "./views/") 
    $page = $page.".php";
    else 
    $page = "./views/welcome.php";
    include_once($page);
  ?>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>GroupeMambou</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>