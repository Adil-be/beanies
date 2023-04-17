<?php
function prixHT(float $prixTTC):float{

    return number_format($prixTTC/1.2,2,"."," ");
}


function afficherProduit( $produit){
    var_dump($produit);
    $prixTTC=$produit->getPrix();
    $prixTTC= number_format($prixTTC,2,"."," ");
    $prixHT= prixHT($prixTTC);
    ($prixTTC<= 12)? $color = "green" : $color = "blue";

    $quantity=1;
    ?>
    <tr>
        <td><?= $produit->getName(); ?> </td>
        <td><?= $prixHT;  ?>
        <td class = <?= $color  ?> >
        <?php echo $prixTTC."€"; ?> </td>
        <td><?= $produit->getDescription() ?> </td>
        <td> 
            <button type="button" class="btn btn-primary">
                <a class="btn btn-primary " tabindex="-1" role="button"  href="?page=cart&id=<?=$produit->getId()?>&action=add">add to card</a>
            </button>
           
        </td>
    </tr>    
    <?php
}


function getById(array $Beanies, ?int $id){
    foreach($Beanies as $Beanie){
        if($Beanie->getId() == $id){
            return $Beanie;
        }
    }
    return NULL;
}

function idExist(array $Beanies, ?int $id){
    foreach($Beanies as $Beanie){
        if($Beanie->getId()==$id){
            return true;
        }
    }
    return false;
}


?>