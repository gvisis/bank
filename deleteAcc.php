<?php
require_once './accFile.php';
$userID = $_POST['userID'];

session_start();
$fullName = $accUsers[$userID]['firstname'] . ' ' .$accUsers[$userID]['lastname'];

if ($accUsers[$userID]['accbalance'] > 0) {
  $_SESSION['msg'] = "Cannot delete $fullName account. Account balance is not empty!";
  $_SESSION['msg_status'] = 0;
  header("Location: index.php");
  exit;
} else {
  $_SESSION['msg'] = "$fullName Account was succesfully deleted!";
  $_SESSION['msg_status'] = 1;
  unset($accUsers[$userID]);
  file_put_contents($accountFile, json_encode($accUsers));
  header("Location: index.php");
  exit;
}
?>