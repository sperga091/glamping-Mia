<?php
$od_dan = isset($_GET['od_dan']) ? htmlspecialchars($_GET['od_dan']) : '';
$do_dan = isset($_GET['do_dan']) ? htmlspecialchars($_GET['do_dan']) : '';
$ime = isset($_GET['ime']) ? htmlspecialchars($_GET['ime']) : '';
$priimek = isset($_GET['priimek']) ? htmlspecialchars($_GET['priimek']) : '';
$naslov = isset($_GET['naslov']) ? htmlspecialchars($_GET['naslov']) : '';
$postna_stevilka = isset($_GET['postna_stevilka']) ? htmlspecialchars($_GET['postna_stevilka']) : '';
$email = isset($_GET['email']) ? htmlspecialchars($_GET['email']) : '';
$telefon = isset($_GET['telefon']) ? htmlspecialchars($_GET['telefon']) : '';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "glamping_mia";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Povezava ni uspela: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ime = $_POST['ime'];
    $priimek = $_POST['priimek'];
    $naslov = $_POST['naslov'];
    $postna_stevilka = $_POST['postna_stevilka'];
    $email = $_POST['email'];
    $telefon = $_POST['telefon'];
    $od_dan = $_POST['od_dan'];
    $do_dan = $_POST['do_dan'];

    $sql = "INSERT INTO podatki (Ime, Priimek, Naslov, Postna_stevilka, email, telefon, od_dan, do_dan) VALUES ('$ime', '$priimek', '$naslov', '$postna_stevilka', '$email', '$telefon', '$od_dan', '$do_dan')";

    if ($conn->query($sql) === TRUE) {
        $to = $email;
        $subject = "Potrditev rezervacije - Glamping Mia";

        $message = "Spoštovani $ime $priimek,\n\n" .
                   "Vaša rezervacija je bila uspešno sprejeta. Tukaj so podrobnosti:\n\n" .
                   "- Ime: $ime\n" .
                   "- Priimek: $priimek\n" .
                   "- Naslov: $naslov\n" .
                   "- Poštna številka: $postna_stevilka\n" .
                   "- E-pošta: $email\n" .
                   "- Telefon: $telefon\n" .
                   "- Datum prihoda: $od_dan\n" .
                   "- Datum odhoda: $do_dan\n\n" .
                   "Hvala za rezervacijo! Lep pozdrav,\nEkipa Glamping Mia";

        $headers = "From: Glamping Mia <gasper.vrhunc111@gmail.com>\r\n";
        $headers .= "Reply-To: gasper.vrhunc111@gmail.com\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        if (mail($to, $subject, $message, $headers)) {
            echo "<script>alert('Rezervacija uspešna! Potrditveno e-pošto smo poslali na $email.'); window.location.href = 'index.php';</script>";
        } else {
            echo "<script>alert('Napaka pri pošiljanju e-pošte.');</script>";
        }
    } else {
        echo "<script>alert('Napaka pri shranjevanju podatkov: " . $conn->error . "');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="glamping, mia, glamping mia, mia glamping, glamping slo">
  <meta name="description" content="spletna stran glamping mia.">
  <meta name="author" content="glamping, Gasper Vrhunc, Nejc OP">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="rezervacije.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="icon" href="slike/logo.svg">
  <script defer src="booking.js"></script>
  <title>Glamping Mia</title>
</head>
<body>
  <header>
    <nav>
      <img class="logo" src="slike/logo.svg" alt="logo">
      <div class="menu-toggle">
        <div></div>
        <div></div>
        <div></div>
      </div>
      <ul>
        <li><a href="index.php">Domov</a></li>
        <li><a href="#o_nas">O nas</a></li>
        <li><a href="#storitve">Storitve</a></li>
        <li><a href="#kontakt">Kontakt</a></li>
        <li><a href="rezervacije.html">Rezerviraj</a></li>
        <li id="google_translate_element"></li>
        <li class="language-dropdown">
          <a href="#" id="language-toggle">Jezik &#9662;</a>
          <div class="dropdown">
            <a href="#" onclick="changeLanguage('sl')">Slovenščina</a>
            <a href="#" onclick="changeLanguage('en')">English</a>
            <a href="#" onclick="changeLanguage('de')">Deutsch</a>
            <a href="#" onclick="changeLanguage('it')">Italiano</a>
          </div>
        </li>
      </ul>
    </nav>
  </header>
  <div class="status">
    <div class="step completed">1. datum Nastanitve</div>
    <div class="step completed">2. podatki uporabnika</div>
    <div class="step completed">3. potrditev</div>
  </div>
  
  <h2 id="naslov1">Potrditev rezervacije</h2>
  <div id="posavitev">
    <form action="" method="post">
      <!-- Skrita polja za vse podatke -->
      <input type="hidden" id="od_dan" name="od_dan" value="<?php echo $od_dan; ?>">
      <input type="hidden" id="do_dan" name="do_dan" value="<?php echo $do_dan; ?>">
      <input type="hidden" id="ime" name="ime" value="<?php echo $ime; ?>">
      <input type="hidden" id="priimek" name="priimek" value="<?php echo $priimek; ?>">
      <input type="hidden" id="naslov" name="naslov" value="<?php echo $naslov; ?>">
      <input type="hidden" id="postna_stevilka" name="postna_stevilka" value="<?php echo $postna_stevilka; ?>">
      <input type="hidden" id="email" name="email" value="<?php echo $email; ?>">
      <input type="hidden" id="telefon" name="telefon" value="<?php echo $telefon; ?>">

      <div class="form-group">
        <label for="ime_display">Ime:</label>
        <input type="text" id="ime_display" value="<?php echo $ime; ?>" readonly>
      </div>
      
      <div class="form-group">
        <label for="priimek_display">Priimek:</label>
        <input type="text" id="priimek_display" value="<?php echo $priimek; ?>" readonly>
      </div>
      
      <div class="form-group">
        <label for="naslov_display">Naslov:</label>
        <input type="text" id="naslov_display" value="<?php echo $naslov; ?>" readonly>
      </div>
      
      <div class="form-group">
        <label for="postna_stevilka_display">Poštna številka:</label>
        <input type="text" id="postna_stevilka_display" value="<?php echo $postna_stevilka; ?>" readonly>
      </div>
      
      <div class="form-group">
        <label for="email_display">E-pošta:</label>
        <input type="email" id="email_display" value="<?php echo $email; ?>" readonly>
      </div>
      
      <div class="form-group">
        <label for="telefon_display">Telefon:</label>
        <input type="tel" id="telefon_display" value="<?php echo $telefon; ?>" readonly>
      </div>
      
      <div class="form-group">
        <label for="od_dan_display">Datum prihoda:</label>
        <input type="date" id="od_dan_display" value="<?php echo $od_dan; ?>" readonly>
      </div>
      
      <div class="form-group">
        <label for="do_dan_display">Datum odhoda:</label>
        <input type="date" id="do_dan_display" value="<?php echo $do_dan; ?>" readonly>
      </div>
      
      <a href="rezervacije_podatki.php?od_dan=<?php echo urlencode($od_dan); ?>&do_dan=<?php echo urlencode($do_dan); ?>&ime=<?php echo urlencode($ime); ?>&priimek=<?php echo urlencode($priimek); ?>&naslov=<?php echo urlencode($naslov); ?>&postna_stevilka=<?php echo urlencode($postna_stevilka); ?>&email=<?php echo urlencode($email); ?>&telefon=<?php echo urlencode($telefon); ?>" id="nazaj">nazaj</a>
      <input type="submit" value="Potrdi">
    </form>
  </div>

  

  <!--noga -->
  <footer id="kontakt">
    <div class="google-maps" >
      <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2772.8735298478597!2d14.292617515914002!3d46.05523107911261!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x477b5da8d90dffff%3A0x92ef632827ca98cf!2sRovtarske%20%C5%BDibr%C5%A1e%207a%2C%201373%20Rovte%2C%20Slovenija!5e0!3m2!1sen!2sus!4v1696857557053!5m2!1sen!2sus" 
        width="100%" 
        height="300" 
        style="border:1;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
      </iframe>
  </div>
  <div class="odmik">
    <div class="footer-container">
        <div class="column">
            <div class="logo2">
              <a href="#"><img src="slike/logo.svg"></a>
            </div>
            <div class="social-icons">
                <div class="social-item">
                    <a href="https://www.instagram.com" target="_blank">
                        <i class="fab fa-instagram"></i> Instagram
                    </a>
                </div>
                <div class="social-item">
                    <a href="https://www.facebook.com" target="_blank">
                        <i class="fab fa-facebook-f"></i> Facebook
                    </a>
                </div>
                <div class="social-item">
                    <a href="mailto:your-email@gmail.com">
                        <i class="fas fa-envelope"></i> glampingmia@gmail.com
                    </a>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="naslov">
                <p>Naslov: Rovtarske Žibrše 7a</p>
                <p>Poštna številka: 1373 Rovte</p>
                <p>Država: Slovenija</p>
            </div>
        </div>
        <div class="footer-links">
          <a href="#">DOMOV</a><br>
          <a href="#o_nas">O NAS</a><br>
          <a href="#storitve">STORITVE</a><br>
          <a href="#kontakt">KONTAKT</a>
        </div>
    </div>
    <hr>
    <div class="copyright">© Glamping Mia 2024</div>
  </div>
</footer>

<style>
  .form-group {
    margin-bottom: 15px;
  }
  .form-group label {
    display: block;
    font-weight: bold;
  }
  .form-group input {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
    background-color: #f9f9f9;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
</style>

</body>
</html>