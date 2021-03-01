<?php 

$firstname = '';
$lastname ='';
$accountid = '';
$personalid = '';
$accbalance = 5;
$accountFile = 'accounts.json';
require_once __DIR__.'/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {  

  $_POST['accbalance'] = $accbalance;
 
  $accountsJSON= file_get_contents($accountFile);
  $accountsArr = json_decode($accountsJSON, true);

  $accountsArr[] = $_POST;
  $writeNewAccount= json_encode($accountsArr);
  
  file_put_contents($accountFile,$writeNewAccount);
  
  // read
  // $read_data = file_get_contents('accounts.json');
  // $read_array = json_decode($read_data,true);
  // _d($read_array);

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
    <label class="form-label">Account ID</label>
    <input type="text" class="form-control" name='accountid'>
    <div class="form-text">No longer than 14 symbols</div>
  </div>
  <div class="mb-3">
    <label class="form-label">Personal ID number</label>
    <input type="number" min='0' class="form-control" name='persid'>
  </div>
  <button type="submit" class="btn btn-primary" name='addnew'>Submit</button>
  <a href='./index.php' class="btn btn-secondary">Back</a>
</form>