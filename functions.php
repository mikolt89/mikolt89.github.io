<?php
  function loadUsers($path) {
    $users = [];
    $file = fopen($path, "r");
    if ($file === FALSE)
      die("HIBA: Nem sikerült a fájl megnyitása!");

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
      die("HIBA: Nem sikerült a fájl megnyitása!");

    foreach($users as $user) {
      $serialized_user = serialize($user);
      fwrite($file, $serialized_user . "\n"); 
    }

    fclose($file);
  }

  //Értékelés
  function loadData($path) {
    $file = fopen($path, "r");
    if ($file === FALSE)
      die("HIBA: Nem sikerült a fájl megnyitása!");
    $data = fgets($file);

    fclose($file);
    return $data;
  }

  function saveData($path, $data) {
    $file = fopen($path, "w");
    if ($file === FALSE)
      die("HIBA: Nem sikerült a fájl megnyitása!");
    fwrite($file, $data);

    fclose($file);   
  }

  function rangeSite(){
    $rangesum=loadData("sum.txt");
    $rangecount=loadData("count.txt");
        if (isset($_GET['range'])) {
      $rangecount++;    
      $rangesum+=$_GET['range'];
      $average=$rangesum/$rangecount;             
  }   
  
  echo "<h4>Felhasználóink értékelésének átlaga: ".((float)((int)($average*10))/10);
  saveData("sum.txt", $rangesum);
  saveData("count.txt", $rangecount);
   
  }
?>