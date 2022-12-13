<?php
    include("../connexionDB.php");
    $familly=$_GET["family"];
    $querySelectListCategoryFamilly="SELECT DISTINCT idCategorie, nomCategorie 
    FROM categorieproduit 
    WHERE idFamille=$familly ORDER BY nomCategorie";
    $res = mysqli_query($con, $querySelectListCategoryFamilly);

    $listcategory="<option value='-1'>selectionnez une categorie</option>";
    while($row=mysqli_fetch_array($res))
    {
        $listcategory.="<option value='".$row["idCategorie"]."'>".$row["nomCategorie"]."</option>";
    }
    echo $listcategory;
?>