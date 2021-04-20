<?php 
include_once "users.php";
session_start();
$file = fopen("users.txt", "a+");
$_SESSION["registeredUsers"] = [];
while(($line = fgets($file)) !== false){
    $sor = unserialize($line);
    $newUser = new User ($sor["name"], $sor["nickname"],$sor["email"],$sor["password"]);
    array_push($_SESSION["registeredUsers"], $newUser);
}
fclose($file);
?>
