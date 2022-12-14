

<section class="section">

  <div class="row">

    <div class="col-md-5">
      <?php

      // Include the database configuration file  
      require_once 'connexionDB.php'; 

      // Get image data from database 
      $id = $_GET['productId'];
      $query_selectImg ="SELECT img, productId FROM products WHERE productId = $id";
      $result = mysqli_query($con, $query_selectImg);
      ?>

      <?php if($result->num_rows > 0){ ?>
      <div class="gallery row">
        <?php while($row = $result->fetch_assoc()){ ?> 
          <div class="card" style="margin: 10px;">
          <?php echo'<a href="./index.php?page=detail_produit&productId='?> <?php echo $row["productId"] ?> ">
              <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['img']); ?>" style="width: 100%; height: 100%; border-radius: 5px;" />
            </a>
            </div>
        <?php } ?> 
      </div>

      <div>
        <?php }else{ ?>
          <p class="status error">Image(s) not found...</p> 
        <?php } ?>
      </div> 
    </div>

    <div class="col-md-5">
      <div class="row">
        <div class="col-md-12">
          <h5 class="card-title">Details du produit</h5>
        </div>
        
        <?php

          include("connexionDB.php");

          $id = $_GET['productId'];

          $query_selectListfamille = "select * from products WHERE productId = $id";
          $res = mysqli_query($con, $query_selectListfamille);
          $i = 1;
          while($row = mysqli_fetch_array($res))
          {
            echo '<div class="card "><div class="card-body"><div><p>'.$i.'</p>';
            echo '<p>'/*.$row["productId"].*/,'</p>';
            echo '<p><span style="font-style: bolder;">Reference : <span>'.$row["reference"].'</p>';
            echo '<p><span style="font-style: bolder;">Nom : <span>'.$row["productName"].'</p>';
            echo '<p><span style="font-style: bolder;">Prix U : <span>'.$row["price"].'</p>';
            echo '<p><span style="font-style: bolder;">Quantité : <span>'.$row["qStock"].'</p>';
            echo '<div><span style="font-style: bolder;">Ajouté le : <span>'.$row["createdDate"].'</div></div></div>';
            $i++;
          } 
        ?>

      </div>
    </div>

  </div>
          
</section>