<?php require_once './accFile.php'; ?>
<?php

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
?>