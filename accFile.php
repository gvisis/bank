<?php 
  $accountFile = './accounts.json';
  
  if(file_exists($accountFile)){
    $accounts = file_get_contents($accountFile);
    $accUsers = json_decode($accounts,true);
  }
?>