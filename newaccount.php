<?php 
session_start();
$firstname = '';
$lastname ='';
$accountid = '';
$personalid = '';
$accbalance = 0;
$accountFile = __DIR__.'/accounts.json';
require_once __DIR__.'/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {  

  $_POST['accbalance'] = $accbalance;
  
  // pasiimam is failo
  $accountsJSON= file_get_contents($accountFile);
  // atkodinam kaip array
  $accountsArr = json_decode($accountsJSON, true);
  // ikeliam visa post i iskoduota array
  $accountsArr[uniqid()] = $_POST;

  // uzkoduojam is naujo array
  $writeNewAccount= json_encode($accountsArr);
  
  // idedam vel i faila
  $_SESSION['msg'] = $_POST['firstname'] . " " . $_POST['lastname'] ." was succesffuly added to the list!";
  $_SESSION['msg_status'] = 1;
  file_put_contents($accountFile,$writeNewAccount);
   header("Location: ./index.php");
   exit;
}
?>

<form action="" method="post">
  <div class="mb-3">
    <label class="form-label">First name</label>
    <input type="text" class="form-control" name='firstname'>
  </div>
  <div class="mb-3">
    <label class="form-label">Last name</label>
    <input type="text" class="form-control" name='lastname'>
  </div>
  <div class="mb-3">
    <label class="form-label">Account Number</label>
    <input type="text" class="form-control" maxlength="35" name='accountid'>
  </div>
  <div class="mb-3">
    <label class="form-label">Personal ID number</label>
    <input type='text' maxlength="11" class="form-control" name='persid'>
    <div class="form-text">No more than 11 symbols</div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href='./index.php' class="btn btn-secondary">Back</a>
</form>