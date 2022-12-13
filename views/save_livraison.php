<?php

//print_r($_POST);
//connexion a la base de donnees

include("connexionDB.php");   
print_r($_POST);        
          if(isset($_POST["save"]))          
          {            
            $date=$_POST["date"];
            $idfournisseur=$_POST["four"];
            $idCategorie=$_POST["category"];            
            //requete pour le produit

            $querySelectProduit = "SELECT DISTINCT idProduit 
            FROM produit
            WHERE produit.idCategorie = $idCategorie";

            $res = mysqli_query($con, $querySelectProduit);

            while($row=mysqli_fetch_array($res)){
               $idproduit=$row[0];                              
              // $check = $_POST["check'.$idProduit.'"];
              //if(isset($check)){             
                $stockInit=$_POST["stockini".$idproduit];
                $finalStock=$_POST["stockfinal".$idproduit];
                $quantite=$_POST["quantite6"];
                $prixu=$_POST["prixU6"];
                $prixt=$_POST["prixT0"];

               
               $sql_insertion="INSERT INTO livraison(quantite,stockInitProduit,stockFinalProduit, idFournisseur,dateLivraison,idProduit,prix_U,prix_T) 
               VALUES ('$quantite','$stockInit','$finalStock','$idfournisseur','$date','$idproduit','$prixu','$prixt')";              
                echo $sql_insertion;
                if(mysqli_query($con, $sql_insertion))
                   echo "La livraison a ete enregistrer avec succes";
                else  
                    echo "Veuillez ressayer";
              }

            //}
          }


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Forms / Layouts - NiceAdmin Bootstrap Template</title>
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
        <span class="d-none d-lg-block">TIPAM2-G12</span>
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

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
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

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
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
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
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

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Enregistrement</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Enregistrement</li>
          <li class="breadcrumb-item active">Livraison</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">    
        <div class="col-lg-24">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Livraison</h5>

              <!-- No Labels Form -->
              <form class="row g-3" method="POST" action="">
              <div class="form-floating mb-3">
                    <select class="form-select" id="four" name="four" aria-label="State">
                      <option value="-1" selected>Selectionner un fournisseur</option>
                     <?php
                     include("connexionDB.php");
                     $queryselectedListFamille = "SELECT idFournisseur, codeFournisseur,nomFournisseur, 
                     raisonSociale,email, telephone FROM fournisseur";
                     $res = mysqli_query($con, $queryselectedListFamille);
                     while($row = mysqli_fetch_array($res))
                     {
                       echo "<option value = ".$row["idFournisseur"].">".$row["nomFournisseur"]."</option>";
                     }
                     
                     ?>
                    </select>
                  </div>
                <div class="col-12">
                  <input type="date" class="form-control" placeholder="date livraison" id="date" name="date">
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="family" name="family" aria-label="State">
                      <option value="-1" selected>Selectionner une famille</option>
                     <?php
                     include("connexionDB.php");
                     $queryselectedListFamille = "SELECT  idFamille, nomFamille FROM familleproduit";
                     $res = mysqli_query($con, $queryselectedListFamille);
                     while($row = mysqli_fetch_array($res))
                     {
                       echo "<option value = ".$row["idFamille"].">".$row["nomFamille"]."</option>";
                     }
                     
                     ?>
                    </select>
                  </div>
                  <div class="form-floating mb-3">
                    <select class="form-select" id="category" name="category" aria-label="State" >
                    <option value="-1" selected>Selectionner une categorie</option>
                     
                     <?php
                     /*
                     include("connexionDB.php");
                     $queryselectedListFamille = "SELECT  idCategorie, nomCategorie FROM categorieproduit";
                     $res = mysqli_query($con, $queryselectedListFamille);
                     while($row = mysqli_fetch_array($res))
                     {
                       echo "<option value = ".$row["idCategorie"].">".$row["nomCategorie"]."</option>";
                     }*/
                     
                     ?>
                    </select>
                  </div>
                <section class="section">
                  <div class="row">
                    <div class="col-lg-12">
                          <!-- Table with stripped rows -->
                          <table class="table datatable">
                            <thead>
                              <tr>
                                <th scope="col">G</th>
                                <th scope="col">Nomf</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Quantite</th>
                                <th scope="col">Stockf</th>
                                <th scope="col">PrixU</th>
                                <th scope="col">PrixT</th>
                              </tr> 
                            </thead>
                            <tbody id="tableau">           
                        <?php 

                                include("connexionDB.php");

                                //$category = $_GET["category"];

                                $category ="SELECT * FROM produit WHERE idCategorie ORDER BY reference";
                                $res = mysqli_query($con, $category);

                                $listCategory="";
                                while($row = mysqli_fetch_array($res))
                                {
                                    $idproduit = $row["idProduit"]; 
                                    $val = 0;
                                    //Infor pour le produit xxxx
                                  /* $querySelectLivraison ="SELECT stockFinalProduit FROM livraison lv, produit pd WHERE lv.idProduit = pd.idProduit AND lv.idProduit =$idproduit";
                                $res4 = mysqli_query($con,  $querySelectLivraison);
                                $row2 = mysqli_fetch_array($res4);

                                if(count($row2) ==0){
                                    $val = 0;
                                }
                                else{
                                    $val = $row2["stockFinalProduit"];
                                }*/
                                //''''
                                  
                                    $listCategory.= '<tr><td><input type="checkbox" name="check'.$idproduit.'" class="check" value="checked" onclick="activeSaisie('.$idproduit.')"></td>
                                                            <td>'.$row["reference"].'</td>
                                                            <td><input type="text" size="10" class="form-control" value="'.$val.'" name="stockini'.$idproduit.'" id="stockini'.$idproduit.'" readOnly/></td>
                                                            <td><input type="number" size="10" class="form-control" name="quantite'.$idproduit.'" class="inputQuantity" id="quantite'.$idproduit.'" disabled/></td>
                                                            <td><input type="text" size="10" class="form-control" name="stockfinal'.$idproduit.'" id="stockfinal'.$idproduit.'" value="'.$val.'" readOnly/></td>
                                                            <td><input type="text" size="10" class="form-control" name="prixU'.$idproduit.'" id="prixU'.$idproduit.'" value="'.$row["prix"].'" readOnly/></td>
                                                            <td><input type="number" class="form-control" name="prixT'.$idproduit.'" id="prixT'.$idproduit.'" value="0" readOnly></td></tr>
                                                            ';
                                }
                                echo $listCategory;
                                                        ?>
                            </tbody>
                          </table>
                          <!-- End Table with stripped rows -->
                    </div>
                  </div>
                </section>
                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" id="save" name="save"  onclick="calculer()">Save</button>
                  <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
                
              </form><!-- End No Labels Form -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->


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
  <!--jquery-->
   

    <script type="text/javascript">
  $(document).ready(function(){
          //alert("sfffwef");
          var family = $("#family");
          var category = $("#category");
          var tableau = $("#tableau");
    //alert("gfgfg");
          family.change(function(){
              var family = $("#family").val();
              $.post(
                "ajax/ControllerCategory.php?family="+family,
                function(data){
                  category.html(data);
                });
          });
        });
        
        /**tableau 
        category.change(function (){
    //alert("djdkdkjd");
    var category = $("#category").val();
    $.post(
      "ajax/ControlleurProduct.php?category="+category,
      function (data){
        alert(data);
        tableau.html(data);
      });
  });
});*/
    </script>

</body>

</html>


<script type="text/javascript">
            function total(quantite, prixu){
                //TODO A completer
                var prixt = quantite*prixu;
                var calcul = total(quantite,prixu);
            }

            function calculer() {
                    var quantite = parseInt(document.getElementById("#quantite").value);
                    var prixu = parseInt(document.getElementById("#prixU").value);  
                    var somme = total(quantite,prixu);
                    document.getElementById("total").innerHTML = somme;

            }

</script>


<script type="text/javascript">
/**Essai pour l'activation du checkox et * le grisage de l'input type text*/
function activeSaisie(idproduit){
  alert(idproduit);
  var text = document.querySelector("#quantite"+idproduit);
  text.disabled = false; 


 var prixTotal = document.querySelector("#prixT"+idproduit);
        var prixUnit = document.getElementById("prixU"+idproduit);
        

    text.addEventListener("change", function(){
      prixTotal.value = Number(quantity.value);
      prixUnit.value = Number(quantity.value);
    })
};
       
    
</script>
<!--<td><input type="number" name="quantite'.$idProduit.'" id="quantite'.$idProduit.'" value="0" onChange="changeValue('.$idProduit.');" disabled/></td>-->
