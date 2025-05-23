<header>
        <nav class="navbar">
            <div class="logo"><a href="homepage.php"><img src="photo/photo_login/logo.png" alt="G.S. MINORI"></a></div>
            <ul class="nav-links">
                <li class="dropdown">
                    <a href="news_new.php">News</a>
                    <ul class="dropdown-menu">
                        <li><a href="news_new.php#ultime_news">Tutte le News</a></li>
                        <li><a href="news_new.php#foto_gallery">Foto Gallery</a></li>
                        <li><a href="news_new.php#video">Video</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="club.php">Club</a>
                    <ul class="dropdown-menu">
                        <li><a href="club.php#chi-siamo">Chi Siamo</a></li>
                        <li><a href="club.php#staff">Staff</a></li>
                        <li><a href="club.php#storia">Storia</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="teams.php">Teams</a>
                    <ul class="dropdown-menu">
                        <li><a href="teams.php">Prima squadra maschile</a></li>
                        <li><a href="u19silver.php">U19 Silver</a></li>
                        <li><a href="u17libertas.php">U17 Libertas</a></li>
                        <li><a href="u13libertas.php">U13 Libertas</a></li>
                        <li><a href="minibasket.php">Minibasket</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="stagione.php">Stagione</a>
                    <ul class="dropdown-menu">
                        <li><a href="stagione.php#calendario">Calendario</a></li>
                        <li><a href="risultati.php">Risultati</a></li>
                        <li><a href="stagione.php#classifica">Classifica</a></li>
                    </ul>
                </li>
                <li>
                    <a href="shop.php">Shop</a>
                </li>
                <li class="dropdown">
                    <a href="fan.php">Fan</a>
                    <ul class="dropdown-menu">
                        <li><a href="fan.php#community">Community</a></li>
                        <li><a href="fan.php#concorsi">Concorsi</a></li>
                    </ul>
                </li>
                <li><a href="tickets.php" class="ticket-btn"><img src="photo/photo_header/ticket.png" alt="ticketphoto">Tickets</a></li>
                <li class="dropdown">
                    <a href="login.php" class="login-btn"><img src="photo/photo_header/user.png" alt="userphoto">Login</a>
                    <ul class="dropdown-menu" id="login_dropdown">
                        <li><a href="impostazioni_profilo.php">Impostazioni profilo</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </li>
                </ul>
                <div class="hamburger">
                    <img src="photo/photo_header/hamburger_menu.png" alt="hamburger_menu" id="hamburger_menu">
                 </div>
        </nav>
 </header>
 <script>
  document.addEventListener('DOMContentLoaded', () => {
    const hamburger = document.querySelector('.hamburger');
    const navLinks = document.querySelector('.nav-links');

    hamburger.addEventListener('click', () => {
      navLinks.classList.toggle('active_nav');
    });
  });
</script>
 <?php require 'login_header.php'?>