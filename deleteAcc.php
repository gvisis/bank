<?php
  $accountFile = 'accounts.json';
  
  if(file_exists($accountFile)){
    $accounts = json_decode(file_get_contents($accountFile),true);
  }

$userID = $_POST['userID'];

unset($accounts['users'][$userID]);
$accToString = json_encode($accounts);
file_put_contents($accountFile, $accToString);

header("Location: ./index.php");
exit;

?>