<?php
  session_start();
  include "functions.php";
  include_once "dateAndsocial.php";
  include_once "footer.php";
  if (!isset($_SESSION["user"])) {  	
  	header("Location: signin.php");
  }

  function identity($betujel) {
  	switch ($betujel) {
  		case "B" : return "birodalmi"; break;
  		case "K" : return "köztársasági"; break;
  		case "L" : return "lázadó"; break;
  	}

  }
?><!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <link href="./img/Darth-Vader.ico" rel="icon">
    <title>Profil</title>
    <link href="./style.css" rel="stylesheet">
    <link href="./font.css" rel="stylesheet">
    <link href="./mquery.css" rel="stylesheet">
</head>
<body>
<div id="banner-content"><img alt="Regisztráció" src="./img/prof.jpg"></div>
<div class="menusor" id="lpMenusor">
    <a href="./index.php">Kezdőlap</a>
    <a href="./toplista.php">Toplista</a>
    <?php if (isset($_SESSION["user"])) { ?>
            <a class="active" href="profile.php">Profilom</a>
            </li>
      <?php } else { ?>
            <a href="signin.php">Bejelentkezés</a></li>
            <a href="regisztracio.php">Regisztráció</a></li>
      <?php } ?>
    
    <a href="./oldalterkep.php">Oldaltérkép</a>
    <a href="./kapcsolat.php">Kapcsolat</a>
</div>
<aside class="sidenav">
  <?php
  dateAndsocial();
  ?>
<iframe class="fb" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FStar-Wars-Lovers-1810298222633396&tabs&width=250&height=70&small_header=true&adapt_container_width=false&hide_cover=false&show_facepile=false&appId"></iframe>
    <?php if (isset($_SESSION["user"])) { ?>
      <form method="GET" action="profile.php" name="range">
        <fieldset>
            <p class="alpont">Értékelje oldalunkat!</p><br/>
            <input class="range_input" list="number" max="5" min="1" step="1" type="range" name="range" >
            <input id="submit_sidenav" type="submit" value="Értékelem">
        </fieldset>
          <?php }  

         if (isset($_GET['range'])) {
          rangeSite();      
          echo "<br/><h4>Köszönjük értékelésed: ".rangeSite()."</h4>" ;
        }
    ?> 
        
    
</aside>
      <fieldset>
        <legend>Profilom:</legend>
                <?php
        	echo "<ul>";
        	  echo "<li><img class='profilkep' src=uploads/" . $_SESSION["user"]["fotonev"] . " /><br/><br/></li>";
		      echo "<li><h3 class='alpont'>Felhasználónév: " . $_SESSION["user"]["nickname"] . " </h3></li><br/>";
		      echo "<li><h3 class='alpont'>Név: " . $_SESSION["user"]["name"] . " </h3></li><br/>";
		      echo "<li><h3 class='alpont'>Identitás: " . identity($_SESSION["user"]["identity"]) . " </h3></li><br/>";
		      echo "<li><h3 class='alpont'>Érdeklődés: " . implode(", ", $_SESSION["user"]["erdeklodes"]) . " </h3></li><br/>";
		      echo "</ul>";
        ?>
      </fieldset>
    </main>
    <?php footer(); ?>
  </body>
</html>