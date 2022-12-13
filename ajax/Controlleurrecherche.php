<?php
                include("connexionDB.php");

                $iddate = "2022-04-29";
                $idfami = "";
                $query_selectListFilterquery = "SELECT * from livraison l JOIN fournisseur f ON f.idFournisseur = l.idFournisseur JOIN  produit p on l.idProduit = p.idProduit 
                JOIN categorieproduit cp on cp.idCategorie = p.idCategorie
                JOIN familleproduit fp on fp.idFamille = cp.idFamille
                WHERE l.dateLivraison = '$iddate'
                AND f.idFournisseur = 2
                AND fp.idfamille = $idfami" ;
                
                $datesList = "SELECT DISTINCT dateLivraison FROM LIVRAISON " ;
                $res_datesList = mysqli_query($con, $datesList);
                $i = 1;
                while($row = mysqli_fetch_array($res_datesList))
                {
                echo "<tr>";
                $_d = $row["dateLivraison"];
                echo "<td rowspan = \"".getSpans($_d)."\">".$i."</td>";
                echo "<td rowspan=\"".getSpans($_d)."\">".$row["dateLivraison"]."</td>";
                
                $fournisseurCount = "SELECT DISTINCT f.nomFournisseur, f.idFournisseur FROM livraison l JOIN fournisseur f ON f.idFournisseur = l.idFournisseur WHERE l.dateLivraison = '".$_d."'";
                $res_fournisseurCount = mysqli_query($con, $fournisseurCount);
                while($col2 = mysqli_fetch_array($res_fournisseurCount))
                { 
                    $__idf = $col2["idFournisseur"];
                    echo "<td  rowspan=\"".getDeliveries($_d,$__idf)."\">".$col2["nomFournisseur"]."</td>";
                    $deliverCount = "SELECT * FROM livraison l JOIN fournisseur f ON f.idFournisseur = l.idFournisseur JOIN  produit p on l.idProduit = p.idProduit  WHERE l.dateLivraison = '".$_d."' AND f.idFournisseur =".$col2["idFournisseur"];
                    $res_deliverCount = mysqli_query($con, $deliverCount);
                    while($col3 = mysqli_fetch_array($res_deliverCount))
                    {
                    echo "<td>\t".$col3["reference"]."</td>";
                    echo "<td>".$col3["quantite"]."</td>";
                    echo "<td>\t".$col3["stockInitProduit"]."</td>";
                    echo "<td>\t".$col3["stockFinalProduit"]."</td>";
                    echo "<td>\t".$col3["prix"]."</td>";
                    echo "<td>\t".$col3["Total"]."</td>";
                    echo "</tr>";
                    }
                }
                $i++;
                echo "</tr>";
                }
                function getSpans( $var = " ") 
                {$ret ="";
                    include("connexionDB.php");
                    $querySelectInital ="SELECT  COUNT(l.idProduit) AS Num FROM LIVRAISON l JOIN fournisseur f ON f.idFournisseur = l.idFournisseur WHERE l.dateLivraison = '".$var."' ";
                    $res = mysqli_query($con, $querySelectInital);
                    while($row = mysqli_fetch_array($res))
                    {
                        $ret = $row["Num"];
                    }
                    return $ret;
                }
                function getDeliveries( $var = " ", $idf = " ") 
                {$ret ="";
                    include("connexionDB.php");
                    $querySelectInital ="SELECT  COUNT(l.idProduit) AS Num FROM LIVRAISON l JOIN fournisseur f ON f.idFournisseur = l.idFournisseur WHERE l.dateLivraison = '".$var."' AND f.idFournisseur =".$idf."";
                    $res = mysqli_query($con, $querySelectInital);
                    while($row = mysqli_fetch_array($res))
                    {
                        $ret = $row["Num"];
                    }
                    return $ret;
                }
?>