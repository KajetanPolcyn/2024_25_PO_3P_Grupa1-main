<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Logowanie</title>
	<link rel="stylesheet" href="../styles/style_sign_up.css" />
</head>

<body>
	<header>
		<!-- <article class="header-left">
			<h1>REN<br> T4₵</h1>
			<a href="zaloguj.html"><img src="assets/icon/facebook.png" alt="logowanie"></a>
		</article> -->
		<nav>
			<ul>
				<li><a href="../index.php">Główna</a></li>
				<li><a href="../index.php#onas">O nas</a></li>
				<li><a href="rezerwacja.php">Rezerwacja</a></li>
				<li><a href="kontakt.html">Kontakt</a></li>
			</ul>
		</nav>
	</header>

	<section id="rejestracja">
		<h2>ZAREJESTRUJ SIĘ</h2>
		<form action="../api/users/signup.inc.php" method="post">
			<input name="fname" type="text" placeholder="Imię" /><br />
			<input name="lname" type="text" placeholder="Nazwisko" /><br />
			<input name="email" type="text" placeholder="Email" /><br />
			<input name="uid" type="text" placeholder="Username" /><br />
			<input name="pwd" type="password" placeholder="Hasło" /><br />
			<input name="pwdrepeat" type="password" placeholder="Powtórz hasło" /><br />
			<input name="submit" value="Zarejestruj się" type="submit" />
			<div id="zarejestruj-zaloguj"><a href="zaloguj.php">ZALOGUJ</a></div>
		</form>

		<div class="form__messages">
			<?php
			if (isset($_GET['error'])) {
				if ($_GET['error'] == "emptyinput") {
					echo "<p>Fill in all fields!</p>";
				} else if ($_GET['error'] == "invaliduid") {
					echo "<p>Choose a proper username!</p>";
				} else if ($_GET['error'] == "invalidemail") {
					echo "<p>Choose a proper email!</p>";
				} else if ($_GET['error'] == "passwordsdontmatch") {
					echo "<p>Passwords doesn't match!</p>";
				} else if ($_GET['error'] == "stmtfailed") {
					echo "<p>Something went wrong, try again!</p>";
				} else if ($_GET['error'] == "usernametaken") {
					echo "<p>Username already taken!</p>";
				} else if ($_GET['error'] == "none") {
					header("location: zaloguj.php");
				}
			}
			?>

			<!-- <article id="sociale">
			<img src="../assets/icon/facebook.png" alt="Facebook">
			<img src="../assets/icon/facebook.png" alt="GitHub">
			<img src="../assets/icon/facebook.png" alt="Gmail">
			<img src="../assets/icon/facebook.png" alt="LinkedIn">
			<img src="../assets/icon/facebook.png" alt="Twitter">
			<img src="../assets/icon/facebook.png" alt="Nie mam kurcze pojecia co to jest">
		</article> -->
			<p>
				Rejestrując się Pan(i) przyjmuje
				<a href="politka.txt">Warunki i politykę prywatności</a>
			</p>
	</section>
</body>

</html>