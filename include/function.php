<?php
function prixHT(float $prixTTC):float{

    return number_format($prixTTC/1.2,2,"."," ");
}

function afficherProduit($produit){
    $prixTTC= number_format($produit['prix'],2,"."," ");
    $prixHT= prixHT($prixTTC);
    ?>
    <tr>
        <td><?php echo $produit['name']; ?> </td>
        <td><?php echo $prixHT;  ?>
        <td class = <?php if($prixTTC<= 12) {echo 'green';}else{echo 'blue';}  ?> >
        <?php echo $prixTTC."€"; ?> </td>
        <td><?php echo $produit['description'] ?> </td>
    </tr>    
    <?php
}
?>