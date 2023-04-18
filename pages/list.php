<section class="container">
    <?php
    $minPrix = 0;
    $maxPrix = 100;

    $SearchResult = $beaniesObj;
    if (isset($_POST['material'])) {
        $material = $_POST['material'];
        if (!empty($material))
            $SearchResult = array_filter(
                $SearchResult,
                function ($object) use ($material) {
                    return in_array($material, $object->GetMaterials());
                }
            );
    }
    if (isset($_POST['sizes'])) {
        $sizes = $_POST['sizes'];
        if (!empty($sizes)) {
            $SearchResult = array_filter(
                $SearchResult,
                function ($object) use ($sizes) {
                    return in_array($sizes, $object->GetSizes());
                }
            );
        }

    }
    if (isset($_POST['minPrix']) && isset($_POST['maxPrix'])) {
        $min = $_POST['minPrix'];
        $max = $_POST['maxPrix'];
        $SearchResult = array_filter($SearchResult, function ($objet) use ($min, $max) {
            $prix = $objet->getPrix();
            return ($prix >= $min && $prix <= $max);
        });
    }

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
            <select name="sizes" id="size">
                <option value=""></option>
                <?php
                $sizes = Beanie::AVAILABLES_SIZES;
                $namePOST = 'sizes';
                foreach ($sizes as $size) {
                    displayFilters($size, $namePOST);
                }
                ?>
            </select>

            <label for="minPrix">min</label>
            <input type="number" name="minPrix" value=<?= $minPrix ?>>
            <label for="maxPrix">max</label>
            <input type="number" name="maxPrix" value=<?= $maxPrix ?>>

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

        foreach ($SearchResult as $beanie) {
            afficherProduit($beanie);
        }
        ?>
    </table>
</section>