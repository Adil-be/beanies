<?php
if (!isset($_SESSION['cart'])){
    $_SESSION['cart']=[];
    
}

if (isset($_GET['action'])){
    $action =$_GET['action'];
    if($action == "empty"){
        unset($_SESSION['cart']);
    }
}

if(isset($_GET['id']) && isset($_GET['action'])){
    
    $id=$_GET['id'];
 
    if( idExist($beaniesObj,$id)){
        if (!isset($_SESSION['cart'][$id])){
            $_SESSION['cart'][$id] =0;      
        }
        switch ($action){
            case 'add':
                $_SESSION['cart'][$id]++;
                break;
            case 'remove':
                $_SESSION['cart'][$id]--;
                if($_SESSION['cart'][$id] <=0){
                    unset($_SESSION['cart'][$id]);
                }
                break;
            case 'delete':
                unset($_SESSION['cart'][$id]);
                break;
        }
    }  
}

?>
<section class="container">
<h1>Panier</h1>
    <?php
        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])){
            echo "votre panier est vide";
        }
        else
        {
            ?>
            <table>
                <tr>
                    <th>id</th>
                    <th>Nom</th>
                    <th>Prix unitaire</th>
                    <th>Quantity</th>
                    <th>Action</th> 
                    <th>total</th>
                </tr>
            <?php
            $total=0;
            foreach($_SESSION['cart'] as $id => $data){
                $beanie =getById($beaniesObj, $id);
                if(empty($beanie)){
                    continue;
                }
                $Montant=$data*$beanie->getPrix();
                $Montant=number_format( $Montant,2);
                $total+= $Montant;
                ?>
                <tr>
                    <td><?= $id?></td>
                    <td><?= $beanie->getName()?></td>
                    <td class="text-center"><?= $beanie->getPrix()?>€</td>
                    <td class="text-center">
                        <a href="?page=cart&id=<?= $beanie->getId()?>&action=remove"><i class="bi bi-dash"></i></a>
                        <?= $data?>
                        <a href="?page=cart&id=<?= $beanie->getId()?>&action=add"><i class="bi bi-plus"></i></a>
                    </td>
                    <td>
                        <a href="?page=cart&id=<?= $beanie->getId()?>&action=delete" class="btn btn-danger">delete</a></td>
                    <td><?= $Montant?> €</td>
                </tr>
            <?php
            }
            ?>
                <tr><td colspan="5">Total a payer</td><td><?= number_format($total,2) ?>€</td></tr>
            </table>
            <a class="btn btn-warning my-3" href="?page=cart&action=empty"> vider le panier</a>
        <?php
    }
    ?>
</section>

