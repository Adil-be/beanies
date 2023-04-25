<?php

require_once "include/config.inc.php";
function prixHT(float $prixTTC)
{
    return number_format($prixTTC / 1.2, 2, ".", " ");
}


function afficherProduit($produit)
{
    $prixTTC = $produit->getPrix();
    $prixTTC = number_format($prixTTC, 2, ".", " ");
    $prixHT = prixHT($prixTTC);
    ($prixTTC <= 12) ? $color = "green" : $color = "blue";

    ?>
    <tr>
        <td>
            <?= $produit->getName(); ?>
        </td>
        <td>
            <?= $prixHT; ?>
        <td class=<?= $color ?>>
            <?php echo $prixTTC . "€"; ?> </td>
        <td>
            <?php $sizes = $produit->GetSizes();

            foreach ($sizes as $size) {
                echo $size . " ";
            }
            ?>
        </td>
        <td>
            <?= $produit->getDescription() ?>
        </td>
        <td>
            <button type="button" class="btn btn-primary">
                <a class="btn btn-primary " tabindex="-1" role="button"
                    href="?page=cart&id=<?= $produit->getId() ?>&action=add">add to card</a>
            </button>

        </td>
    </tr>
    <?php
}


function getById(?int $id)
{
    $sql = "SELECT * FROM beanies WHERE id = :id";
    $statement = $db->prepare($sql);
    $statement->bindValue(":id", $id, PDO::PARAM_INT);
    $result = $statement->fetchall();
    $beanieFactory = new BeanieFactory();
    $beanie = $beanieFactory->create($result);

    return $beanie;

}

function idExist(array $Beanies, ?int $id)
{
    foreach ($Beanies as $Beanie) {
        if ($Beanie->getId() == $id) {
            return true;
        }
    }
    return false;
}

function displayFilters($filter, $namePOST)
{
    ?>
    <option value=<?= $filter ?>     <?php if (isset($_POST[$namePOST]) && ($_POST[$namePOST] == $filter)) {
               echo "selected='selected'";
           } ?>>
        <?= $filter ?>
    </option>
    <?php
}

?>