  <div id="login-page">
    <div class="col-lg-12">
    <h4><i class="fa fa-angle-right"></i></h4><br><br>
    <form class="cmxform form-horizontal style-form" id="commentForm" method="POST">
        <h2 class="form-login-heading">Enregistrement Livraison</h2> 
        <?php
        //print_r($_POST);
          include("connexionDB.php");           
          if(isset($_POST["btn"]))          
          {            
            $date=$_POST["date"];
            $idfournisseur=$_POST["fournisseur"];
            $idCategorie=$_POST["category"];            
            //requete pour le produit

            $querySelectProduit = "SELECT DISTINCT idProduit 
            FROM produit
            WHERE produit.idCategorie = $idCategorie";

            $res = mysqli_query($con, $querySelectProduit);

            while($row=mysqli_fetch_array($res)){
               $idProduit=$row[0];                              
              // $check = $_POST["check'.$idProduit.'"];
              //if(isset($check)){             
                $stockInit=$_POST["stockInitProduit".$idProduit];
                $finalStock=$_POST["stockFinalProduit".$idProduit];
                $quantite=$_POST["quantite".$idProduit];
                $prixu=$_POST["price".$idProduit];
                $total=$_POST["total".$idProduit];

               
               $sql_insertion="INSERT INTO livraison(quantite, stockInitProduit, stockFinalProduit, idFournisseur, dateLivraison, idProduit,prix_U,prix_T)
               VALUES ('$quantite','$stockInit','$finalStock','$idfournisseur','$date','$idProduit','$prixu','$total')";              
                
                if(mysqli_query($con, $sql_insertion))
                   echo "La livraison a ete enregistrer avec succes";
                else  
                    echo "Veuillez ressayer";
              //}

            }
          }       
        ?>     
           <div class="form-panel">
              <div class="form">
                
                <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="">
                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Fournisseur</label>
                    <div class="col-lg-10">
                      <select class=" form-control" id="fournisseur" name="fournisseur" minlength="2" required>
                      <option value="-1">Selectionner un fournisseur</option>
                          <?php
                            $querySelectListFournisseur="SELECT DISTINCT idFournisseur,nomFournisseur FROM fournisseur";   
                            $res=mysqli_query($con,$querySelectListFournisseur);
                            
                            while($row=mysqli_fetch_array($res)){
                              echo "<option value='".$row["idFournisseur"]."'>".$row["nomFournisseur"]."</option>";
                            }
                          ?> 
                      </select>
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="cemail" class="control-label col-lg-2">Date livraison</label>
                    <div class="col-lg-10">
                      <input class="form-control " id="date" type="date" name="date" required />                      
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="curl" class="control-label col-lg-2">Famille produit</label>
                    <div class="col-lg-10">
                      <select class="form-control " id="family" type="url" name="family">
                      <option value="-1">Selectionner famille</option>
                          <?php
                            $querySelectListFamille="SELECT DISTINCT idFamille,nomFamille FROM familleproduit";   
                            $res=mysqli_query($con,$querySelectListFamille);
                            
                            while($row=mysqli_fetch_array($res)){
                              echo "<option value='".$row["idFamille"]."'>".$row["nomFamille"]."</option>";
                            }
                          ?> 
                      </select>
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="ccomment" class="control-label col-lg-2">Categorie</label>
                    <div class="col-lg-10">
                      <select class="form-control " id="category" name="category" required>
                        <option></option>
                      </select>
                    </div>
                  </div>
                  <div class="content-panel">
                    <table class="table table-hover">
                        <h4><i class="fa fa-angle-right">Livraison</i></h4>
                        <thead>
                          <tr>
                            <td>#</td>
                            <td>Checked</td>
                            <td>Name references</td>
                            <td>Stock Init</td>
                            <td>Quantite</td>
                            <td>Stock Final</td>
                            <td>Prix Unitaire</td>
                            <td>Total</td>
                          </tr>
                        </thead>
                        <tbody id="tableau" name="tableau">                              
                        </tbody>
                    </table>               
                  </div>                        
                  <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <br>
                      <br>
                      <button name="btn" id="btnSave" class="btn btn-theme" type="submit">Save</button>
                      <button name="btnCancel" id="btnCancel" class="btn btn-theme04" type="button">Cancel</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
      </form>
    </div>
</div>   
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
      var family=$("#family");
      var category=$("#category");
      var tableau=$("#tableau");
      
      family.change(function(){
          var family=$("#family").val();
          $.post(
            "ajax/ControlleurCategory.php?family="+family,
            function(data){
              category.html(data);
            });
      });
      category.change(function(){
        var category=$("#category").val();
        $.post(
          "ajax/ControlleurLivraison.php?category="+category,
          function(data){
            tableau.html(data);
          });
      });
    });
</script>