<?php
session_start();
require_once('autoload.php');
require_once('variable.php');
require_once('function.php');


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
  <title>
    <?php echo $title ?>
  </title>
</head>

<body class="">
  <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="?page=home">
        <img src="img/logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">Beanies
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="?page=home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=list">Produits</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=cart">Panier</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=contact">contact</a>
          </li>
        </ul>
        <div>
          <?php
          if (isset($_SESSION['login']) && !empty($_SESSION['login'])) {
            ?>
            <a href="?page=login" class="m-3">
              <?php echo $_SESSION['login'] ?>
            </a>
            <a class="btn btn-outline-success" href="?page=logout">
              logout
            </a>

            <?php
          } else {
            ?>
            <a class="btn btn-outline-success" href="?page=login">Login</a>
            <?php
          }
          ?>
        </div>

      </div>
    </div>
  </nav>

  <?php
  if (isset($_GET['login'])) {
    if ($_GET['login'] == 'success') {
      ?>
      <div class="alert alert-success" role="alert">
        Vous etes bien connecté!
      </div>
      <?php
    } else if ($_GET['login'] == 'disconnected') {
      ?>
        <div class="alert alert-danger" role="alert">
          Vous etes deconnecté!
        </div>

      <?php
    }
  }