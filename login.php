

<?php

//print_r($_POST);
//connexion a la base de donnees

  include("connexionDB.php");

  $con = mysqli_connect("localhost","root","","commerce");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

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

</head>
<body>
  <main id="main" class="main">
    <section class="section">
      <div class="row">    
        <div class="col-lg-4" style="position: relative; margin-left: 35%; box-shadow: 0.5; margin-top: 10%;">
          <div class="card">
            <div class="card-header" style="display: flex; justify-content:center;">
              <img src="./assets/Tablet login-bro.svg" alt="" width="35%">
            </div>
            <div class="card-body">
              <div class="card-title" style="display: flex; justify-content:center;">
                <h5 class="card-title" style="margin-bottom: 10px;">Se connecter</h5>
              </div>
              <!-- No Labels Form -->
              <form class="row g-3" method="POST" action="login.php">
                <div class="col-md-12">
                  <input type="tel" class="form-control" placeholder="Telephone" size="15" minlength="9" maxlength required id="phone" name="phone">
                </div>
                <div class="col-md-12">
                  <input type="password" class="form-control" placeholder="Mot de passe" name="pwd" id="pwd">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" id="log_user" name="log_user">Connexion</button>
                </div>

                <div>
                  <p>
                    <a href="save_user.php">
                        Je n'est pas de compte
                    </a>
                  </p>
                </div>
              </form>
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

</body>
</html>