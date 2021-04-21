<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameErr = "Név megadása kötelező";
    }else {
      $name = test_input($_POST["name"]);
      if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        $nameErr = "Csak betűkből állhat a neved";
    }}
  
    if (empty($_POST["nickname"])) {
      $nicknameErr = "Nicknév megadása kötelező";
    } else {
      $nickname = test_input($_POST["nickname"]);
      if (!preg_match("/^[a-z-' ]*$/",$name)) {
        $nameErr = "Csak kisbetűkből állhat a nickneved";
    }}
  
    if (empty($_POST["email"])) {
      $emailErr = "Email megadása kötelező";
    }else{
      $email = test_input($_POST["email"]);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Érvénytelen email formátum";}
    }
  
    if (empty($_POST["password"])) {
      $passwordErr = "Jelszó megadása kötelező";
    } else {
      $password = test_input($_POST["password"]);
    }
  
    if (empty($_POST["passwordcheck"])) {
        $passwordcheckErr = "Jelszó ismételt megadása kötelező";
    }else{
        $password = test_input($_POST["password"]);
        if ($_POST["passwordcheck"]!=$password){
            $passwordcheckErr = "A jelszavak nem egyeznek!";
        }
    }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
}
  


#KÉPFELTÖLTÉS#
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["imgToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["imgToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "A kép túl nagy." . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "Nem képet töltöttél fel.";
    $uploadOk = 0;
  }
}
?>