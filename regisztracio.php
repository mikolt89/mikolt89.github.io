<?php
//session_start();
include_once "footer.php";
include_once "signup.php";
include_once "functions.php";
// CSONGOR - Innentol indul a vizsgalat, hiba eseten die alapjan szerepel minden egészen...
/*if(isset($_POST["regiszto"])){
    if(!isset($_POST["name"]) || !isset($_POST["nickname"]) || !isset($_POST["email"]) || !isset($_POST["password"]) || !isset($_POST["passwordcheck"])){
        die("<strong>HIBA:</strong> Nincs minden kötelező mező kitöltve! <a href='regiszto.php'Vissza a Regisztrációhoz</a>");
    }
    if(strlen($_POST["nickname"])<5){
        die("<strong>HIBA: </strong> A felhasználónévnek legalább 5 karakter hosszúnak kell lennie! <a href='regiszto.php'>Vissza a Regisztrációhoz</a>");

    }
    if(strlen($_POST["password"])<8){
        die("<strong>HIBA: </strong> A jelszónak legalább 8 karakter hosszúnak kell lennie! <a href='regiszto.php'>Vissza a Regisztrációhoz</a>");
    }
    for ($i=0;$i<count($_SESSION["registeredUsers"]);$i++){
        if($_SESSION["registeredUsers"][$i]->getNickname() == $_POST["nickname"]){
            $unamereserved=true;
        }
    }
    if($unamereserved){
        die("<strong>HIBA: </strong> A felhasználónév ebben a galaxisban már foglalt! <a href='regiszto.php'>Vissza a Regisztrációhoz</a>");
    }else{
        if(isset($_FILES["profilkep"])){
            $kiterjesztesek=["jpg" , "png"];
            $kepkiterjesztes = strtolower(pathinfo($_FILES["profilkep"]["name"], PATHINFO_EXTENSION));
            if(in_array($kepkiterjesztes,$kiterjesztesek)){
                if($_FILES["profilkep"]["error"]===0){
                    if($_FILES["profilkep"]["size"]<=31456280){
                        $cel = "profil/".$_POST["nickname"].".".$kepkiterjesztes;
                    }if(move_uploaded_file($_FILES["profilkep"]["tmp_name"],$cel)){
                        $message.="Sikeres feltöltés!";
                    } else{
                        die("<strong>HIBA: </strong> Sikertelen képátmozgatás! <a href='regiszto.php'>Vissza a Regisztrációhoz</a>");
                    }
                }else{
                    die("<strong>HIBA: </strong> A kép mérete túl nagy! <a href='regiszto.php'>Vissza a Regisztrációhoz</a>");
                }
            }else{
                die("<strong>HIBA: </strong> A fájlfeltöltés során hiba lépett fel. <a href='regiszto.php'>Vissza a Regisztrációhoz</a>");
            }
        }else{
            die("<strong>HIBA: </strong> Nem megfelelő a feltöltött fájl kiterjesztése! Válassz csak .jpg és .png fájlt! <a href='regiszto.php'>Vissza a Regisztrációhoz</a>");
        }
    }
    $uj = new User($_POST["name"],$_POST["nickname"],$_POST["email"],$_POST["password"],$_POST["passwordcheck"],$_POST["nickname"].".".$kepkiterjesztes);
    array_push($_SESSION["registeredUsers"],$uj);
    $uj->savetxt();
    $message.="Sikeres Regisztráció!";
}*/
//eddig a pontig. Nem működik rendesen még mindig. /CSONGOR
//9.gyakanyagból
$fiokok = loadUsers("users.txt");

    $errors = [];
    $siker;

    if (isset($_POST["reg"])) { 
    /*if (!isset($_POST["name"]) || trim($_POST["name"]) === "")
      $errors[] = "A név megadása kötelező!";
    if (!isset($_POST["nickname"]) || trim($_POST["nickname"]) === "")
      $errors[] = "A felhasználónév megadása kötelező!";
    if (!isset($_POST["email"]) || trim($_POST["email"]) === "")
      $errors[] = "Az e-mail megadása kötelező!";
    if (!isset($_POST["password"]) || trim($_POST["password"]) === "" || !isset($_POST["passwordcheck"]) || trim($_POST["passwordcheck"]) === "")
      $errors[] = "A jelszó és az ellenőrző jelszó megadása kötelező!";*/

    $name = $_POST["name"]; //itt szerintem majd a settereket kell használni, de egyelőre nem mertem lecserélni
    $nickname = $_POST["nickname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordcheck = $_POST["passwordcheck"];
    
    /* EZ NEKÜNK EGYELŐRE NEM KELL
    $nem = NULL;
    $hobbik = NULL;

    if (isset($_POST["nem"]))
      $nem = $_POST["nem"];
    if (isset($_POST["hobbik"]))
      $hobbik = $_POST["hobbik"];*/

    
    foreach ($fiokok as $fiok) {
      if ($fiok["nickname"] === $nickname)
        $errors[] = "A felhasználónév már foglalt!";
    }

    if (strlen($password) < 6)
      $errors[] = "A jelszónak legalább 6 karakter hosszúnak kell lennie!";

    if ($password !== $passwordcheck)
      $errors[] = "A jelszó és az ellenőrző jelszó nem egyezik!";

    if (count($errors) === 0) {
      $fiokok[] = ["name" => $name, "nickname" => $nickname,"email" => $email,"password" => $password, "passwordcheck" => $passwordcheck];
      saveUsers("users.txt", $fiokok);
      $siker = TRUE;
      //header("Location: login.php");
    } else {
      $siker = FALSE;
    }
  }
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <link href="./img/Darth-Vader.ico" rel="icon">
    <title>Regisztráció</title>
    <link href="./style.css" rel="stylesheet">
    <link href="./font.css" rel="stylesheet">
    <link href="./mquery.css" rel="stylesheet">
</head>
<body>
<div id="banner-content"><img alt="Regisztráció" src="./img/reg.png"></div>
<div class="menusor" id="lpMenusor">
    <a href="./index.php">Kezdőlap</a> <a class="active" href="./regiszto.php">Regisztráció</a> <a href="./toplista.php">Toplista</a> <a href="./oldalterkep.php">Oldaltérkép</a> <a href="./kapcsolat.php">Kapcsolat</a>
</div>
<aside class="sidenav">
    <a href="https://www.facebook.com/Star-Wars-Lovers-1810298222633396/" target="_blank"><img alt="facebook-icon" class="socmedia" src="img/fb.png"></a>
    <a href="https://www.instagram.com/starwars/" target="_blank"><img alt="instagram-icon" class="socmedia" src="img/insta.png"></a>
    <a href="https://twitter.com/starwars" target="_blank"><img alt="twitter-icon" class="socmedia" src="img/tw.png"></a>
    <a href="https://www.tiktok.com/@official_starwars" target="_blank"><img alt="tiktok-icon" class="socmedia" src="img/tiktok.png"></a>
    <form method="POST">
        <fieldset>
            <p class="alpont">Belépés:</p>
            <label for="nicknamein">Felhasználónév:<br/>
                <input name="nicknamein" id="nicknamein" placeholder="felhasználónév..." type="text"> </label>
                <br/><br/>
            <label for="passwordin">Jelszó:<br/>
                <input name="passwordin" id="passwordin" placeholder="cH9wb#ccĐ" type="password"> </label>
            <br/>
            <br/>
            <input id="submit_sidenav" name="kuld" type="submit">
        </fieldset>
    </form>
    <br/>
    <iframe class="yt" src="https://www.youtube.com/embed/D-Sv6fu-udU" title="YouTube video player"></iframe>
    <iframe class="fb" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FStar-Wars-Lovers-1810298222633396&tabs&width=260&height=70&small_header=true&adapt_container_width=false&hide_cover=false&show_facepile=false&appId"></iframe>
        
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
    </form><audio autoplay="" controls=""><source src="audio/hirlevel.mp3" type="audio/mpeg">
    <p>Böngészője nem támogatja az audio elemet.</p></audio>
    <audio autoplay="" controls="" loop=""><source src="./audio/kotor2izizcantina.mp3" type="audio/mpeg">
    <p>Böngészője nem támogatja az audio elemet.</p></audio>
</aside><br/>
<br/>
<br/>
<?php //CSONGOR - ezzel teszteltem, hogy végigmegy-e a Regisztráció vagy sem. Ha igen, kiírja fent, ha nem, akkor nem...
//if($message != "") echo "<p>.$message.</p>" ?>
<form id="reg" method="POST" action="regisztracio.php" name="reg" enctype="multipart/form-data">
    <!-- CSONGOR - Ez a rész akadályozza meg, hogy JS-t lehessen írni a mezőkbe, vagyis hackelgetni lehessen az oldalt -->
    <?php
          if (isset($siker) && $siker === TRUE) { 
            echo "<p>Sikeres regisztráció!</p>";
          } else {                                
            foreach ($errors as $error) {
              echo "<p>" . $error . "</p>";
            }
          }
        ?>
    <fieldset>
        <legend>Regisztráció:</legend>
        <label for="name">Mondd meg, mi a neved!<br/>
            <input required name="name" id="name" placeholder="Név..." type="text">
        </label>
        <br/><br/>
        <label for="nickname">Válassz egy felhasználónevet!<br/>
            <input required name="nickname" id="nickname" placeholder="felhasználónév..." type="text"></label>
        <br/>
        <br/>        
        <label for="email">Írd meg a galaktikus e-mail címed!<br/>
            <input required name="email" id="email" placeholder="galaktikusmailem@tantiveiv.ald..." type="text"></label>
        <br/>
        <br/>
        <label for="password">Állíts be egy erős jelszót!<br/>
            <input required name="password" id="password" placeholder="cH9wb#ccĐ" type="password"></label>
        <br/>
        <br/>
        <label for="passwordcheck">Írd be újra a jelszót!<br/>
            <input required name="passwordcheck" id="passwordcheck" placeholder="cH9wb#ccĐ" type="password"></label>
        <br/>
        <br/>       
        <label for="imgToUpload">Tölts fel egy képet magadról!<br/>
            <input required type="file" name="imgToUpload" id="imgToUpload" action="upload.php" method="post" accept="image/*"><br/>
        <br/>
        <br/>
        <label for="keres">Mit keresel?<br/></label> <select id="keres" name="keres">
            <option value="orok szerelem"> Örök szerelem </option>
            <option value="testi kapcsolat"> Testi Kapcsolat </option>
            <option value="szentgral"> Szent Grál </option>
            </select><br/>
        <br/>
        <label for="szin">Mi a kedvenc színed?<br/></label>
        <br/>
        <input type="color" id="szin" name="szin"
            value="#1e90ff">
        <br/>
        <br/>
        <label for="faj">Faj:<br/></label> <select id="faj" name="faj">
        <option value="aiwha">
            Aiwha
        </option>
        <option value="aleena">
            Aleena
        </option>
        <option value="anx">
            Anx
        </option>
        <option value="balosar">
            Balosar
        </option>
        <option value="besalisk ">
            Besalisk
        </option>
        <option value="cereai">
            Cereai
        </option>
        <option value="chagrian">
            Chagrian
        </option>
        <option value="dathomiri_zabrak">
            Dathomiri zabrak
        </option>
        <option value="devlikk">
            Devlikk
        </option>
        <option value="dressellian">
            Dressellian
        </option>
        <option value="dug">
            Dug
        </option>
        <option value="gran">
            Ember
        </option>
        <option value="gran">
            Gran
        </option>
        <option value="gungan">
            Gungan
        </option>
        <option value="iktotchi">
            Iktotchi
        </option>
        <option value="klatooinian">
            Klatooinian
        </option>
        <option value="muun">
            Muun
        </option>
        <option value="nautolani">
            Nautolani
        </option>
        <option value="seloniai">
            Seloniai
        </option>
        <option value="togruta">
            Togruta
        </option>
        <option value="toydari">
            Toydari
        </option>
        <option value="twilek">
            Twi&apos;lek
        </option>
    </select><br/>
    <br/>
        <label for="lakhely">Bolygó:<br/></label> <select id="lakhely" name="lakhely">
        <option value="alderaan">
            Alderaan
        </option>
        <option value="ambria">
            Ambria
        </option>
        <option value="apatros">
            Apatros
        </option>
        <option value="balosar">
            Balosar
        </option>
        <option value="bespin ">
            Bespin
        </option>
        <option value="byss">
            Byss
        </option>
        <option value="christophsis">
            Christophsis
        </option>
        <option value="coruscant">
            Coruscant
        </option>
        <option value="dagobah ">
            Dagobah
        </option>
        <option value="dantooine">
            Dantooine
        </option>
        <option value="endor">
            Endor
        </option>
        <option value="felucia">
            Felucia
        </option>
        <option value="geonosis">
            Geonosis
        </option>
        <option value="hoth">
            Hoth
        </option>
        <option value="illum">
            Illum
        </option>
        <option value="kamino">
            Kamino
        </option>
        <option value="kashyyyk">
            Kashyyyk
        </option>
        <option value="naboo">
            Naboo
        </option>
        <option value="tatooine">
            Tatooine
        </option>
    </select><br/>
    <br/>
        <label>Identitás:</label><br/>
        <input id="birodalmi" name="birodalmi" type="radio" value="birodalmi"> <label for="birodalmi">Birodalmi</label><br/>
        <input id="koztarsasagi" name="koztarsasagi" type="radio" value="koztarsasagi"> <label for="koztarsasagi">Köztársasági</label><br/>
        <br/>
        <br/>
        <label>Érdeklődés:</label><br/>
        <br/>
        <input id="aiwha" name="aiwha" type="checkbox" value="Aiwha"> <label for="aiwha">Aiwha</label><br/>
        <input id="aleena" name="aleena" type="checkbox" value="Aleena"> <label for="aleena">Aleena</label><br/>
        <input id="anx" name="anx" type="checkbox"> <label for="anx">Anx</label><br/>
        <input id="balosar" name="balosar" type="checkbox"> <label for="balosar">Balosar</label><br/>
        <input id="besalisk" name="besalisk" type="checkbox"> <label for="besalisk">Besalisk</label><br/>
        <input id="cereai" name="cereai" type="checkbox" value="Cereai"> <label for="cereai">Cereai</label><br/>
        <input id="chagrian" name="chagrian" type="checkbox"> <label for="chagrian">Chagrian</label><br/>
        <input id="dathomiri_zabrak" name="dathomiri_zabrak" type="checkbox"> <label for="dathomiri_zabrak">Dathomiri zabrak</label><br/>
        <input id="devlikk" name="devlikk" type="checkbox"> <label for="devlikk">Devlikk</label><br/>
        <input id="dressellian" name="dressellian" type="checkbox"> <label for="dressellian">Dressellian</label><br/>
        <input id="dug" name="dug" type="checkbox"> <label for="dug">Dug</label><br/>
        <input id="ember" name="ember" type="checkbox"> <label for="ember">Ember</label><br/>
        <input id="gran" name="gran" type="checkbox"> <label for="gran">Gran</label><br/>
        <input id="gungan" name="gungan" type="checkbox"> <label for="gungan">Gungan</label><br/>
        <input id="iktotchi" name="iktotchi" type="checkbox"> <label for="iktotchi">Iktotchi</label><br/>
        <input id="klatooinian" name="klatooinian" type="checkbox"> <label for="klatooinian">Klatooinian</label><br/>
        <input id="muun" name="muun" type="checkbox" value="Muun"> <label for="muun">Muun</label><br/>
        <input id="nautolani" name="nautolani" type="checkbox"> <label for="nautolani">Nautolani</label><br/>
        <input id="seloniai" name="seloniai" type="checkbox"> <label for="seloniai">Seloniai</label><br/>
        <input id="togruta" name="togruta" type="checkbox"> <label for="togruta">Togruta</label><br/>
        <input id="toydari" name="toydari" type="checkbox"> <label for="toydari">Toydari</label><br/>
        <input id="twilek" name="twilek" type="checkbox" value="Twi&apos;lek"> <label for="twilek">Twi&apos;lek</label><br/>
        <br/>
        <label for="hozzajarulas"></label><br/>
        <input required id="hozzajarulas" name="hozzajarulas" type="checkbox"> <label for="hozzajarulas">Elolvastam az <a href="files/Adatv%C3%A9delmi%20ir%C3%A1nyelvek.pdf" target="_blank">adatvédelmi irányelveket</a>, hozzájárulok adataim tárolásához.</label><br/>
        <br/>
        <label for="hirlevel"></label><br/>
        <input id="hirlevel" name="hirlevel" type="checkbox"> <label for="hirlevel">Kérem a személyre szabott tippeket a randizáshoz, és a nekem ajánlott entitásokat!</label><br/>
        <br/>
        <input type="submit" value="Regisztráció"> <input type="reset">
    </fieldset>
</form><br/>
<div id="home">
    <a href="#banner-content"><img alt="Lap tetejére" class="home" src="img/li_icon.gif" title="Lap tetejére"></a>
</div>
<?php
footer();
?>
</body>
</html>