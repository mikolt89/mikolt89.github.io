<?php
$name = "Csongor1ty";
$nickname = "fasz";
$email = "anyad@gmail.com";
$password = "fasza";
$passwordcheck = "fasza";
include_once "functions.php";
$fiokok = array($name => "name", "$nickname" => "nickname","email" => "email","password" => "password", "passwordcheck" => "passwordcheck");
foreach($fiokok as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
  }
saveUsers("users.txt", $fiokok);
?>