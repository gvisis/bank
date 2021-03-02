<!-- Forma resubmitinasi refreshinant -->

<?php 
require_once __DIR__.'/header.php';
require __DIR__.'/accFile.php';
session_start();

// raidinis šalies kodas	LT
// 2 kontroliniai skaitmenys (automatiškai priskiria bankas)	XX
// 5 skaitmenų banko kodas	XXXXX
// 11 skaitmenų senasis sąskaitos numeris	XXXXXXXXXXX

function randIban() {
  $countryCode = 'LT';
  $controlDigits = 12;
  $bankCode = null; // 5 digits
  $bankAccNumb = null; // 11 digits

  for ($i = 0; $i < 5; $i++){
    $bankCode .= rand(0,9); 
  }
  for ($i = 0; $i < 11; $i++){
    $bankAccNumb .= rand(0,9); 
  }
  return $countryCode . $controlDigits . $bankCode . $bankAccNumb;
}

$accountFile = __DIR__.'/accounts.json';
$firstname = "";
$lastname = "";
$accNumb = $_SESSION['accNumb'] ?? '';
$personalID = '';
$accbalance = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
  $personIdExist = array_search($_POST['persid'],array_column($accUsers, 'persid'));
  
  if ($personIdExist){
    $_SESSION['msg'] = 'User with the same personal ID already exists';
    $_SESSION['msg_status'] = 0;
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $accNumb = $_POST['accNumb'];
    
  } else {
    $_POST['accbalance'] = $accbalance;

    // pasiimam is failo
    $accountsJSON= file_get_contents($accountFile);
    // atkodinam kaip array
    $accountsArr = json_decode($accountsJSON, true);
    // ikeliam visa post i iskoduota array
    $accountsArr[uniqid()] = $_POST;

    // uzkoduojam is naujo array
    $writeNewAccount= json_encode($accountsArr);
    
    $_SESSION['msg'] = $_POST['firstname'] . " " . $_POST['lastname'] ." was succesffuly added to the list!";
    $_SESSION['msg_status'] = 1;
    
    // idedam vel i faila
    file_put_contents($accountFile,$writeNewAccount);
    header("Location: ./index.php");
    exit;
  }
} else {
  $accNumb = randIban();
  $_SESSION['accNumb'] = $accNumb;
}
?>

<?php if (isset($_SESSION['msg_status']) && $_SESSION['msg_status'] === 0) : ?>
  <div class="alert alert-<?= ($_SESSION['msg_status']) == 0 ? 'danger' : 'success'?>" role="alert">
    <?= $_SESSION['msg'];?>
  </div>  
<?php endif; ?>

<form action="" method="post">
  <div class="mb-3">
    <label class="form-label">First name</label>
    <input type="text" class="form-control" name='firstname' value="<?= $firstname ?>">
  </div>
  <div class="mb-3">
    <label class="form-label">Last name</label>
    <input type="text" class="form-control" name='lastname' value="<?= $lastname ?>">
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
  <a href='./index.php' class="btn btn-secondary">Back</a>
</form>