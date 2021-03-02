<?php require_once './accFile.php'?>
<?php require_once __DIR__.'/header.php';?>
<?php require_once "./forms.php" ?>

<?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['mnyAmnt']) && isset($_SESSION['userID'])) {
        $userID = $_SESSION['userID'];
  
        $accUsers[$userID]['accbalance'] -= $_POST['mnyAmnt'];

        if ($accUsers[$userID]['accbalance'] <= 0) {
            $accUsers[$userID]['accbalance'] = 0;
            file_put_contents($accountFile,json_encode($accUsers));
            session_destroy();
            header("Location: ./index.php");
            die;
        }
        
        file_put_contents($accountFile,json_encode($accUsers));
        session_destroy();
        header("Location: ./index.php");
        exit;
  }
}

?>