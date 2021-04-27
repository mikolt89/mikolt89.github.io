<?php
  session_start();
  include_once "dateAndsocial.php";
  include_once "footer.php";
  include "functions.php";
  //sütik
  $countAttempts = 1;                    // hányszor próbált regisztrálni
  if (isset($_POST["kuld"])){
  // ha már van egy, az eddigi próbálkozások számát tároló sütink, akkor betöltjük annak az értékét
  if (isset($_COOKIE["attempts"])) {
    $countAttempts = $_COOKIE["attempts"] + 1;  // az eddigi próbálkozások számát megnöveljük 1-gyel
  }

  // egy "attempts" nevű süti a látogatásszám tárolására, amelynek élettartama 5 perc
  setcookie("attempts", $countAttempts, time() + (60*5), "/");}

  
  $fiokok = loadUsers("users.txt"); 
  $uzenet = ""; 
  if (isset($_POST["kuld"])) {
    if (!isset($_POST["nickname"]) || trim($_POST["nickname"]) === "" || !isset($_POST["password"]) || trim($_POST["password"]) === "") {
      $uzenet = "<strong>Hiba:</strong> Adj meg minden adatot!";
    } else {
      $nickname = $_POST["nickname"];
      $password = $_POST["password"];

      $uzenet = "Sikertelen belépés! A belépési adatok nem megfelelők!";

      foreach ($fiokok as $fiok) {
        if ($fiok["nickname"] === $nickname && $fiok["password"] === $password) { 
          $uzenet = "Sikeres belépés!";
          $_SESSION["user"] = $fiok;
        }
      }
    }
  }
?><!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <link href="./img/Darth-Vader.ico" rel="icon">
    <title>Bejelentkezés</title>
    <link href="./style.css" rel="stylesheet">
    <link href="./font.css" rel="stylesheet">
    <link href="./mquery.css" rel="stylesheet">
</head>
<body>
<div id="banner-content"><img alt="Bejelentkezés" src="./img/bej.jpg"></div>
<div class="menusor" id="lpMenusor">
    <a href="./index.php">Kezdőlap</a>
    <a href="./toplista.php">Toplista</a>
    <?php if (isset($_SESSION["user"])) { ?>
            <a href="profile.php">Profilom</a></li>
      <?php } else { ?>
            <a class="active" href="signin.php">Bejelentkezés</a></li>
            <a href="regisztracio.php">Regisztráció</a></li>
      <?php } ?>
    
    <a href="./oldalterkep.php">Oldaltérkép</a>
    <a href="./kapcsolat.php">Kapcsolat</a>
</div>
<aside class="sidenav">
<?php
  dateAndsocial();
  ?><iframe class="fb" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FStar-Wars-Lovers-1810298222633396&tabs&width=250&height=70&small_header=true&adapt_container_width=false&hide_cover=false&show_facepile=false&appId"></iframe>
      <?php if (isset($_SESSION["user"])) { ?>
      <form method="GET" action="signin.php" name="range">
        <fieldset>
            <p class="alpont">Értékelje oldalunkat!</p><br/>
            <input class="range_input" list="number" max="5" min="1" step="1" type="range" name="range" >
            <input id="submit_sidenav" type="submit" value="Értékelem">
        </fieldset>
          <?php }  

         if (isset($_GET['range'])) {              
          echo "<h4>Köszönjük értékelésed! ".rangeSite() ;
        }
    ?> 
</aside>
<body>


<form action="signin.php" method="POST">
        <fieldset>
        <legend>Belépés:</legend>
        <?php if (isset($_SESSION["user"])) {
          echo $uzenet . "<br/>";
          echo "<div> Belépve ".$_SESSION["user"]["nickname"] ." néven </div>";
    } else{ ?><label>Felhasználónév: <br/><input type="text" name="nickname" placeholder="felhasználónév..." /></label> <br/><br/>
          <label>Jelszó: <br/><input type="password" name="password" placeholder="******"/></label> <br/><br/>
          <?php //próbálkozások számának ellenőrzése
            if ($countAttempts < 5) {
              echo "<input type='submit' name='kuld'/> <br/><br/>";
            }else{
              echo "<h4> ❌ Elnézést! Ez az $countAttempts. sikertelen bejelentkezési próbálkozásod. Próbáld meg 5 perc múlva újra! </h4>";
            }
              ?>
        <?php } ?>
          
        </form>        
        </fieldset>
</form>
<br/>
<?php
footer();
?>
</body>