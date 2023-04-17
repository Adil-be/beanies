<?php
if (!isset($_SESSION['cart'])){
    $_SESSION['cart']=[];
    
}

if (isset($_GET['action'])){
    $action =$_GET['action'];
    if($action == "delete"){
        unset($_SESSION['cart']);
    }
}

if(isset($_GET['id']) && isset($_GET['action'])){
    
    $id=$_GET['id'];
 
    if( array_key_exists($id,$beaniesTab)){
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
                $beanie = $beaniesTab[$id];
                $Montant=$data*$beanie['prix'];
                $Montant=number_format( $Montant,2);
                $total+= $Montant;
                ?>
                <tr>
                    <td><?= $id?></td>
                    <td><?= $beanie['name']?></td>
                    <td><?= $beanie['prix']?>€</td>
                    <td><?= $data?></td>
                    <td> <a href="?page=cart&id=<?= $id?>&action=add" class="btn btn-success">add</a> <a href="?page=cart&id=<?= $id?>&action=remove" class="btn btn-danger">remove</a></td>
                    <td><?= number_format($Montant,2)?> €</td>
                </tr>
            <?php
            }
            ?>
                <tr><td colspan="5">Total a payer</td><td><?php echo $total ?>€</td></tr>
            </table>
            <a class="btn btn-warning" href="?page=cart&action=delete"> vider le panier</a>
        <?php
    }
    ?>
</section>

