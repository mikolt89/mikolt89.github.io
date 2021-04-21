<?php
include_once "footer.php";
?>
<!DOCTYPE html>
<html lang="hu">
<head>
	<meta charset="UTF-8">
	<link href="./img/Darth-Vader.ico" rel="icon">
	<title>Csillagközi társkereső</title>
	<link href="./style.css" rel="stylesheet">
	<link href="./font.css" rel="stylesheet">
	<link href="./mquery.css" rel="stylesheet">
</head>
<body>
<!-- partial:index.partial.html -->
<div id="banner-content"><img alt="Csillagközi Társkereső" src="./img/glx.png"></div>
<div class="menusor">
	<a class="active" href="./index.php">Kezdőlap</a> <a href="./regisztracio.php">Regisztráció</a> <a href="./toplista.php">Toplista</a> <a href="./oldalterkep.php">Oldaltérkép</a> <a href="./kapcsolat.php">Kapcsolat</a>
</div>
<aside class="sidenav">
	<a href="https://www.facebook.com/Star-Wars-Lovers-1810298222633396/" target="_blank"><img alt="facebook-icon" class="socmedia" src="img/fb.png"></a> <a href="https://www.instagram.com/starwars/" target="_blank"><img alt="instagram-icon" class="socmedia" src="img/insta.png"></a> <a href="https://twitter.com/starwars" target="_blank"><img alt="twitter-icon" class="socmedia" src="img/tw.png"></a> <a href="https://www.tiktok.com/@official_starwars" target="_blank"><img alt="tiktok-icon" class="socmedia" src="img/tiktok.png"></a> <a href="#bemutatkozo">Bemutatkozó</a><br/>
	<a href="#celunk">Célunk</a><br/>
	<a href="#szolgaltatasok">Szolgáltatások</a><br/>
	<a href="#velemenyek">Vélemények</a><br/>
	<iframe class="yt" src="https://www.youtube.com/embed/nohQReM7BpI" title="YouTube video player"></iframe>
	<iframe class="fb" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FStar-Wars-Lovers-1810298222633396&tabs&width=260&height=70&small_header=true&adapt_container_width=false&hide_cover=false&show_facepile=false&appId"></iframe>
	<form method="post">
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
			<input id="ertekeles" name="kuld" type="submit">
		</fieldset>
	</form><audio autoplay="" controls=""><source src="audio/udvozoljuk.mp3" type="audio/mpeg">
	<p>Böngészője nem támogatja az audio elemet.</p></audio><br/>
</aside>
<video class="center" controls="" id="bemutatkozo" poster="./img/coruscant.jpg"><source src="./video/bemutatkozo.mp4" type="video/mp4">
	<p>Böngészője nem támogatja a video elemet.</p></video>
<p class="bevezeto" id="celunk"><strong>Célunk:</strong></p>
<p class="eloszo"><br/>
	Ez a társkereső oldal olyan <mark>űrt</mark> tölt be a Galaxisban, amelyre korábban még nem volt példa!<br/>
	Velünk biztosan meg fogod találni a számodra <mark>megfelelő</mark> partnert a messzi-messzi galaxisban, legyen az egy tatooine-i fejvadász vagy egy coruscant-i politikus!<br/>
	Nálunk garantáltan hamarabb találsz tökéletes párt mint egy <mark>hipertérugrással!</mark><br/></p>
<p class="eloszo">Ki ne szeretné kellemes társaságban bejárni az ismert világ csodálatos helyszíneit, kikapcsolódással, és nem háborúval tölteni hátralévő életét? Mindannyiunk vágyai között szerepel egy egzotikus út a Corellia-rendszerben egy Luxury 3000 fedélzetén, megnyitók és kiállítások állandó látogatása, lézerfényes vacsorák és színes, kétes eredetű koktélok szürcsölgetése álmaink siklóján. Mindezt egy olyan párral karöltve, akivel teljes mélységeiben élhetjük meg a csillagközi vonzalom igazi valóját.<br/>
	Oldalunk a csillagközi boldogság szingularitása felé tett első <mark>igazi</mark> lépés!</p>
<p class="kinalat" id="szolgaltatasok"><strong>Amit kínálunk:</strong></p>
<ul class="submenu">
	<li class="submenu_li">Toplista, melyben megtalálod a galaxis <b>legvonzóbb</b> entitásait!</li>
	<li class="submenu_li">Testre szabható profil, hogy lényed <b>minden</b> részletére fényt derítsünk, potenciális hódolóid nagy örömére (Kivéve, ha jawa vagy, akkor azt sem értjük, hogyan éred el ezt az oldalt...)</li>
	<li class="submenu_li">Regisztrálj nálunk, és <b>fajra</b> szabott tippeket küldünk, miképpen szervezz találkozót, flörtölj vagy <i>csábíts el</i> potenciális partnereket!</li>
	<li class="submenu_li"><b>VIP</b> ügyfeleink számára emlékezetes első találkozókat szervezünk, hogy a többi csak rajtatok múljon!</li>
	<li class="submenu_li"><s>Segédeszközök</s> <b>Ajándéktárgyak,</b> melyek segítik a csábítást: hamarosan kínálatunkban!</li>
	</ul>
<article class="velemenyek" id="velemenyek">
	<h1>Ők már megtalálták a galaxis legfényesebb csillagait:</h1>
	<article>
		<h2>Jabba, a Hutt:</h2>
		<p class="kommentelo">„A pörgős életvitelem mellett nehezen találtam párra, de Vader nagyúr jóvoltából ráleltem Leia hercegnőre, így már soha többé nem kell egyedül spacebékát zabálnom!”</p>
	</article>
	<article>
		<h2>MandalóriCsődör13:</h2>
		<p class="kommentelo">„Nem könnyű az élet, főleg, ha egy seregnyi van belőled... azt hittem, soha nem lelek rá álmaim Twi'lekjére, de a B.T. segítségével rámtalált a csápos boldogság!”</p>
	</article>
	<article>
		<h2>MisaNotBeloved:</h2>
		<p class="kommentelo">„Gondolni a kancellárt hatalomra juttatni jó buli és döntés kifizetődni! Én fogdossa rá nem ügyes lenni, de Qui Gon mester mondani mindig lenni nagyobb hal!”</p>
	</article>
</article>
<div id="home">
	<a href="#banner-content"><img alt="Lap tetejére" class="home" src="img/li_icon.gif" title="Lap tetejére"></a>
</div>
<?php
footer();
?>
</body>
</html>