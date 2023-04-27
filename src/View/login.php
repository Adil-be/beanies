<?php
foreach ($login->getErrors() as $message) {
  ?>
  <div class="alert alert-danger" role="alert">
    <?= $message ?>
  </div>
  <?php
}
?>

<section class="contanier my-5">
  <form action="?page=login" class="w-75 mx-auto p-5" style="background-color: #eee;" method="POST">
    <h1>formulaire connexion</h1>
    <div class="mb-3">
      <label for="login" class="form-label">Login</label>
      <input type="text" class="form-control" id="login" aria-describedby="emailHelp" name='login'
        value="<?= $login->getUsername() ?>">
    </div>
    <div class="mb-3">
      <label for="InputPassword" class="form-label">Password</label>
      <input type="password" class="form-control" id="InputPassword" name="password"
        value="<?= $login->getPassword() ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</section>