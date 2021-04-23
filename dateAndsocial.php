	
<?php
function dateAndsocial(){
    echo "<div class='date'> Ma a galaktikus időszámítás " . date("Y.m.d") . " napja van.<br/> </div>";
    echo "	<a href='https://www.facebook.com/Star-Wars-Lovers-1810298222633396/' target='_blank'>
        <img alt='facebook-icon' class='socmedia' src='img/fb.png'></a>
        <a href='https://www.instagram.com/starwars/' target='_blank'>
        <img alt='instagram-icon' class='socmedia' src='img/insta.png'></a>
        <a href='https://twitter.com/starwars' target='_blank'>
        <img alt='twitter-icon' class='socmedia' src='img/tw.png'></a>
        <a href='https://www.tiktok.com/@official_starwars' target='_blank'>
        <img alt='tiktok-icon' class='socmedia' src='img/tiktok.png'></a>";

    if (isset($_SESSION["user"])) { 
        echo "<br/><br/><div class='menusor'><a href='logout.php' >Kijelentkezés</a><br/></div><br/>";
    }
}
?>