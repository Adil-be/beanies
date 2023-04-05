<?php
function prixHT(float $prixTTC):float{

    return number_format($prixTTC/1.2,2,"."," ");
}

function afficherProduit($produit){
    $prixTTC= number_format($produit['prix'],2,"."," ");
    $prixHT= prixHT($prixTTC);
    ($prixTTC<= 12)? $color = "green" : $color = "blue";
    ?>
    <tr>
        <td><?php echo $produit['name']; ?> </td>
        <td><?php echo $prixHT;  ?>
        <td class = <?php echo $color  ?> >
        <?php echo $prixTTC."€"; ?> </td>
        <td><?php echo $produit['description'] ?> </td>
    </tr>    
    <?php
}
?>