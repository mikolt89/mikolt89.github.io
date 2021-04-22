<?php
include_once "functions.php";
$fiokok = array("name" => "uhuhuh", "nickname" => "xd","email" => "email@","password" => "password", "passwordcheck" => "passwordcheck");
foreach($fiokok as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
}
saveUsers("users.txt", $fiokok);
?>