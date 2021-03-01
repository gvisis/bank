<?php 
require_once './accFile.php';
  
  $userFirstName = $accUsers[$_GET['userID']]['firstname'];
  $userLastName = $accUsers[$_GET['userID']]['lastname'];
  $accBalance = $accUsers[$_GET['userID']]['accbalance'];

?>

<h1>Sveiki, <?= $userFirstName . ' ' . $userLastName ?>!</h1>
<form>
  <div class="form-group">
    <label for="formGroupExampleInput">First name</label>
    <input type="text" readonly class="form-control" placeholder="<?= $userFirstName ?>">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">Last name</label>
    <input type="text" readonly class="form-control" placeholder="<?= $userLastName ?>">
  </div>
  <div class="form-group">
    <?php if (basename($_SERVER['PHP_SELF']) != 'withdraw.php') : ?>
    <label for="formGroupExampleInput">Amount to add:</label>
    <?php else : ?>
    <label for="formGroupExampleInput">Amount to withdraw:</label>
    <?php endif; ?>
    <input type="number" class="form-control">
  </div>
  <div class="form-group row">
    <label for="accountBalance" class="col-sm-2 col-form-label">Account balance</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" value="<?= $accBalance ?> $">
    </div>
  </div>
  <?php if (basename($_SERVER['PHP_SELF']) != 'withdraw.php') : ?>
  <button type=" submit" class="btn btn-primary">Add money</button>
  <?php else : ?>
  <button type="submit" class="btn btn-primary">Withdraw</button>
  <?php endif; ?>
  <a href='./index.php' class="btn btn-secondary">Back</a>
</form>