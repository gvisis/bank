<?php
require_once __DIR__.'/../bootstrap.php';
checkIfLoggedIn();
$firstname = ucfirst($_POST['firstname']) ?? '';
$lastname = ucfirst($_POST['lastname']) ?? '';
$accNumb = $_POST['accNumb'] ?? '';
$personalID = $_POST['persid'] ?? '';
$accbalance = 0;
$personIdExist = array_search($_POST['persid'],array_column($accUsers, 'persid'));

//TODO: Reduce to one function for first and last name validation? 

if (!$firstname) {
    $errors[] = "Please enter your first name";
} elseif (isNameValid($firstname)) {
    $errors[] = isNameValid($firstname);
} 

if (!$lastname) {
    $errors[] = "Please enter your last name";
} elseif (isNameValid($lastname)) {
    $errors[] = isNameValid($lastname);
} 

if ($personalID) {
    if (isPersonalIDValid($personalID, $accUsers)){
        $errors[] = isPersonalIDValid($personalID, $accUsers);
    }
    $firstname = ucfirst($_POST['firstname']);
    $lastname = ucfirst($_POST['lastname']);
    $accNumb = $_POST['accNumb'];
} else {
    $errors[] = "Please enter your personal ID number";
}

if (empty($errors)) {
    $_POST['accbalance'] = $accbalance;
    $_POST['id'] = getNextId();
    $_POST['lastname'] = ucfirst($_POST['lastname']); 
    $_POST['firstname'] = ucfirst($_POST['firstname']);
    $accountsJSON= file_get_contents($accountFile);
    $accountsArr = json_decode($accountsJSON, true);
    $accountsArr[] = $_POST;

    file_put_contents($accountFile,json_encode($accountsArr));
    
    $_SESSION['msg'] = ucfirst($_POST['firstname']) . " " . ucfirst($_POST['lastname']) ." was succesffuly added to the list!";
    $_SESSION['msg_status'] = 1;

    header("Location: ".URL);
    exit;
}
?>