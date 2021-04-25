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

  function loadRange($path) {
    $ranges = [];
    $file = fopen($path, "r");
    if ($file === FALSE)
      die("HIBA: Nem sikerült a fájl megnyitása!");

    while (($line = fgets($file)) !== FALSE) {
      $range = unserialize($line); 
      $ranges[] = $range;
    }

    fclose($file);
    return $ranges;
  }

  function saveRange($path, $ranges) {
    $file = fopen($path, "w");
    if ($file === FALSE)
      die("HIBA: Nem sikerült a fájl megnyitása!");

    foreach($ranges as $range) {
      $serialized_range = serialize($ranges);
      fwrite($file, $serialized_range . "\n"); 
    }

    fclose($file);
  }

  function rangeSite(){
    $ranges=loadRange("range.txt");    
    $newrange=0;    
    if(isset($_GET['range'])){
      $newrange=$_GET['range'];             
  } 
  array_push($ranges, $newrange);
  $rangecount=count($ranges);
  $sum=0;
  foreach($ranges as $range){
    $sum+=(int)$range;
  }
  $average=$sum/$rangecount;
  saveRange("range.txt", $ranges);

  echo "<h4>Felhasználóink értékelésének átlaga: ".$average;
  
  }
?>