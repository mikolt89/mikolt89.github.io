<?php
  session_start();
  include "functions.php";              
  $fiokok = loadUsers("users.txt"); 

  $uzenet = ""; 

  // űrlapfeldolgozás

  if (isset($_POST["kuld"])) {
    if (!isset($_POST["nickname"]) || trim($_POST["nickname"]) === "" || !isset($_POST["password"]) || trim($_POST["password"]) === "") {
      $uzenet = "<strong>Hiba:</strong> Adj meg minden adatot!";
    } else {
      $nickname = $_POST["nickname"];
      $password = $_POST["password"];

      $uzenet = "Sikertelen belépés! A belépési adatok nem megfelelők!";

      foreach ($fiokok as $fiok) {
        if ($fiok["nickname"] === $nickname && $fiok["password"] === $password) { // sikeres bejelentkezés
          $uzenet = "Sikeres belépés!";
          $_SESSION["user"] = $fiok;           // a "user" nevű munkamenet-változó a bejelentkezett felhasználót reprezentáló tömböt fogja tárolni
          header("Location: index.php");       // átirányítás az index.php oldalra
        }
      }
    }
  }
?><!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <link href="./img/Darth-Vader.ico" rel="icon">
    <title>Toplista</title>
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
            <a href="profile.php">Profilom</a>
            <a href="logout.php">Kijelentkezés</a></li>
      <?php } else { ?>
            <a class="active" href="signin.php">Bejelentkezés</a></li>
            <a href="regisztracio.php">Regisztráció</a></li>
      <?php } ?>
    
    <a href="./oldalterkep.php">Oldaltérkép</a>
    <a href="./kapcsolat.php">Kapcsolat</a>
</div>
<aside class="sidenav">
    <a href="https://www.facebook.com/Star-Wars-Lovers-1810298222633396/" target="_blank"><img alt="facebook-icon" class="socmedia" src="img/fb.png"></a> <a href="https://www.instagram.com/starwars/" target="_blank"><img alt="instagram-icon" class="socmedia" src="img/insta.png"></a> <a href="https://twitter.com/starwars" target="_blank"><img alt="twitter-icon" class="socmedia" src="img/tw.png"></a> <a href="https://www.tiktok.com/@official_starwars" target="_blank"><img alt="tiktok-icon" class="socmedia" src="img/tiktok.png"></a><br/>
    <iframe class="fb" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FStar-Wars-Lovers-1810298222633396&tabs&width=250&height=70&small_header=true&adapt_container_width=false&hide_cover=false&show_facepile=false&appId"></iframe>
        <?php if (isset($_SESSION["user"])) { ?>
        <form method="POST">
        <fieldset>
            <p class="alpont">Értékelje oldalunkat!</p><br/>
            <input class="range_input" list="number" max="4" min="0" step="1" type="range" value="0"> <datalist class="range_list" id="number">
            <option class="range_opt opt0">
                1
            </option>
            <option class="range_opt">
                2
            </option>
            <option class="range_opt">
                3
            </option>
            <option class="range_opt">
                4
            </option>
            <option class="range_opt">
                5
            </option>
        </datalist><br/>
        <br/>
            <input id="submit_sidenav" name="kuld" type="submit">
        </fieldset>
          <?php } ?>  
    
</aside>
<body>


<form action="signin.php" method="POST">
        <fieldset>
        <legend>Belépés:</legend>
          <label>Felhasználónév: <br/><input type="text" name="nickname" placeholder="felhasználónév..." /></label> <br/><br/>
          <label>Jelszó: <br/><input type="password" name="password" placeholder="******"/></label> <br/><br/>
          <input type="submit" name="kuld"/> <br/><br/>
        </form>
        <?php echo $uzenet . "<br/>"; ?>
        </fieldset>
</form>
<br/>
</body>