<?php 
require_once __DIR__.'/../bootstrap.php';
checkIfLoggedIn();
require_once DIR.'/header.php';
require_once DIR.'/accFile.php';

$userFirstName = 'vardas';
$userLastName = 'pavardas';
?>

<h1>Account: <?= $userFirstName . ' ' . $userLastName ?>!</h1>
<form action="" method="post">
<select class="form-select">
  <option selected>Open to select user</option>
  <?php foreach($accUsers as $user) : ?>
    <option name="<?= $user['id']?>"><?= $user['firstname'] . ' ' . $user['lastname'] ?></option>
  <?php endforeach ;?>
</select>
  <div class="form-group">
    <label>First name</label>
    <input type="text" class="form-control" values="<?= $userFirstName ?>">
  </div>
  <div class="form-group">
    <label>Last name</label>
    <input type="text" class="form-control" values="<?= $userLastName ?>">
  </div>
  <div class="form-group">
    <label>Account number</label>
    <input type="text" class="form-control" values="<?= $accNumb ?>">
  </div>
  <div class="form-group">
    <label>Personal ID</label>
    <input type="text" class="form-control" values="<?= $persid ?>">
  </div>
  <div class="form-group">
    <label>Account Balance</label>
    <input type="text" class="form-control" values="<?= $accBalance ?>">
  </div>
  <button type="submit" class="btn btn-primary">Update Account</button>
  <a href='<?= URL ?>' class="btn btn-secondary">Back</a>
</form>