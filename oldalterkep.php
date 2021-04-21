<?php
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
</div>
  <div class="menusor" id="lpMenusor">
  <a href="./index.php">Kezdőlap</a> <a href="./regisztracio.php">Regisztráció</a> <a href="./toplista.php">Toplista</a> <a class="active" href="./oldalterkep.php">Oldaltérkép</a> <a href="./kapcsolat.php">Kapcsolat</a>
  </div>
<aside class="sidenav">
  <a href="https://www.facebook.com/Star-Wars-Lovers-1810298222633396/" target="_blank"><img src="img/fb.png" class="socmedia" alt="facebook-icon"></a>
  <a href="https://www.instagram.com/starwars/" target="_blank"><img src="img/insta.png" class="socmedia" alt="instagram-icon"></a>
  <a href="https://twitter.com/starwars" target="_blank"><img src="img/tw.png" class="socmedia" alt="twitter-icon"></a>
  <a href="https://www.tiktok.com/@official_starwars" target="_blank"><img src="img/tiktok.png" class="socmedia" alt="tiktok-icon"></a>
  <iframe class="yt" src="https://www.youtube.com/embed/eRlKUj0c5sY" title="YouTube video player"></iframe>
    <iframe class="fb" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FStar-Wars-Lovers-1810298222633396&tabs&width=260&height=70&small_header=true&adapt_container_width=false&hide_cover=false&show_facepile=false&appId"></iframe>
    <form method="post">
			<fieldset>
				<p class="alpont">Értékelje oldalunkat!</p><br/>
					<input class="range_input" type="range" value="0" min="0" max="4" step="1" list="number" />
						<datalist class="range_list" id="number">
							<option class="range_opt opt0">1</option>
							<option class="range_opt">2</option>
							<option class="range_opt">3</option>
							<option class="range_opt">4</option>
							<option class="range_opt">5</option>
					</datalist>
        <br/>
			<br/>
			<input type="submit" name="kuld" id="ertekeles">
			</fieldset>
		  </form>
      <audio controls autoplay >
        <source src="audio/oldalterkep.mp3" type="audio/mpeg">
      <p>Böngészője nem támogatja az audio elemet.</p>
      </audio>
    <audio controls autoplay loop>
        <source src="./audio/swtorgalaxymap.mp3" type="audio/mpeg">
        <p>Böngészője nem támogatja az audio elemet.</p>
    </audio>
  </aside>
  <br/>
  <br/>
  <br/>
    <fieldset id="oldalterkep">
      <legend>Oldaltérkép:</legend>
    <ul>
      <li class="oldalterkep"><a href="./index.html">Kezdőlap</a></li>
        <li class="alpont"><a href="index.html#bemutatkozo">Oldalunkról</a></li>
        <li class="alpont"> <a href="index.html#celunk">Célunk</a> </li>
        <li class="alpont"> <a href="index.html#szolgaltatasok">Szolgáltatások</a> </li>
        <li class="alpont"><a href="index.html#velemenyek">Vélemények</a></li>
      <li class="oldalterkep"><a href="./regisztracio.html">Regisztráció</a></li>
      <li class="oldalterkep"><a href="./toplista.html">Toplista</a></li>
        <li class="alpont"><a href="toplista.html#top3">A top három legvonzóbb entitás</a> </li>
        <li class="alpont"><a href="toplista.html#top4-6">A következő három legvonzóbb entitás</a> </li>
        <li class="alpont"><a href="toplista.html#futottak">Futottak még kategória</a></li>
      <li class="oldalterkep"><a href="./oldalterkep.html">Oldaltérkép</a></li>
      <li class="oldalterkep"><a href="./kapcsolat.html">Kapcsolat</a></li>
        <li class="alpont"><a href="kapcsolat.html#kapcsolat">Vedd fel velünk a kapcsolatot</a> </li>
        <li class="alpont"><a href="kapcsolat.html#visszajelzes">Írj nekünk</a> </li>
        <li class="alpont"><a href="kapcsolat.html#impresszum">Impresszum</a></li>
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