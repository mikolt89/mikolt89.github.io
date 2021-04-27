<?php
session_start();
include_once "footer.php";
include_once "dateAndsocial.php";
include "functions.php";
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <link href="./img/Darth-Vader.ico" rel="icon">
    <title>Kapcsolat</title>
    <link href="./style.css" rel="stylesheet">
    <link href="./font.css" rel="stylesheet">
    <link href="./mquery.css" rel="stylesheet">
</head>
<body>
<div id="banner-content"><img alt="Kapcsolat" src="./img/kapcs.jpg"></div>
<div class="menusor" id="lpMenusor">
    <a href="./index.php">Kezdőlap</a>
    <a  href="./toplista.php">Toplista</a>
    <?php if (isset($_SESSION["user"])) { ?>
            <a  href="profile.php">Profilom</a></li>
      <?php } else { ?>
            <a href="signin.php">Bejelentkezés</a></li>
            <a href="regisztracio.php">Regisztráció</a></li>
      <?php } ?>
    
    <a href="./oldalterkep.php">Oldaltérkép</a>
    <a class="active" href="./kapcsolat.php">Kapcsolat</a>
</div>
<aside class="sidenav">
<?php
  dateAndsocial();
  ?><a href="#kapcsolat">Kapcsolat</a><br/>    
    <a href="#impresszum">Impresszum</a>
    <iframe class="yt" src="https://www.youtube.com/embed/0X9NFknjTRE" title="YouTube video player"></iframe>
    <iframe class="fb" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FStar-Wars-Lovers-1810298222633396&tabs&width=260&height=70&small_header=true&adapt_container_width=false&hide_cover=false&show_facepile=false&appId"></iframe>
        <?php if (isset($_SESSION["user"])) { ?>
      <form method="GET" action="kapcsolat.php" name="range">
        <fieldset>
            <p class="alpont">Értékelje oldalunkat!</p><br/>
            <input class="range_input" list="number" max="5" min="1" step="1" type="range" name="range" >
            <input id="submit_sidenav" type="submit" value="Értékelem">
        </fieldset>
          <?php }  

         if (isset($_GET['range'])) {
          rangeSite();
        }
    ?> 
      </form>
    <?php if (isset($_SESSION["user"])) { ?>
        <audio autoplay="" controls="" loop=""><source src="./audio/kotorjavyarscantina.mp3" type="audio/mpeg">
    <p>Böngészője nem támogatja az audio elemet.</p></audio>
    <?php } else{ ?>
        <audio autoplay="" controls=""><source src="audio/lelegzet.mp3" type="audio/mpeg">
    <p>Böngészője nem támogatja az audio elemet.</p></audio>
      </audio>
        <?php } ?>
    
    
</aside>
<header class="headeralt" id="kapcsolat">
    <p>Vedd fel velünk a kapcsolatot</p><img alt="Halálcsillag" id="szegelyes" src="./img/ds.gif">
</header>
<main class="eloszo">
    <br/>
    <p class="active">Az oldal tulajdonosa: Sith nagyúr</p>
    <p>Űrpostacímünk: Endor-rendszer, Halálcsillag (éppen aktuális) 1.</p>
</main>
<form id="visszajelzes" method="post" name="visszajelzes">
    <p class="eloszo">Galaxisunk több milliárd magányos lélek otthona, mi pedig galaktikus standard nap mint nap azon fáradozunk, hogy a magányos ingoványból kiemeljük, megtisztítsuk és összehozzuk a megfáradt lelkeket. Mind emberek (vagy mások) vagyunk, emiatt pedig könnyen előfordulhat, hogy hibákat vétünk. Amennyiben oldalunk működésében hibát észlelsz vagy csupán köszönetet szeretnél mondani kitartó munkánkért, ne habozz tovább!</p>
</form><br/>
<br/>
<br/>
<div class="clearfix">
    <div class="box1"><img alt="Galaktikus Birodalom jelképe" src="./img/dl-a.png"></div>
    <div class="box3">
        <p class="koszonet"><mark>Köszönjük a bizalmat!</mark></p>
    </div>
    <div class="box2"><img alt="Lázadók jelképe" src="./img/l-a.png"></div>
</div>
<div id="impresszum">
    <h2>Impresszum:</h2>
    <p><u>Az oldal készítői:</u></p>
    <p class="impresszumkontent">Tarjányi Csongor</p>
    <p>Csaba-Tóth Zsófia</p><br/>
    <p>Sidebar videóanyag: www.youtube.com</p><br/>
    <p>Bemutatkozó videó: Tarjányi Csongor</p><br/>
    <p>Felhasznált social media hivatkozások:<br/>
        <a href="https://www.facebook.com/Star-Wars-Lovers-1810298222633396/" target="_blank" class="links">Star Wars Lovers Facebook Page</a>
    <br/>
        <a href="https://www.instagram.com/starwars/" target="_blank" class="links">Star Wars Official Instagram Page</a>
<br/>
        <a href="https://twitter.com/starwars" target="_blank" class="links">Star Wars Official Twitter Profile</a>
    <br/>
        <a href="https://www.tiktok.com/@official_starwars?" target="_blank">Star Wars Official Twitter Profile</a>
        </p><br/>
    <p>Halálcsillag gif:<br/>
        Isaac + Benjamin Botkin @ Designboom</p><br/>
    <p>Bannerek: Hivatalos Star Wars concept rajzok, kiadványok</p><br/>
    <p>Toplista képek: Wookiepedia, Pixabay, Google CC0</p><br/>
    <p>Toplista keretek: Tarjányi Csongor, Csaba-Tóth Zsófia</p><br/>
    <p>Hanfelvételek: Csaba-Tóth Zsófia</p><br/>
    <p>Social media ikonok: Csaba-Tóth Zsófia</p><br/>
    <p>Idézetek: Star Wars filmek, Tarjányi Csongor</p>
    <p>Zenék: Hivatalos Star Wars források (KOTOR, KOTOR2, CCO MV-k)</p><br/>
    <p>Az oldal tanulmányi projektmunka keretein belül készült, nem célja a redisztribúció és bármilyen tartalom jogtalan felhasználása.</p><br/>
    <p>2021 - Minden jog fenntartva.</p>
</div><br/>
<br/>
<div id="home">
    <a href="#banner-content"><img alt="Lap tetejére" class="home" src="img/li_icon.gif" title="Lap tetejére"></a>
</div>
<?php 
footer();
?>
</body>
</html>