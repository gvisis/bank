<?php 
  $accountFile = __DIR__.'/../src/data/accounts.json';
  if(!file_exists($accountFile)){
    $accUsers = json_encode([]);
    file_put_contents($accountFile, $accUsers);
  }
  $accounts = file_get_contents($accountFile);
  $accUsers = json_decode($accounts,true);
?>