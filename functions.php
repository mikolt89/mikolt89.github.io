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
    //$ranges=[];
    //$rangesum=0;
    //$rangecount=0;
    $rangesum=(int)$ranges[0];
    $rangecount=(int)$ranges[1];
    //array_push($ranges, $rangesum, $rangecount);
    if (isset($_GET['range'])) {
      $rangecount=$rangecount+1;    
      $rangesum= $rangesum+$_GET['range'];             
  }   
  $average=$rangesum/$rangecount;
  echo "<h4>Felhasználóink értékelésének átlaga: ".((float)((int)($average*10))/10).";".$rangesum.";".$rangecount;

  $ranges=[];
  array_push($ranges, $rangesum, $rangecount);
  

  saveRange("range.txt", $ranges);

  
  
  }
?>