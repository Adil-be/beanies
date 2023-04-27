<section class="container">
    <h1 class="text-center">Panier</h1>
    <?php
    if (empty($cartBeanies)) {
        ?>
        <div class="text-center">votre panier est vide"</div>
        <?php

    } else {
        ?>
        <table class="mx-auto">
            <tr>
                <th>id</th>
                <th>Nom</th>
                <th>Prix unitaire</th>
                <th>Quantity</th>
                <th>Action</th>
                <th>total</th>
            </tr>
            <?php
            foreach ($cartBeanies as $item) {
                $beanie = $item["beanie"];
                $quantity = $item["quantity"];

                ?>
                <tr>
                    <td>
                        <?= $beanie->getId() ?>
                    </td>
                    <td>
                        <?= $beanie->getName() ?>
                    </td>
                    <td class="text-center">
                        <?= $beanie->getPrix() ?>€
                    </td>
                    <td class="text-center">
                        <a href="?page=cart&id=<?= $beanie->getId() ?>&action=remove"><i class="bi bi-dash"></i></a>
                        <?= $quantity ?>
                        <a href="?page=cart&id=<?= $beanie->getId() ?>&action=add"><i class="bi bi-plus"></i></a>
                    </td>
                    <td>
                        <a href="?page=cart&id=<?= $beanie->getId() ?>&action=delete" class="btn btn-danger">delete</a>
                    </td>
                    <td>
                        <?= number_format($beanie->getPrix() * $quantity, 2) ?> €
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
        <div class="text-center"><a class="btn btn-warning my-3" href="?page=cart&action=empty"> vider le panier</a></div>
        <?php
    }
    ?>
</section>