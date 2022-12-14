<?php
/*

  //print_r($_POST);
  //connexion a la base de donnees

  include("connexionDB.php");

  $con = mysqli_connect("localhost","root","","commerce");

  if(isset($_POST["save"]))
  {
    $ref = $_POST["ref"];
    $pName = $_POST["pName"];
    $price = $_POST["price"];
    $qStock = $_POST["qStock"];

    //requete d'insertion d'un fournissseur
    $sql_insertfour = "INSERT INTO products(reference, productName, price, qStock) 
    VALUES ('$ref','$pName','$price','$qStock')";
    if(mysqli_query($con,$sql_insertfour)) 
        echo "le produit  a ete enregistré";
      else
        echo "verifier votre requete";
  }*/

?>

<?php 
// Include the database configuration file  
//require_once 'connexionDB.php'; 

include("connexionDB.php");
$con = mysqli_connect("localhost","root","","commerce");

// If file upload form is submitted 
$status = $statusMsg = ''; 
if(isset($_POST["save"])){ 

  $status = 'error'; 

  $ref = $_POST["ref"];
  $pName = $_POST["pName"];
  $price = $_POST["price"];
  $qStock = $_POST["qStock"];

  if(!empty($_FILES["image"]["name"])) { 
      // Get file info 
      $fileName = basename($_FILES["image"]["name"]); 
      $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        
      // Allow certain file formats 
      $allowTypes = array('jpg','png','jpeg','gif'); 
      if(in_array($fileType, $allowTypes)){ 
          $img = $_FILES['image']['tmp_name']; 
          $imgContent = addslashes(file_get_contents($img)); 
        
          // Insert image content into database 
          $sql_insertfour = ("INSERT into products (reference, productName, price, qStock, img, createdDate)
           VALUES ('$ref','$pName','$price','$qStock','$imgContent', NOW())");
          //$insert = $db->query("INSERT into products (reference, productName, price, qStock, img, createdDate) VALUES ('$ref','$pName','$price','$qStock','$imgContent', NOW())");
            
          if(mysqli_query($con,$sql_insertfour)){ 
              $status = 'success'; 
              $statusMsg = "File uploaded successfully.";
              echo "le produit  a ete enregistré";
          }else{ 
              $statusMsg = "File upload failed, please try again."; 
              echo "verifier votre requete";
          }  
      }else{ 
          $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
      } 
  }else{ 
      $statusMsg = 'Please select an image file to upload.'; 
  }
} 
 
// Display status message 
echo $statusMsg; 
?>




  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Ajouter un produit</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Ajouter un produit</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">    
        <div class="col-lg-10">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Produits</h5>
              <!-- No Labels Form -->
              <form class="row g-3" method="POST" action="" enctype="multipart/form-data">
                <div class="col-md-12">
                  <input type="text" class="form-control" placeholder="Entrer la reference du produit" id="ref" name="ref">
                </div>
                <div class="col-12">
                  <input type="text" class="form-control" placeholder="Entrer le nom du produit" id="pName" name="pName">
                </div>
                <div class="col-12">
                  <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="col-12">
                  <input type="number" class="form-control" placeholder="Prix" name="price" id="price">
                </div>
                <div class="col-12">
                  <input type="number" class="form-control" placeholder="Quantite" name="qStock" id="qStock">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" id="save" name="save" value="Upload">Save</button>
                  <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
              </form><!-- End No Labels Form -->
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
