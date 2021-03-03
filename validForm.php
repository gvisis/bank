<?php

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$accNumb = $_POST['accNumb'];
$personalID = $_POST['persid'];
$accbalance = 0;

$personIdExist = array_search($_POST['persid'],array_column($accUsers, 'persid'));

if (!$firstname) {
    $errors[] = "Please enter your first name";
} elseif (strlen($firstname) < 3) {
    $errors[] = "First name must be longer than 3 characters";
}

if (!$lastname) {
    $errors[] = "Please enter your last name";
} elseif (strlen($lastname) < 3) {
    $errors[] = "Last name must be longer than 3 characters";
}

if ($personalID) {
    if (!isPersonalIDValid($personalID, $accUsers)){
        $errors[] = $_SESSION['perr_msg'];
    }
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $accNumb = $_POST['accNumb'];
} else {
    $errors[] = "Please enter your personal ID number";
}

if (empty($errors)) {
    $_POST['accbalance'] = $accbalance;
    $_POST['id'] = getNextId();
    $accountsJSON= file_get_contents($accountFile);
    $accountsArr = json_decode($accountsJSON, true);
    $accountsArr[] = $_POST;

    file_put_contents($accountFile,json_encode($accountsArr));
    
    $_SESSION['msg'] = $_POST['firstname'] . " " . $_POST['lastname'] ." was succesffuly added to the list!";
    $_SESSION['msg_status'] = 1;

    header("Location: ./index.php");
    exit;
}
?>