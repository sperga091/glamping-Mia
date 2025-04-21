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
    <div class="step completed">1. Datum nastanitve</div>
    <div class="step">2. Podatki uporabnika</div>
    <div class="step">3. Potrditev</div>
  </div>
  
  <div class="calendar">
    <div class="header">
        <button id="prev">Prejšnji mesec</button>
        <h2 id="monthYear"></h2>
        <button id="next">Naslednji mesec</button>
    </div>
    <div class="weekdays">
        <div>Pon</div>
        <div>Tor</div>
        <div>Sre</div>
        <div>Čet</div>
        <div>Pet</div>
        <div>Sob</div>
        <div>Son</div>
    </div>
    <div id="days" class="days"></div>
  </div>

  <a href="#" id="Naprej">Naprej</a>

  <script>
    const monthNames = ["Januar", "Februar", "Marec", "April", "Maj", "Junij", "Julij", "Avgust", "September", "Oktober", "November", "December"];
    const weekdays = ["Pon", "Tor", "Sre", "Čet", "Pet", "Sob", "Son"];

    let currentDate = new Date();
    let selectedDates = [];

    function isDateInRange(date, startDate, endDate) {
        return date >= startDate && date <= endDate;
    }

    function renderCalendar() {
        const monthYearLabel = document.getElementById("monthYear");
        const daysContainer = document.getElementById("days");

        const currentMonth = currentDate.getMonth();
        const currentYear = currentDate.getFullYear();

        monthYearLabel.textContent = `${monthNames[currentMonth]} ${currentYear}`;

        const firstDayOfMonth = new Date(currentYear, currentMonth, 1);
        const lastDateOfMonth = new Date(currentYear, currentMonth + 1, 0);
        const lastDayOfMonth = lastDateOfMonth.getDate();

        let firstDayWeekday = firstDayOfMonth.getDay();
        firstDayWeekday = firstDayWeekday === 0 ? 7 : firstDayWeekday; // Adjust Sunday from 0 to 7

        daysContainer.innerHTML = '';

        // Add empty cells for days before the first day of the month
        for (let i = 1; i < firstDayWeekday; i++) {
            const emptyDay = document.createElement("div");
            emptyDay.classList.add("day", "disabled");
            daysContainer.appendChild(emptyDay);
        }

        // Add the days of the month
        for (let day = 1; day <= lastDayOfMonth; day++) {
            const dayElement = document.createElement("div");
            dayElement.classList.add("day");
            dayElement.textContent = day;

            const currentDayDate = new Date(currentYear, currentMonth, day);

            // Handle selected dates and range
            if (selectedDates.length > 0) {
                if (selectedDates.length === 1) {
                    if (currentDayDate.getTime() === selectedDates[0].getTime()) {
                        dayElement.classList.add("selected");
                    }
                } else if (selectedDates.length === 2) {
                    const [startDate, endDate] = selectedDates[0] < selectedDates[1] ? 
                        [selectedDates[0], selectedDates[1]] : 
                        [selectedDates[1], selectedDates[0]];

                    if (isDateInRange(currentDayDate, startDate, endDate)) {
                        dayElement.classList.add("range");
                    }
                    if (currentDayDate.getTime() === startDate.getTime() || 
                        currentDayDate.getTime() === endDate.getTime()) {
                        dayElement.classList.add("selected");
                    }
                }
            }

            dayElement.addEventListener("click", () => {
                const clickedDate = new Date(currentYear, currentMonth, day);

                if (selectedDates.length === 0) {
                    selectedDates.push(clickedDate);
                } else if (selectedDates.length === 1) {
                    selectedDates.push(clickedDate);
                    if (selectedDates[0] > selectedDates[1]) {
                        selectedDates.reverse();
                    }
                } else {
                    selectedDates = [clickedDate];
                }
                renderCalendar();
            });

            daysContainer.appendChild(dayElement);
        }
    }

    document.getElementById("prev").addEventListener("click", () => {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar();
    });

    document.getElementById("next").addEventListener("click", () => {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar();
    });

    document.getElementById("Naprej").addEventListener("click", () => {
        if (selectedDates.length !== 2) {
            alert("Prosimo, izberite oba datuma (prihod in odhod).");
            return;
        }
        const od_dan = selectedDates[0].toISOString().split('T')[0];
        const do_dan = selectedDates[1].toISOString().split('T')[0];
        window.location.href = `rezervacije_podatki.php?od_dan=${encodeURIComponent(od_dan)}&do_dan=${encodeURIComponent(do_dan)}`;
    });

    renderCalendar();
  </script>

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