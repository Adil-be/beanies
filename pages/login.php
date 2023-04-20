<?php
$page->setTitle("Connection");


$error = [];
if (isset($_POST['login']) && $_POST['password']) {
  $userName = trim($_POST['login']);
  $password = trim($_POST['password']);

  if (empty($password)) {
    $error[] = "Mot de passe vide";
  } elseif ($password != $mdp) {
    $error[] = "Mot de passe erroné";
  }

  if (empty($userName)) {
    $error[] = "username vide";
  }
  if (empty($error)) {
    $_SESSION['login'] = $_POST['login'];
    header('Location: ?login=success');
  }
}

foreach ($error as $message) {
  ?>
  <div class="alert alert-danger" role="alert">
    <?= $message ?>
  </div>
  <?php
}

?>

<section class="contanier my-5">
  <form class="w-75 mx-auto p-5" style="background-color: #eee;" method="POST">
    <h1>formulaire connexion</h1>
    <div class="mb-3">
      <label for="login" class="form-label">Login</label>
      <input type="text" class="form-control" id="login" aria-describedby="emailHelp" name='login'>
    </div>
    <div class="mb-3">
      <label for="InputPassword" class="form-label">Password</label>
      <input type="password" class="form-control" id="InputPassword" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</section>