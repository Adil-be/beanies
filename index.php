<?php 
include_once 'include/header.php' ;

for ($i=0;$i<3; $i++){
    $beanie = $BeaniesTab[$i];
    ?>
    <div class="card" style="width: 18rem;">
    <img src= <?php echo $beanie['pathImg'] ?> class="card-img-top" alt= <?php echo $beanie['name'] ?>>
    <div class="card-body">
    <h5 class="card-title"> <?php echo $beanie['name'] ?></h5>
    <p class="card-text"> <?php echo $beanie['description'] ?></p>
    <a href="list.php" class="btn btn-primary">Voir tous les produits</a>
  </div>
</div>
<?php
}


include_once 'include/footer.php>'?>



