<?php
    include("../connexionDB.php");
    $category=$_GET["category"];
    $essai="SELECT quantite,stockInitProduit, stockFinalProduit, nomFournisseur ,prix
    FROM livraison l,fournisseur f,produit p 
    WHERE l.idFournisseur=f.idFournisseur 
    AND l.idProduit=p.idProduit
    AND p.idCategorie=$category ORDER BY p.reference ";
    
    $query_selectlistform="SELECT DISTINCT idProduit,reference,prix FROM produit WHERE idCategorie=$category ORDER BY reference";
    $res=mysqli_query($con,$query_selectlistform);
    $i=0;
    $val=0;
    $tableaulivraison="";
    while($row=mysqli_fetch_array($res))
    {        
        $idProduit=$row["idProduit"];    
        $tableaulivraison.=  '<tr><td>'.$i.'</td>
                            <td><input type="checkbox" id="check'.$idProduit.'" name="check'.$idProduit.'" onclick="activeSaisie('.$idProduit.');"></td>
                            <td>'.$row["reference"].'</td>
                            <td><input type="text" name="stockInitProduit'.$idProduit.'" id="stockInitProduit'.$idProduit.'" value="1" readOnly/></td>
                            <td><input type="number" name="quantite'.$idProduit.'" id="quantite'.$idProduit.'" value="0" onChange="changeValue('.$idProduit.');" disabled/></td>
                            <td><input type="text" name="stockFinalProduit'.$idProduit.'" id="stockFinalProduit'.$idProduit.'" value="1" readOnly/></td>
                            <td><input type="text" name="price'.$idProduit.'" id="price'.$idProduit.'" value="'.$row["prix"].'"/></td>
                            <td><input type="text" name="total'.$idProduit.'" id="total'.$idProduit.'" value="'.$val.'" readonly/></td></tr>
                            ';  
                            $i++;                                                     
    }
    echo $tableaulivraison;                           
?>
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript">
   function checked1(idProduit){
        $(document).ready(function () {
        $("#check"+idProduit).change(function () { 
            $("#quantite"+idProduit).attr("disabled", $(this).attr("checked"));
        });
    });
   }       
    function changeValue(idProduit) {              
        var quantite=document.getElementById("quantite"+idProduit).value;
        var prixUnit=document.getElementById("price"+idProduit).value;
        if(quantite != "" && prixUnit != "" ) { 
           var totalPrice= parseInt(quantite) * parseInt(prixUnit);
           document.getElementById("total"+idProduit).value = totalPrice;   
    }}; 
    function activeSaisie(idproduit){
        var text = document.querySelector("#quantite"+idproduit);
        if(text.disabled == true){
            text.disabled=false;
        }
        else{
            text.disabled=true;
        } 
    }
</script>