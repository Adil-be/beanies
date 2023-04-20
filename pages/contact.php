<?php
$contact = new Contact($_POST);

if ($contact->isSubmitted() && $contact->isValid()) {

  $sql = "INSERT INTO contact (sujet, email, message)
  VALUES (:sujet, :email, :message)";

  $statement = $db->prepare($sql);



  $sujet = $contact->getSujet();
  $email = $contact->getEmail();
  $message = $contact->getMessage();

  $statement->bindParam(":sujet", $sujet, PDO::PARAM_STR);
  $statement->bindParam(":email", $email, PDO::PARAM_STR);
  $statement->bindParam(":message", $message, PDO::PARAM_STR);

  $statement->execute();

  ?>
  <div class="alert alert-success" role="alert">
    message envoyé!
  </div>
  <?php
} else {
  foreach ($contact->getErrors() as $error) {
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
      <input type="text" class="form-control" id="sujet" aria-describedby="emailSujet" name='sujet'
        value=<?= $contact->getSujet() ?>>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="text" class="form-control" id="email" name="email" value=<?= $contact->getEmail() ?>>
    </div>
    <div class="mb-3">
      <label for="message" class="form-label">Votre message</label>
      <textarea class="form-control" name="message" id="message" cols="100%"
        rows="10"><?= $contact->getMessage() ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

</section>