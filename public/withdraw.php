<?php require_once __DIR__.'/../bootstrap.php';
checkIfLoggedIn();
require_once DIR.'/accFile.php';
require_once DIR.'/header.php';
require_once DIR."/forms.php";

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['mnyAmnt']) && isset($_GET['userID'])) {
      foreach ($accUsers as &$user) {
        if ($user['id'] == $_GET['userID']) {  
        $user['accbalance'] -= $_POST['mnyAmnt'];

        if ($user['accbalance'] <= 0) {
            $user['accbalance'] = 0;
            file_put_contents($accountFile,json_encode($accUsers));
            unset($_SESSION['suerID']);
            header("Location: ".URL);
            die;
        }
        file_put_contents($accountFile,json_encode($accUsers));
        unset($_SESSION['userID']);
        header("Location: ".URL);
        exit;
      }
    }
  }
}
?>