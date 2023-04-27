<section class="container">
  <div class="row justify-content-around my-5">
    <?php foreach ($beanies as $beanie) {

      ?>
      <div class="card" style="width: 18rem;">
        <img src=<?= $beanie->getPath() ?> class="card-img-top" alt=<?= $beanie->getName() ?>>
        <div class="card-body">
          <h5 class="card-title">
            <?= $beanie->getName() ?>
          </h5>
          <p class="card-text">
            <?= $beanie->getDescription() ?>
          </p>
          <a href="?page=cart&id=<?= $beanie->getId() ?>&action=add" class="btn btn-primary">Ajouter au panier</a>
        </div>
      </div>
      <?php
    } ?>
  </div>
  <div class="text-center my-5"><a class="btn btn-primary" href="?page=list"> Voir tous les articles</a></div>
</section>