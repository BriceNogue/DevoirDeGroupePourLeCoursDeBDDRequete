

<?php

//print_r($_POST);
//connexion a la base de donnees

include("connexionDB.php");

$con = mysqli_connect("localhost","root","","commerce");

if(isset($_POST["save"]))
{
  
  $phone = $_POST["phone"];
  $locationId = $_POST["locationId"];
  $isConnected = true;

  //requete d'insertion d'un utilisateur
  $sql_connection = "SELECT * FROM users WHERE phone =$phone AND pwd =$pwd limit 1";
  
  if(mysqli_query($con,$sql_connection)){
    $isConnected = true;
    echo "Bienvenue sur GM-Markets";
  } else {
    $isConnected = false;
    echo "Erreur de connexion!";
  }
}

?>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Creer un compte</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
        <li class="breadcrumb-item active">S'inscrire</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">    
      <div class="col-lg-10">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Bienvenue</h5>
            <!-- No Labels Form -->
            <form class="row g-3" method="POST" action="">
              <div class="col-md-12">
                <input type="tel" class="form-control" placeholder="Telephone" size="15" minlength="9" maxlength required id="phone" name="phone">
              </div>
              <div class="col-md-12">
                <input type="password" class="form-control" placeholder="Mot de passe" name="pwd" id="pwd">
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary" id="save" name="save">Inscription</button>
                <button type="reset" class="btn btn-secondary">Annuler</button>
              </div>
            </form><!-- End No Labels Form -->
            <script>
                function limit(phone){
                  var max_chars = 12;
                  if(phone.value.length > max_chars){
                    phone.value = tel.value.substr(0, max_chars);
                  }
                }
              </script>
          </div>
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->
