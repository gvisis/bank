<?php require_once __DIR__.'/../bootstrap.php'; checkIfLoggedIn(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bank ver. 1</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?= URL ?>/css/style.css">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <div class=" container-fluid">
      <a class="navbar-brand" href="#">ManTBank</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" href="<?= URL ?>">Home</a>
          <a class="nav-link btn btn-outline-success btn-sm" href="<?= URL ?>/newaccount.php">Create new Account</a>
          <a class="nav-link btn btn-outline-info btn-sm" href="<?= URL ?>/update.php">Edit account</a>
            <a href="<?= URL.'/../login/index.php?logout'?>" class="nav-link btn btn-outline-info btn-sm" href="#">Logout</a>
        </div>
      </div>
    </div>
  </nav>