
<section class="container">
    <h1>Listes bonnets</h1>
    <table>
        <tr><th>nom</th><th>prix HT</th><th>prix TCC</th><th>description</th></tr>

    <?php 

    foreach($beaniesObj as $beanie){
        afficherProduit($beanie);
     
    }
    ?>
    </table>
</section>