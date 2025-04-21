<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="glamping, mia, glamping mia, mia glamping, glamping slo">
  <meta name="description" content="spletna stran glamping mia.">
  <meta name="author" content="glamping, Gasper Vrhunc, Nejc OP">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="domaca.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="icon" href="slike/logo.svg">
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
        <li><a href="rezervacije.php">Rezerviraj</a></li>
        <li id="google_translate_element"></li>
        <li class="language-dropdown">
          <a href="#" id="language-toggle">Jezik &#9662;</a> <!-- Language dropdown trigger -->
          <div class="dropdown">
            <a href="#" onclick="changeLanguage('sl')">Slovenščina</a> <!-- Slo -->
            <a href="#" onclick="changeLanguage('en')">English</a> <!-- Eng -->
            <a href="#" onclick="changeLanguage('de')">Deutsch</a> <!-- NEM -->
            <a href="#" onclick="changeLanguage('it')">Italiano</a> <!-- Ita -->
          </div>
        </li>
      </ul>
    </nav>
  </header>

  <!-- 1.slika -->
  <div class="container-slika1">
    <img src="slike/Slider1.png" alt="glamping" class="slika1">
    <div class="napis-slika1">
        <div class="napis">Počitek</div>
        <div class="napis">Udobje</div>
        <div class="napis">Stik z naravo</div>
    </div>
</div>

  <!-- o nas -->
  <div class="o_nas" id="o_nas" >
      <img src="slike/onas.jpg" alt="onas" class="slika2">
      <div class="napis-slika2"><h1>Ker srečo ustvarjamo s svojim rokami,<br>jo želimo deliti z vami</h1><hr>
      <div>Nastanitve Mia so novo ustanovljena dejavnost naše družine, ki želi gostom predstaviti neokrnjeno naravo notranjske, ki leži na geografski tromeji z goriško, 
        gorenjsko in ljubljansko pokrajino. Tu se prepletajo vetrovi, sončna lega, gozdovi polni rastlinstva in živalstva. Je odlično izhodišče za raziskovanje krasa in predalpskega 
        podnebja, kot tudi malo bolj oddaljenih mest Idrije, Vrhnike, Postojne, Ljubljane,…. Poleg nastanitev skrbimo tudi za domače živali, predvsem kokoši ter za domače izdelke 
        zelenjave, sadja in mesne proizvode.</div></div>
  </div>


  <script>
    // Funkcionalnost hamburger menija
    const menuToggle = document.querySelector('.menu-toggle');
    const navLinks = document.querySelector('nav ul');

    menuToggle.addEventListener('click', () => {
      menuToggle.classList.toggle('active');
      navLinks.classList.toggle('active');
    });
  </script>

  <!--storitve-->
  <hr>  
  <div class="Storitve" id="storitve">
    <h1 id="storitve_naslov">Storitve</h1>
    <div class="Storitve_container">
        <div class="Storitve_vsebina">
            <h2>Nastanitve</h2>
            <div>Mobilne hiške združujejo udobje z naravo, saj ponujajo samostojne enote z velikimi terasami in z možnostjo domačega zajtrka, uporabo zunanje savne in sproščanje v bližnji oazi samorastnih brez. Idealne so za romantične vikende, družinske počitnice ali aktivne oddihe, kjer lahko ustvarite nepozabne spomine.</div>
            <img src="slike/storitve/Nastanitve.jpeg" alt="glamping"><br>
            <a href="#">VEČ</a>
        </div>
        <div class="Storitve_vsebina">
            <h2>Aktivnosti</h2>
            <div>Mobilne hiške so odlično izhodišče za kolesarjenje, pohodništvo, ogled naravnih in kulturnih znamenitosti bližnje in daljne okolice. Le nekaj kilometrov je oddaljena znamenitost »Dinozavrove stopinje«. Nepozabno doživetje je tudi obisk Žejne doline, kjer se nahaja mesojeda rastlino imenovana Rosika.</div>
            <img src="slike/storitve/Aktivnosti.png" alt="terapija s čebelami"><br>
            <a href="#">VEČ</a>
        </div>
        <div class="Storitve_vsebina">
            <h2>Ostala ponudba</h2>
            <div>V naši ponudbi je tudi terapija s čebelami, ali apiterapija, ki lajša težave, kot so alergije in vnetja. Srečanja s čebelami omogočajo povezovanje z naravo ter prinašajo občutek miru in zmanjšanje stresa. Dejstvo, da smo odmaknjeni od mest, nam še toliko bolj daje občutek čiste in neokrnjene narave, kar se dokazuje s kvaliteto čebeljih izdelkov.</div>
            <img src="slike/storitve/Ostala ponudba.jpg" alt="kulinarika"><br>
            <a href="#">VEČ</a>
        </div>
    </div>
</div>





  <!--noga -->
  <footer id="kontakt">
    <div class="google-maps" >
      <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2772.8735298478597!2d14.292617515914002!3d46.05523107911261!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x477b5da8d90dffff%3A0x92ef632827ca98cf!2sRovtarske%20%C5%BDibr%C5%A1e%207a%2C%201373%20Rovte%2C%20Slovenia!5e0!3m2!1sen!2sus!4v1696857557053!5m2!1sen!2sus" 
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