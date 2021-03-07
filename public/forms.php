<?php
require_once __DIR__.'/../bootstrap.php';
require_once DIR.'/accFile.php';
checkIfLoggedIn();

if (isset($_GET['userID']) && $_SESSION['login'] === 1) {
    foreach ($accUsers as $key => $user) {
      if ($user['id'] == $_GET['userID']) {
        $userFirstName = $user['firstname'];
        $userLastName = $user['lastname'];
        $accBalance = $user['accbalance'];
      }
    }
  } else {
    header("Location: ".URL);
    exit;
  }
?>

<h1>Account: <?= $userFirstName . ' ' . $userLastName ?>!</h1>
<form action="?userID=<?= $_GET['userID'] ?>" method="post">
  <div class="form-group">
    <label>First name</label>
    <input type="text" readonly class="form-control" placeholder="<?= $userFirstName ?>">
  </div>
  <div class="form-group">
    <label>Last name</label>
    <input type="text" readonly class="form-control" placeholder="<?= $userLastName ?>">
  </div>
  <div class="form-group">
    <?php if (basename($_SERVER['PHP_SELF']) != 'withdraw.php') : ?>
      <label>Amount to add:</label>
    <?php else : ?>
      <label>Amount to withdraw:</label>
    <?php endif; ?>
    <input type="number" class="form-control" name='mnyAmnt'>
  </div>
  <div class="form-group row">
    <label for="accountBalance" class="col-sm-2 col-form-label">Account balance</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" value="<?= $accBalance ?> $">
    </div>
  </div>
    <?php if (basename($_SERVER['PHP_SELF']) != 'withdraw.php') : ?>
      <button type="submit" class="btn btn-primary">Add money</button>
    <?php else : ?>
      <button type="submit" class="btn btn-primary">Withdraw</button>
    <?php endif; ?>
    <a href='<?= URL ?>' class="btn btn-secondary">Back</a>
</form>