<?php
$errors = [];
$text = '';
$email = '';
$message = '';
if (isset($_POST['sujet'])) {
  $text = $_POST['sujet'];
  if (empty($text) || ctype_space($text)) {
    $errors[] = "sujet ne doit pas etre vide";
  }
}
if (isset($_POST['email'])) {
  $email = $_POST['email'];
  if (empty($email)) {
    $errors[] = "l'email ne doit pas etre vide";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "l'email doit etre au format test@test.test";
  }
}
if (isset($_POST['message'])) {
  $message = $_POST['message'];
  if (empty($message) || ctype_space($message)) {
    $errors[] = "le message ne doit pas etre vide";
  } elseif (strlen($message) < 15) {
    $errors[] = "le message trop court";
  }
}

if (empty($errors)) {
  ?>
  <div class="alert alert-success" role="alert">
    message envoyé!
  </div>
  <?php
} else {
  foreach ($errors as $error) {
    ?>
    <div class="alert alert-danger" role="alert">
      <?= $error ?>
    </div>
    <?php
  }
}
?>


<section>
  <form class="w-75 mx-auto p-5" style="background-color: #eee;" method="POST">
    <h1>formulaire de contact</h1>
    <div class="mb-3">
      <label for="sujet" class="form-label">Sujet</label>
      <input type="text" class="form-control" id="sujet" aria-describedby="emailSujet" name='sujet' value=<?= $text ?>>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="text" class="form-control" id="email" name="email" value=<?= $email ?>>
    </div>
    <div class="mb-3">
      <label for="message" class="form-label">Votre message</label>
      <textarea class="form-control" name="message" id="message" cols="100%" rows="10"><?= $message ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

</section>