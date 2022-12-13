<?php
include("../connexionDB.php");

$category = $_GET["category"];

$category ="SELECT * FROM produit WHERE idCategorie=$category ORDER BY reference";
$res = mysqli_query($con, $category);

$listCategory="";
while($row = mysqli_fetch_array($res))
{
    $idproduit = $row["idProduit"]; 
    $val = 0;
    //Infor pour le produit xxxx
   /* $querySelectLivraison ="SELECT stockFinalProduit FROM livraison lv, produit pd WHERE lv.idProduit = pd.idProduit AND lv.idProduit =$idproduit";
$res4 = mysqli_query($con,  $querySelectLivraison);
$row2 = mysqli_fetch_array($res4);

if(count($row2) ==0){
    $val = 0;
}
else{
    $val = $row2["stockFinalProduit"];
}*/
//''''
   
    $listCategory.= '<tr><td><input type="checkbox" name="check'.$idproduit.'" class="check" value="checked" onclick="activeSaisie('.$idproduit.')"></td>
                            <td>'.$row["reference"].'</td>
                            <td><input type="text" size="10" class="form-control" value="'.$val.'" name="stockini'.$idproduit.'" id="stockini'.$idproduit.'" disabled/></td>
                            <td><input type="text" size="10" class="form-control" name="quantite'.$idproduit.'" class="inputQuantity" id="quantite'.$idproduit.'" disabled/></td>
                            <td><input type="text" size="10" class="form-control" name="stockfinal'.$idproduit.'" id="stockfinal'.$idproduit.'" value="'.$val.'" disabled/></td>
                            <td><input type="text" size="10" class="form-control" name="prixU'.$idproduit.'" id="prixU'.$idproduit.'" value="'.$row["prix"].'" disabled/></td>
                            <td><input type="text" class="form-control" name="prixT'.$idproduit.'" id="prixT'.$idproduit.'" disabled></td></tr>
                            ';
}
echo $listCategory;

?>