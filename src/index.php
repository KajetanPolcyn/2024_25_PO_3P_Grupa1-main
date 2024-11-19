<?php
session_start();
require_once "api/database.php";
require_once "api/users/functions.inc.php";

$con = dbConnect();
?>

<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Rent 4 Cent</title>
	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
</head>

<body>
	<!-- Menu ----------------------- -->
	<header>
		<article class="header-left">
			<h1>
                <a href="index.php" style="text-decoration:none;color:white;">
					REN<br />
					T4₵
				</a>
            </h1>
			<?php
			if (isset($_SESSION["userid"]) && isAdmin($con, $_SESSION["userid"])) {
				echo '<li><a href="api/users/admin.php">Go to Admin Panel</a></li>';
			}
			if (isset($_SESSION["useruid"])) {
				echo "<li><a href='api/users/logout.inc.php'>Wyloguj się</a></li>";
			} else {
				echo "<a href='sites/zaloguj.php'><img src='assets/icon/facebook.png' alt='logowanie' /></a>";
			}
			?>

		</article>
		<nav>
			<ul>
				<li><a href="index.php#onas">O nas</a></li>
				<li><a href="sites/rezerwacja.php">Rezerwacja</a></li>
				<li><a href="sites/kontakt.html">Kontakt</a></li>
				<li>
					<form action="sites/jezyki.html" method="post">
						<input type="submit" value="PL" />
					</form>
				</li>
			</ul>
		</nav>
	</header>
	<!-- Główny Blok ---------------------- -->
	<section id="main_block">
		<section id="main_block_left">
			<h1>RENT 4<br />&nbsp;CENT</h1>
			<button>
				<a href="sites/rezerwacja.php">REZERWACJA
					<img src="assets/icon/button-strzalka.png" alt="strzalka" /></a>
			</button>
			<p></p>
		</section>
		<section id="main_block_right">
			<section id="main_image_block">
				<img src="assets/pictures/pictureone.jpg" alt="slider" />
			</section>
		</section>
	</section>
	<!-- Rezerwacja------------------- -->
	<section style="clear: both" id="reservation_block">
		<article id="search">
			<form action="rezerwacja.php" method="get">
				<article class="search-bar">
					<ul>
						<li>
							<div class="input-container">
								<label for="location" class="input-label">Miejsce</label>
								<input type="text" id="location" class="text-input" placeholder="Miasto,hotel itd." />
							</div>
						</li>
						<li>
							<div class="input-container">
								<label for="od" class="input-label">Od</label>
								<input type="date" id="od" class="text-input" value="2024-07-26" />
							</div>
						</li>
						<li>
							<div class="input-container">
								<label for="do" class="input-label">Do</label>
								<input type="date" id="do" class="text-input" value="2024-07-27" />
							</div>
						</li>
						<li>
							<div class="input-container">
								<label for="gosci" class="input-label">Ile Osób</label>
								<select name="gosci" id="gosci">
									<option value="1os">1 Osobowy</option>
									<option value="2os">2 Osobowy</option>
									<option value="3os">3 Osobowy</option>
									<option value="4os">4 Osobowy</option>
									<option value="5os">5 Osobowy</option>
								</select>
							</div>
						</li>
						<li>
							<div class="input-container">
								<label for="gosci" class="input-label">Jaki standard</label>
								<select name="gosci" id="gosci">
									<option value="1os">Standardowy</option>
									<option value="2os">Biznes</option>
									<option value="3os">Prezydencki</option>
								</select>
							</div>
						</li>
						<li>
							<button class="search-button">Szukaj</button>
						</li>
					</ul>
				</article>
			</form>
		</article>
		<article id="newsletter">
			<img src="assets/pictures/picturetwo.jpg" alt="zatoka" />
			<article id="news">
				<span id="wieksze">TRAVEL CHEAPER</span><br /><br />
				<p>Dowiedz się pierwszy o nowych akcjach i zniżkach</p>
				<br /><br />
				<form action="" method="post">
					<ul>
						<li>
							<div class="input-container">
								<label for="email" class="input-label">E-mail</label>
								<input type="text" id="email" class="text-input" placeholder="example@gmail.com" />
							</div>
						</li>
						<li>
							<button class="obs-button">Obserwuj</button>
						</li>
					</ul>
					<br />
					<label for="check_news"><input type="checkbox" name="check_news" id="check_news" />Wyrażam zgodę aby
						otrzymywać oferty</label>
				</form>
			</article>
		</article>
		<!-- Najlepsze...(chyba) -->
		<article id="best">
        <div class="swiper mySwiper">
            <div class="container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="box">
                            <div class="img">
                                <img src="assets/pictures/pictureone.jpg" alt="img">
                            </div>
                            <div class="info">
                                <h3>Hotel EUROPA</h3>
                                <h4>Warszawa, 3.6 km od centrum</h4>
                                <br><br><hr><br>
                                <div class="zanoc">
                                    <h3>Od 1570zł za noc</h3>
                                    <form action="sites/szczegoly.php" method="post"  class="submit_best" >
                                        <input type="submit" value="+">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="box">
                            <div class="img">
                                <img src="assets/pictures/pictureone.jpg" alt="img">
                            </div>
                            <div class="info">
                                <h3>Hotel EUROPA</h3>
                                <h4>Warszawa, 3.6 km od centrum</h4>
                                <br><br><hr><br>
                                <div class="zanoc">
                                    <h3>Od 1570zł za noc</h3>
                                    <form action="sites/szczegoly.php" method="post" class="submit_best" >
                                        <input type="submit" value="+">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="box">
                            <div class="img">
                                <img src="assets/pictures/pictureone.jpg" alt="img">
                            </div>
                            <div class="info">
                                <h3>Hotel EUROPA</h3>
                                <h4>Warszawa, 3.6 km od centrum</h4>
                                <br><br><hr><br>
                                <div class="zanoc">
                                    <h3>Od 1570zł za noc</h3>
                                    <form action="sites/szczegoly.php" method="post" class="submit_best" >
                                        <input type="submit" value="+">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="box">
                            <div class="img">
                                <img src="assets/pictures/pictureone.jpg" alt="img">
                            </div>
                            <div class="info">
                                <h3>Hotel EUROPA</h3>
                                <h4>Warszawa, 3.6 km od centrum</h4>
                                <br><br><hr><br>
                                <div class="zanoc">
                                    <h3>Od 1570zł za noc</h3>
                                    <form action="sites/szczegoly.php" method="post" class="submit_best" >
                                        <input type="submit" value="+" >
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="box">
                            <div class="img">
                                <img src="assets/pictures/pictureone.jpg" alt="img">
                            </div>
                            <div class="info">
                                <h3>Hotel EUROPA</h3>
                                <h4>Warszawa, 3.6 km od centrum</h4>
                                <br><br><hr><br>
                                <div class="zanoc">
                                    <h3>Od 1570zł za noc</h3>
                                    <form action="sites/szczegoly.php" method="post" class="submit_best" >
                                        <input type="submit" value="+">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="box">
                            <div class="img">
                                <img src="assets/pictures/pictureone.jpg" alt="img">
                            </div>
                            <div class="info">
                                <h3>Hotel EUROPA</h3>
                                <h4>Warszawa, 3.6 km od centrum</h4>
                                <br><br><hr><br>
                                <div class="zanoc">
                                    <h3>Od 1570zł za noc</h3>
                                    <form action="sites/szczegoly.php" method="post" class="submit_best" >
                                        <input type="submit" value="+">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="box">
                            <div class="img">
                                <img src="assets/pictures/pictureone.jpg" alt="img">
                            </div>
                            <div class="info">
                                <h3>Hotel EUROPA</h3>
                                <h4>Warszawa, 3.6 km od centrum</h4>
                                <br><br><hr><br>
                                <div class="zanoc">
                                    <h3>Od 1570zł za noc</h3>
                                    <form action="sites/szczegoly.php" method="post" class="submit_best">
                                        <input type="submit" value="+">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="box">
                            <div class="img">
                                <img src="assets/pictures/pictureone.jpg" alt="img">
                            </div>
                            <div class="info">
                                <h3>Hotel EUROPA</h3>
                                <h4>Warszawa, 3.6 km od centrum</h4>
                                <br><br><hr><br>
                                <div class="zanoc">
                                    <h3>Od 1570zł za noc</h3>
                                    <form action="sites/szczegoly.php" method="post" class="submit_best" >
                                        <input type="submit" value="+">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-pagination"></div>
                </div>
               
        
       
        
 
     </article>
	</section>
	<section id="onas">
		<section id="onas_left">
			<h1>O NAS</h1>
			<span class="tekst">
				<h4>Najlepsze ceny</h4>
				<br />
				<p>
					Nasze ceny są pod ścisłą kontrolą, ponieważ współpracujemy z
					tysiącami hoteli i bezpośrednio kilkudziesięciu dostawców. To także
					oznacza, że zawsze mamy świetne oferty dla większości kierunków.
				</p>
			</span>
			<span class="tekst">
				<h4>Hotele na całym świecie</h4>
				<br />
				<p>
					Mamy ponad 100 opcji noclegów na całym świecie . Dotyczy to hoteli,
					hosteli, apartamentów, willi a nawet kempingów Znajdź odpowiednie
					zakwaterowanie w dowolnym terminie rok.
				</p>
			</span>
			<span class="tekst">
				<h4>Obsługa klienta 24/7</h4>
				<br />
				<p>
					Nasi specjaliśći wsparcia Ci w tym pomogą, wybiorą hotel i
					zarezerwują go. Jeśli masz problem podczas Twojej podróży , nasz
					specjalista będzie online i znajdzie rozwiązanie pod Twój czas
				</p>
			</span>
		</section>
		<section id="onas_right">
			<section id="onas_image_block">
				<img src="assets/pictures/picturetwo.jpg" alt="slider" />
			</section>
		</section>
	</section>
	<footer id="kontakt_block">
		<article id="numer_kontakt">
			<article id="numer_kontakt2">
				<h2>+48 780 560 350</h2>
				<br />
				<article id="sociale">
					<img src="assets/icon/inst.png" alt="instagram" />
					<img src="assets/icon/facebook.png" alt="facebook" />
					<img src="assets/icon/twitter.png" alt="twitter" />
				</article>
			</article>
		</article>
		<article id="email_kontakt">
			<h2>rent4cent@gmail.com</h2>
			<br /><br />
			<hr />
			<h3><a href="#">Privacy Policy</a></h3>
			<h3>Recommendation technologies are used</h3>
		</article>
	</footer>

	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
   <script>
    let swiper = new Swiper(".container", {
        slidesPerView:3,
        spaceBetween:30,
        grabCursor: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el:".swiper-pagination",
            clickable:true,
            dynamicBullets:true,
        }
    });
   </script>
</body>

</html>