<?php
require_once __DIR__.'/../bootstrap.php';
require_once DIR.'/accFile.php';
if ($_SERVER['REQUEST_METHOD'] === 'GET'){
  header("Location: ".URL);
  exit;
}

$userID = (int) $_GET['userID'];

foreach ($accUsers as $key => $user) {
  if ($user['id'] === $userID) {
    $fullName = $user['firstname'] . ' ' . $user['lastname'];
    if ($user['accbalance'] > 0) {
      $_SESSION['msg'] = "Cannot delete $fullName account. Account balance is not empty!";
      $_SESSION['msg_status'] = 0;
      header("Location: ".URL);
      exit;
    } else {
      $_SESSION['msg'] = "$fullName Account was succesfully deleted!";
      $_SESSION['msg_status'] = 1;
      unset($accUsers[$key]);
      file_put_contents($accountFile, json_encode($accUsers));
      header("Location: ".URL);
      exit;
    }
  } 
}
?>