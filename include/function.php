<?php
function prixHT(float $prixTTC):float{

    return number_format($prixTTC/1.2,2,"."," ");
}


function afficherProduit($id, $produit){
    $prixTTC= number_format($produit['prix'],2,"."," ");
    $prixHT= prixHT($prixTTC);
    ($prixTTC<= 12)? $color = "green" : $color = "blue";

    $quantity=1;
    ?>
    <tr>
        <td><?php echo $produit['name']; ?> </td>
        <td><?php echo $prixHT;  ?>
        <td class = <?php echo $color  ?> >
        <?php echo $prixTTC."€"; ?> </td>
        <td><?php echo $produit['description'] ?> </td>
        <td> 
            <button type="button" class="btn btn-primary">
                <a class="btn btn-primary " tabindex="-1" role="button"  href="?page=cart&id=<?php echo $id?>&action=add">add to card</a>
            </button>
           
        </td>
    </tr>    
    <?php
}
?>