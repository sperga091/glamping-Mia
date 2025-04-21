<?php
// Preberi datume iz URL parametra
$od_dan = isset($_GET['od_dan']) ? htmlspecialchars($_GET['od_dan']) : '';
$do_dan = isset($_GET['do_dan']) ? htmlspecialchars($_GET['do_dan']) : '';
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
    <div class="step">3. potrditev</div>
  </div>
  
  <div id="posavitev">
    <form id="userForm" action="rezervacije_potrditev.php" method="get">
      <!-- Skrita polja za datume -->
      <input type="hidden" id="od_dan" name="od_dan" value="<?php echo $od_dan; ?>">
      <input type="hidden" id="do_dan" name="do_dan" value="<?php echo $do_dan; ?>">

      <label for="ime">Ime:</label>
      <input type="text" id="ime" name="ime" required><br><br>
      
      <label for="priimek">Priimek:</label>
      <input type="text" id="priimek" name="priimek" required><br><br>
      
      <label for="naslov">Naslov:</label>
      <input type="text" id="naslov" name="naslov" required><br><br>
      
      <label for="postna_stevilka">Poštna številka:</label>
      <input type="text" id="postna_stevilka" name="postna_stevilka" required><br><br>
      
      <label for="email">E-pošta:</label>
      <input type="email" id="email" name="email" required><br><br>
      
      <label for="telefon">Telefon:</label>
      <input type="tel" id="telefon" name="telefon" required><br><br>
      
      <a href="rezervacije.php" id="nazaj">Nazaj</a>
      <input type="submit" value="Naprej">
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

</body>
</html>