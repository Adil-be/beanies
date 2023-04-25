<?php
$cart = new Cart();
$isCartModified = $cart->handle($_GET);

if ($isCartModified) {
    header("Location: ?page=cart");
}


?>
<section class="container">
    <h1>Panier</h1>
    <?php
    if (empty($cart->getContent())) {
        echo "votre panier est vide";
    } else {
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
            $total = 0;
            $beanieFactory = new BeanieFactory();
            foreach ($cart->getContent() as $id => $data) {

                $sql = "SELECT * FROM beanies WHERE id=:id";
                $statement = $db->prepare($sql);
                $statement->bindValue(":id", $id, PDO::PARAM_INT);
                $success = $statement->execute();
                $result = $statement->fetchall();
                $beanie = $beanieFactory->create($result[0]);

                if (empty($beanie)) {
                    continue;
                }
                $Montant = $data * $beanie->getPrix();
                $Montant = number_format($Montant, 2);
                $total += $Montant;
                ?>
                <tr>
                    <td>
                        <?= $id ?>
                    </td>
                    <td>
                        <?= $beanie->getName() ?>
                    </td>
                    <td class="text-center">
                        <?= $beanie->getPrix() ?>€
                    </td>
                    <td class="text-center">
                        <a href="?page=cart&id=<?= $beanie->getId() ?>&action=remove"><i class="bi bi-dash"></i></a>
                        <?= $data ?>
                        <a href="?page=cart&id=<?= $beanie->getId() ?>&action=add"><i class="bi bi-plus"></i></a>
                    </td>
                    <td>
                        <a href="?page=cart&id=<?= $beanie->getId() ?>&action=delete" class="btn btn-danger">delete</a>
                    </td>
                    <td>
                        <?= $Montant ?> €
                    </td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <td colspan="5">Total a payer</td>
                <td>
                    <?= number_format($total, 2) ?>€
                </td>
            </tr>
        </table>
        <a class="btn btn-warning my-3" href="?page=cart&action=empty"> vider le panier</a>
        <?php
    }
    ?>
</section>