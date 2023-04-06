<?php 
$title = 'Produits';
include 'include/header.php'; ?>
    <h1>Listes bonnets</h1>
    <table>
        <tr><th>nom</th><th>prix HT</th><th>prix TCC</th><th>description</th></tr>

    <?php 
    foreach($beaniesTab as $beanie){
        afficherProduit($beanie);
    }
    ?>
    </table>
<?php include 'include/footer.php';?>
