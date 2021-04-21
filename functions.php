<?php
  //9.gyakanyagból
  function loadUsers($path) {
    $users = [];
    $file = fopen($path, "r");
    if ($file === FALSE)
      die("HIBA: Nem sikerüt a fájl megnyitása!");

    while (($line = fgets($file)) !== FALSE) {
      $user = unserialize($line); 
      $users[] = $user;
    }

    fclose($file);
    return $users;
  }

  function saveUsers($path, $users) {
    $file = fopen($path, "w");
    if ($file === FALSE)
      die("HIBA: Nem sikerüt a fájl megnyitása!");

    foreach($users as $user) {
      $serialized_user = serialize($user);
      fwrite($file, $serialized_user . "\n"); 
    }

    fclose($file);
  }
?>