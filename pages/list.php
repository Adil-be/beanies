
    <h1>Listes bonnets</h1>
    <table>
        <tr><th>nom</th><th>prix HT</th><th>prix TCC</th><th>description</th></tr>

    <?php 

    foreach($beaniesTab as $key => $beanie){
        afficherProduit($key, $beanie);
     
    }

    ?>
    </table>
