<!-- Forma resubmitinasi refreshinant -->

<?php 
require_once __DIR__.'/../bootstrap.php';
checkIfLoggedIn();
require_once DIR.'/header.php';
require_once DIR.'/accFile.php';
$accountFile = DIR.'/../src/data/accounts.json';
$firstname = "";
$lastname = "";
$accNumb = $_SESSION['accNumb'] ?? '';
$personalID = '';
$accbalance = 0;
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
  require_once DIR.'/validForm.php';

} else {
  $accNumb = randIban();
  $_SESSION['accNumb'] = $accNumb;
}
?>

<?php if(!empty($errors)) : ?>
  <div class="alert alert-danger" role="alert">
    <?php foreach ($errors as $error) : ?>
        <div><?= $error ?></div>
    <?php endforeach ;?>
  </div>  
<?php endif ;?>


<form action="" method="post">
  <div class="mb-3">
    <label class="form-label">First name</label>
    <input type="text" class="form-control" name='firstname' value="<?= ucfirst($firstname) ?>">
  </div>
  <div class="mb-3">
    <label class="form-label">Last name</label>
    <input type="text" class="form-control" name='lastname' value="<?= ucfirst($lastname) ?>">
  </div>
  <div class="mb-3">
    <label class="form-label">Account Number</label>
    <input type="text" readonly class="form-control" maxlength="35" name='accNumb' value="<?= $accNumb ?>">
  </div>
  <div class="mb-3">
    <label class="form-label">Personal ID number</label>
    <input type='text' maxlength="11" class="form-control" name='persid' value="<?= $personalID ?>">
    <div class="form-text">No more than 11 symbols</div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href='<?= URL ?>' class="btn btn-secondary">Back</a>
</form>