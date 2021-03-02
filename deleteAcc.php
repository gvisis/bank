<?php
require_once './accFile.php';
$userID = $_POST['userID'];

session_start();
if ($accUsers[$userID]['accbalance'] > 0) {
  $fullName = $accUsers[$userID]['firstname'] . ' ' .$accUsers[$userID]['lastname'];
  $_SESSION['msg'] = "Could not delete $fullName account because the bank balance is not empty!";
  $_SESSION['status_msg'] = 0;
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