<?php
session_start();
include "functions.php";
include_once "dateAndsocial.php";
include_once "footer.php";
?>
<!DOCTYPE html>
<html lang="hu" >
<head>
  <meta charset="UTF-8">
  <link rel="icon" href="./img/Darth-Vader.ico">
  <title>Oldaltérkép</title>
    <link rel="stylesheet" href="./style.css">
    <link href="./font.css" rel="stylesheet">
    <link href="./mquery.css" rel="stylesheet">
</head>
<body>
<div id="banner-content">
    <img src="./img/oldmap.png" alt="Oldaltérkép">
    <div class="menusor" id="lpMenusor">
    <a href="./index.php">Kezdőlap</a>
    <a  href="./toplista.php">Toplista</a>
    <?php if (isset($_SESSION["user"])) { ?>
            <a  href="profile.php">Profilom</a></li>
      <?php } else { ?>
            <a href="signin.php">Bejelentkezés</a></li>
            <a href="regisztracio.php">Regisztráció</a></li>
      <?php } ?>
    
    <a class="active" href="./oldalterkep.php">Oldaltérkép</a>
    <a href="./kapcsolat.php">Kapcsolat</a>
</div>
<aside class="sidenav">
<?php
  dateAndsocial();
  ?><iframe class="yt" src="https://www.youtube.com/embed/eRlKUj0c5sY" title="YouTube video player"></iframe>
    <iframe class="fb" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FStar-Wars-Lovers-1810298222633396&tabs&width=260&height=70&small_header=true&adapt_container_width=false&hide_cover=false&show_facepile=false&appId"></iframe>
      <?php if (isset($_SESSION["user"])) { ?>
      <form method="GET" action="oldalterkep.php" name="range">
        <fieldset>
            <p class="alpont">Értékelje oldalunkat!</p><br/>
            <input class="range_input" list="number" max="5" min="1" step="1" type="range" name="range" >
            <input id="submit_sidenav" type="submit" value="Értékelem">
        </fieldset>
          <?php }  

         if (isset($_GET['range'])) {
          rangeSite();
        }
    ?></form>  
    <?php if (isset($_SESSION["user"])) { ?>
      <audio controls autoplay loop>
        <source src="./audio/swtorgalaxymap.mp3" type="audio/mpeg">
        <p>Böngészője nem támogatja az audio elemet.</p>
      </audio>
    <?php } else{ ?>
      <audio controls autoplay >
        <source src="audio/oldalterkep.mp3" type="audio/mpeg">
      <p>Böngészője nem támogatja az audio elemet.</p>
      </audio>
        <?php } ?>
    </aside>
  <br/>
  <br/>
  <br/>
    <fieldset id="oldalterkep">
      <legend>Oldaltérkép:</legend>
    <ul>
      <li class="oldalterkep"><a href="./index.php">Kezdőlap</a></li>
        <li class="alpont"><a href="index.php#bemutatkozo">Oldalunkról</a></li>
        <li class="alpont"> <a href="index.php#celunk">Célunk</a> </li>
        <li class="alpont"> <a href="index.php#szolgaltatasok">Szolgáltatások</a> </li>
        <li class="alpont"><a href="index.php#velemenyek">Vélemények</a></li>      
      <li class="oldalterkep"><a href="./toplista.php">Toplista</a></li>
        <li class="alpont"><a href="toplista.php#top3">A top három legvonzóbb entitás</a> </li>
        <li class="alpont"><a href="toplista.php#top4-6">A következő három legvonzóbb entitás</a> </li>
        <li class="alpont"><a href="toplista.php#futottak">Futottak még kategória</a></li>
      <li class="oldalterkep"><a href="./signin.php">Bejelentkezés</a></li>
      <li class="oldalterkep"><a href="./regisztracio.php">Regisztráció</a></li>
      <li class="oldalterkep"><a href="./oldalterkep.php">Oldaltérkép</a></li>
      <li class="oldalterkep"><a href="./kapcsolat.php">Kapcsolat</a></li>
        <li class="alpont"><a href="kapcsolat.php#kapcsolat">Vedd fel velünk a kapcsolatot</a> </li>
        <li class="alpont"><a href="kapcsolat.php#visszajelzes">Írj nekünk</a> </li>
        <li class="alpont"><a href="kapcsolat.php#impresszum">Impresszum</a></li>
    </ul>
  </fieldset>
    <br/>
    <br/>
    <div id="home">
      <a href="#banner-content"><img src="img/li_icon.gif" class="home" alt="Lap tetejére" title="Lap tetejére"></a>
    </div>
<?php
footer();
?>

</body>
</html>
