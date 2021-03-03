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
    if ($personIdExist){
        $errors[] = 'User with the same personal ID already exists';
        $_SESSION['msg_status'] = 0;
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $accNumb = $_POST['accNumb'];
    }
} else {
    $errors[] = "Please enter your personal ID number";
}

if (empty($errors)) {
    $_POST['accbalance'] = $accbalance;

    $accountsJSON= file_get_contents($accountFile);
    $accountsArr = json_decode($accountsJSON, true);
    $accountsArr[uniqid()] = $_POST;
    $writeNewAccount= json_encode($accountsArr);

    file_put_contents($accountFile,$writeNewAccount);
    
    $_SESSION['msg'] = $_POST['firstname'] . " " . $_POST['lastname'] ." was succesffuly added to the list!";
    $_SESSION['msg_status'] = 1;

    header("Location: ./index.php");
    exit;
}
?>