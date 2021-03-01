<?php
require_once './accFile.php';

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