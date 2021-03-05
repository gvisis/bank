<?php require_once __DIR__.'/../bootstrap.php';
require_once DIR.'/accFile.php';
require_once DIR.'/header.php';
require_once DIR."/forms.php";

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['mnyAmnt']) && isset($_SESSION['userID'])) {
        $userID = $_SESSION['userID'];
  
        $accUsers[$userID]['accbalance'] -= $_POST['mnyAmnt'];

        if ($accUsers[$userID]['accbalance'] <= 0) {
            $accUsers[$userID]['accbalance'] = 0;
            file_put_contents($accountFile,json_encode($accUsers));
            session_destroy();
            header("Location: ".URL);
            die;
        }
        
        file_put_contents($accountFile,json_encode($accUsers));
        session_destroy();
        header("Location: ".URL);
        exit;
  }
}
?>