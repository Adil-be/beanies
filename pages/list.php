<?php

?>

<section class="container">
    <?php
    var_dump($_POST);
    $beanieFiltered = new BeanieFilter($_POST);
    $beanieFiltered->Filter($beaniesObj);
    var_dump($beanieFiltered);
    ?>
    <h1>Listes bonnets</h1>
    <form method="POST">
        <div class="my-3">
            <select name="material" id="material">
                <option value=""></option>
                <?php
                $matieres = Beanie::AVAILABLES_MATERIALS;
                $namePOST = 'material';
                foreach ($matieres as $matiere) {
                    displayFilters($matiere, $namePOST);
                }
                ?>
            </select>
            <select name="size" id="size">
                <option value=""></option>
                <?php
                $sizes = Beanie::AVAILABLES_SIZES;
                $namePOST = 'size';
                foreach ($sizes as $size) {
                    displayFilters($size, $namePOST);
                }
                ?>
            </select>

            <label for="minPrice">min</label>
            <input type="number" name="minPrice" value=<?= $beanieFiltered->getMinPrice() ?>>
            <label for="maxPrice">max</label>
            <input type="number" name="maxPrice" value=<?= $beanieFiltered->getMaxPrice() ?>>

            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
    <table>
        <tr>
            <th>nom</th>
            <th>prix HT</th>
            <th>prix TCC</th>
            <th>Sizes</th>
            <th>description</th>
        </tr>

        <?php

        foreach ($beanieFiltered->getFilteredBeanies() as $beanie) {
            afficherProduit($beanie);
        }
        ?>
    </table>
</section>