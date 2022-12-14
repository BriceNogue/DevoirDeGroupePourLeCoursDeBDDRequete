<html>
    <head><title>list fournisseur</title>
    </head>
    <body>

    <!--<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">List produits</h5>
            
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">References</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Quantite S</th>
                  </tr>
                </thead>
                <tbody>                
            <?php

            /*include("connexionDB.php");

            $query_selectListfamille = "select * from products;";
            $res = mysqli_query($con, $query_selectListfamille);
            $i = 1;
            while($row = mysqli_fetch_array($res))
            {
                echo " <tr><td>".$i."</td>";
                echo "<td>".$row["productId"]."</td>";
                echo "<td>".$row["reference"]."</td>";
                echo "<td>".$row["productName"]."</td>";
                echo "<td>".$row["price"]."</td>";
                echo "<td>".$row["qStock"]."</td></tr>";
                $i++;
            }*/
            ?>
                </tbody>
              </table>
              

            </div>
          </div>

        </div>
      </div>
    </section>-->


    <section class="section">
      <div class="row">
        <div class="col-md-12">
          <h5 class="card-title">List produits</h5>
        </div>


          <?php

            // Include the database configuration file  
            require_once 'connexionDB.php'; 
            
            // Get image data from database 
            $query_selectImg ="SELECT img, productId FROM products ORDER BY productId DESC"; 
            $result = mysqli_query($con, $query_selectImg);
          ?>

          <?php if($result->num_rows > 0){ ?>
            <div class="gallery row">
                  <?php while($row = $result->fetch_assoc()){ ?> 
                    <div class="card col-md-3" style="margin: 10px;">
                    <?php echo'<a href="./index.php?page=detail_produit&productId='?> <?php echo $row["productId"] ?> ">
                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['img']); ?>" style="width: 100%; height: 100%; border-radius: 5px;" />
                      </a>
                      </div>
                  <?php } ?> 
              </div>
          <?php }else{ ?>
              <p class="status error">Image(s) not found...</p> 
          <?php } ?>

      </div>
         
        <!--<div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">References</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Quantite S</th>
                  </tr>
                </thead>
                <tbody>                
                 
                </tbody>
              </table>

            </div>
          </div>

        </div>-->
      </div>
    </section>


    </body>
</html>