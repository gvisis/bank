<?php require_once 'accFile.php'; 
//TODO: Needs checking of same IBANS

function randIban() {
  $countryCode = 'LT';
  $controlDigits = 12;
  $bankCode = null; // 5 digits
  $bankAccNumb = null; // 11 digits

  for ($i = 0; $i < 5; $i++){
    $bankCode .= rand(0,9); 
  }
  for ($i = 0; $i < 11; $i++){
    $bankAccNumb .= rand(0,9); 
  }
  return $countryCode . $controlDigits . $bankCode . $bankAccNumb;
}

function isPersonalIDValid($id, $accounts){
  $persIDregex = "/^[3-6](\d{2})(0[1-9]|1[012])(0[1-9]|[12]\d|3[01])\d{4}$/";
  $idInList = array_search($id,array_column($accounts, 'persid'));

  if (!preg_match($persIDregex,$id)){
    return 'Wrong personal ID format';
  } 

  if ($idInList){
    return 'User with the same personal ID already exists';
}
  return;
}

function getNextId() : int {
  if (!file_exists(DIR."indexes.json")) {
      $index = json_encode(['id' => 1]);
      file_put_contents(DIR.'indexes.json', $index);
  }
  $index = file_get_contents(DIR."indexes.json");
  $index = json_decode($index, true);
  $id = (int) $index['id'];
  $index['id'] = $id + 1;
  $index = json_encode($index);
  file_put_contents(DIR.'indexes.json', $index);
  return $id;
}

function isNameValid($name){

  $nameCheckPreg = '/[^a-zA-Z]|\W+/m';

  if (strlen($name) < 3 || strlen($name) > 40) {
    return "Min 3 characters and max 40 characters in name fields";
  } 

  if (preg_match($nameCheckPreg, $name)) {
    return 'No numbers or symbols allowed in the name/surname fields';
  }
  return;
}
?>

