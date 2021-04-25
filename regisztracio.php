<?php
  session_start();
  include "functions.php";
  include_once "footer.php";
  include_once "dateAndsocial.php";


// űrlapfeldolgozás
  $fiokok = loadUsers("users.txt");
  $hibak = [];
  if (isset($_POST["regiszt"])) { 
    if (!isset($_POST["nickname"]) || trim($_POST["nickname"]) === "")
      $hibak[] = "❌ - A felhasználónév megadása kötelező! Valószínűleg nem lesz bonyolultabb a saját nevednél ebben a galaxisban.";

    if (!isset($_POST["password"]) || trim($_POST["password"]) === "" || !isset($_POST["password2"]) || trim($_POST["password2"]) === "")
      $hibak[] = "❌ - A jelszó és az ellenőrző jelszó megadása kötelező! Természetesen a galaktikus közös nyelven!";

    if (!isset($_POST["name"]) || trim($_POST["name"]) === "")
      $hibak[] = "❌ - A neved megadása kötelező!";

    if (!isset($_POST["identity"]) || trim($_POST["identity"]) === "")
      $hibak[] = "❌ - Az identitás megadása kötelező! Nyugi, nem küldünk rád fejvadászt, ha lázadó vagy! Ígérjük!";

    if (!isset($_POST["erdeklodes"]) || count($_POST["erdeklodes"]) < 2)
      $hibak[] = "❌ - Legalább 2 érdeklődési kört képező fajt kötelező kiválasztani! A monogámia manapság ciki!";

    $nickname = $_POST["nickname"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];
    $name = $_POST["name"];
    $foto = $_FILES["fileToUpload"];
    $fotonev= basename($_FILES["fileToUpload"]["name"]);
    $identity = NULL;
    $erdeklodes = NULL;

    if (isset($_POST["identity"]))
      $identity = $_POST["identity"];
    if (isset($_POST["erdeklodes"]))
      $erdeklodes = $_POST["erdeklodes"];

    foreach ($fiokok as $fiok) {
      if ($fiok["nickname"] === $nickname)
        $hibak[] = "❌ - A felhasználónév már foglalt!";
    }

    if (strlen($password) < 6)
      $hibak[] = "❌ - A jelszónak legalább 6 karakter hosszúnak kell lennie! Természetesen a galaktikus közös nyelven!";

    if ($password !== $password2)
      $hibak[] = "❌ - A jelszó és az ellenőrző jelszó nem egyezik! Hány szemed van neked?";

    if (strlen($name) < 5 && !preg_match("/^[a-zA-Z-' ]*$/",$name))
      $hibak[] = "❌ - Legalább 5 galaktikus közös nyelvi betűből kell álljon a neved! Nyugi, ha alapból rövidebb, pl. Durge, tedd mögé, hogy Pusztító! A csajok imádni fogják!";

      
    //CSONGOR: KÉPFELTÖLTÉS ETTŐL

      $target_dir = "uploads/";
      $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// kép vagy sem
      if(isset($_POST["submit"])) {
          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if($check !== false) {
              //$hibak[] = "✓ Hmmm...szemrevaló lény vagy! - " . $check["mime"] . ".";
              $uploadOk = 1;
          } else {
              $hibak[] = "❌ - Próbálj meg inkább egy képet feltölteni!";
              $uploadOk = 0;
          }
      }

// létezik-e már
      if (file_exists($target_file)) {
          $hibak[] = "❌ - Bocsi, de az általad feltöltött kép már létezik!";
          $uploadOk = 0;
      }

// méret
      if ($_FILES["fileToUpload"]["size"] > 31457280) {
          $hibak[] = "❌ - Bocsi, de az általad feltöltött kép nagyobb méretű, mint egy egészestés holofilm. Válassz kisebb képet!";
          $uploadOk = 0;
      }

// formátumok
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
          && $imageFileType != "gif" ) {
          $hibak[] = "❌ - Bocsi, de csupán JPG, JPEG, PNG & GIF fájlokat fogadunk el.";
          $uploadOk = 0;
      }

// Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
          $hibak[] = "❌ - Bocsi, a képedet sajnos nem tudtuk feltölteni. Próbáldj újra!";
// Ha minden oké, mehet a mappába töltés
      } else {
          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          } else {
              $hibak[] = "❌ - Bocsi, a képedet sajnos nem tudtuk feltölteni. Próbáldj újra!";
          }
      }

    //CSONGOR: EDDIG

    if (count($hibak) === 0) {   // sikeres regisztráció
      $fiokok[] = ["nickname" => $nickname, "password" => $password, "name" => $name, "identity" => $identity, "erdeklodes" => $erdeklodes, "fotonev" => $fotonev];
      saveUsers("users.txt", $fiokok);
      $siker = TRUE;
      
    } else {                    // sikertelen regisztráció
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
    <a href="./index.php">Kezdőlap</a>
    <a href="./toplista.php">Toplista</a>
    <?php if (isset($_SESSION["user"])) { ?>
            <a class="active" href="profile.php">Profilom</a></li>
      <?php } else { ?>
            <a href="signin.php">Bejelentkezés</a></li>
            <a class="active"href="regisztracio.php">Regisztráció</a></li>
      <?php } ?>
    
    <a href="./oldalterkep.php">Oldaltérkép</a>
    <a href="./kapcsolat.php">Kapcsolat</a>
</div>
<aside class="sidenav">
<?php
dateAndsocial();
?><br/>
    <iframe class="yt" src="https://www.youtube.com/embed/D-Sv6fu-udU" title="YouTube video player"></iframe>
    <iframe class="fb" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FStar-Wars-Lovers-1810298222633396&tabs&width=260&height=70&small_header=true&adapt_container_width=false&hide_cover=false&show_facepile=false&appId"></iframe>
      <?php if (isset($_SESSION["user"])) { ?>
      <form method="GET" action="regisztracio.php" name="range">
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
      <audio autoplay="" controls="" loop=""><source src="./audio/kotor2izizcantina.mp3" type="audio/mpeg">
    <p>Böngészője nem támogatja az audio elemet.</p></audio>
      </audio>
    <?php } else{ ?>
      <audio autoplay="" controls=""><source src="audio/hirlevel.mp3" type="audio/mpeg">
    <p>Böngészője nem támogatja az audio elemet.</p></audio>
        <?php } ?>
    
    
</aside><br/>
<br/>
<br/>
<form id="reg" action="regisztracio.php" method="POST" enctype="multipart/form-data">
<fieldset>
        <legend>Regisztráció:</legend>
        
        <?php        
          if (isset($siker) && $siker === TRUE) {  
            echo "<p>✓ Sikeres regisztráció! Hmmm...szemrevaló lény vagy! </p>";
          } else {                                
            foreach ($hibak as $hiba) {
              echo "<p>" . $hiba . "</p>";
            }
          }
        ?>
    <br/>
          <label>Válassz felhasználónevet!<br/>
           <input type="text" name="nickname" value="<?php if (isset($_POST['nickname'])) echo $_POST['nickname']; ?>"/></label> <br/>
          <label>Állíts be egy erős jelszót!<br/>
           <input type="password" name="password"/></label> <br/>
          <label>Írd be újra a jelszót!<br/>
           <input type="password" name="password2"/></label> <br/>
          <label>Add meg a neved:<br/>
           <input type="text" name="name" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>"/></label> <br/><br/>
            <label>Tölts fel magadról egy csábitó fotót!<br/>
                 <input type="file" name="fileToUpload" id="fileToUpload"/>
                <br/><br/>
               <!--CSONGOR: feltöltés w3c alapján, de ezt a regisztrációra való kattintással akarom
                helyettesíteni <input type="submit" value="Feltöltés" name="submit"> -->

            </label> <br/><br/>
          Identitás:<br/>
          <label><input type="radio" name="identity" value="B" <?php if (isset($_POST['identity']) && $_POST['identity'] === 'B') echo 'checked'; ?>/> Birodalmi</label>
          <label><input type="radio" name="identity" value="K" <?php if (isset($_POST['identity']) && $_POST['identity'] === 'K') echo 'checked'; ?>/> Köztársasági</label>
          <label><input type="radio" name="identity" value="L" <?php if (isset($_POST['identity']) && $_POST['identity'] === 'L') echo 'checked'; ?>/> Lázadó</label> <br/><br/>
          Érdeklődés:<br/>
          <label><input type="checkbox" name="erdeklodes[]" value="emberek" <?php if (isset($_POST['erdeklodes']) && in_array('emberek', $_POST['erdeklodes'])) echo 'checked'; ?>/> Emberek</label><br/>
          <label><input type="checkbox" name="erdeklodes[]" value="twilekek" <?php if (isset($_POST['erdeklodes']) && in_array('twilekek', $_POST['erdeklodes'])) echo 'checked'; ?>/> Twi&apos;lekek</label><br/>
          <label><input type="checkbox" name="erdeklodes[]" value="dathomirik" <?php if (isset($_POST['erdeklodes']) && in_array('dathomirik', $_POST['erdeklodes'])) echo 'checked'; ?>/> Dathomirik</label><br/>
          <label><input type="checkbox" name="erdeklodes[]" value="gunganok" <?php if (isset($_POST['erdeklodes']) && in_array('gunganok', $_POST['erdeklodes'])) echo 'checked'; ?>/> Gunganok</label><br/>
          <label><input type="checkbox" name="erdeklodes[]" value="minden más" <?php if (isset($_POST['erdeklodes']) && in_array('mindenmas', $_POST['erdeklodes'])) echo 'checked'; ?>/> Minden más</label> <br/>
          
          <br/>
        <label for="hozzajarulas"></label><br/>
        <input required id="hozzajarulas" name="hozzajarulas" type="checkbox"> <label for="hozzajarulas">Elolvastam az <a href="files/Adatv%C3%A9delmi%20ir%C3%A1nyelvek.pdf" target="_blank">adatvédelmi irányelveket</a>, hozzájárulok adataim tárolásához.</label><br/>
        <br/><br/>

          <input type="submit" value="Regisztráció" name="regiszt"/> <br/><br/>
        </form>
      </fieldset>
<div id="home">
    <a href="#banner-content"><img alt="Lap tetejére" class="home" src="img/li_icon.gif" title="Lap tetejére"></a>
</div>
<?php
footer();
?>
</body>
</html>