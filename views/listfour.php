<html>
    <head><title>list fournisseur</title>
    </head>
    <body>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">List Fournisseurs</h5>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">N</th>
                    <th scope="col">Code</th>
                    <th scope="col">Nom</th>
                    <th scope="col">RaisonSocial</th>
                    <th scope="col">email</th>
                    <th scope="col">Telephone</th>
                  </tr>
                </thead>
                <tbody>              
            <?php

            include("connexionDB.php");

            $query_selectListFourn = "select * from fournisseur";
            $res = mysqli_query($con, $query_selectListFourn);


            $i = 1;

            while($row = mysqli_fetch_array($res))
            {
                echo " <tr><td>".$i."</td>";
                echo "<td>".$row["codeFournisseur"]."</td>";
                echo "<td>".$row["nomFournisseur"]."</td>";
                echo "<td>".$row["raisonSociale"]."</td>";
                echo "<td>".$row["email"]."</td>";
                echo "<td>".$row["telephone"]."</td></tr>";
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