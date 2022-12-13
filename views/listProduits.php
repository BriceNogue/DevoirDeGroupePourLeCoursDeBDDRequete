<html>
    <head><title>list fournisseur</title>
    </head>
    <body>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">List produits</h5>
              <!-- Table with stripped rows -->
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

            include("connexionDB.php");

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
            }
            ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
    </body>
</html>