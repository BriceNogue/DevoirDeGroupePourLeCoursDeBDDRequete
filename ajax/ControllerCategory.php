<?php

include("../connexionDB.php");

$family = $_GET["family"];

$querySelectListCategoryFamilly ="SELECT Distinct idCategorie, nomCategorie FROM categorieproduit WHERE idFamille = $family 
ORDER BY nomCategorie";
$res = mysqli_query($con, $querySelectListCategoryFamilly);

$listCategory="";
while($row = mysqli_fetch_array($res))
{
    $listCategory="<option value='".$row["idCategorie"]."'>".$row["nomCategorie"]."</option>";
}
echo $listCategory;

?>