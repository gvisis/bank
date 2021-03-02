<?php
require_once './accFile.php';

// Array search? 

$userID = $_POST['userID'];

if ($accUsers[$userID]['accbalance'] > 0) {
  header("Location: index.php?delete=" . urlencode('fail'));
  exit;
} else {
  unset($accUsers[$userID]);
  $accToString = json_encode($accUsers);
  file_put_contents($accountFile, $accToString);
  header("Location: index.php?delete=" . urlencode('success'));
  exit;
}
?>