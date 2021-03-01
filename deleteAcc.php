<?php
  $accountFile = 'accounts.json';
  
  if(file_exists($accountFile)){
    $accounts = json_decode(file_get_contents($accountFile),true);
  }

// Array search? 

$userID = $_POST['userID'];
_d($userID);
if ($accounts[$userID]['accbalance'] > 0) {
  header("Location: index.php?delete=" . urlencode('fail'));
  exit;
} else {
  unset($accounts[$userID]);
  $accToString = json_encode($accounts);
  file_put_contents($accountFile, $accToString);
  header("Location: index.php?delete=" . urlencode('success'));
  exit;
}
?>