<?php

session_start();

// ========== DATABASE ========== 
require_once "../api/database.php";
$con = dbConnect();
if (!$con) {
	die("<h2>Brak połączenia z bazą danych...</h2><br>Proszę spróbć później.");
}

// ========== SEARCH SYSTEM ========== 
$search = false;

// Standards
$standards = ["std", "biz", "pre"];

// Get previous values
if (isset($_GET['search_text'])) {
	$search_text = $_GET['search_text'];
	$search = true;
} else {
	$search_text = "";
}

if (isset($_GET['search_from']) && preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $_GET['search_from'])) {
	$search_from = $_GET['search_from'];
	$search = true;
} else {
	$search_from = date("Y-m-d");
}

if (isset($_GET['search_to']) && preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $_GET['search_to'])) {
	$search_to = $_GET['search_to'];
	$search = true;
} else {
	$search_to = date_add(date_create(), date_interval_create_from_date_string("7 day"))->format("Y-m-d");
}

if (isset($_GET['search_guests'])) {
	$search_guests = $_GET['search_guests'];
	$search = true;
} else {
	$search_guests = 1;
}

if (isset($_GET['search_standard']) && in_array($_GET['search_standard'], $standards)) {
	$search_standard = $_GET['search_standard'];
	$search = true;
} else {
	$search_standard = "std";
}

// ========== GET OFFERS ========== 

// Get Featured offers
require_once "../api/offers/read-functions.php";
if (isset($_POST["offers_number"]) && is_numeric($_POST["offers_number"]) && $_POST["offers_number"] > 0) {
	if ($_POST["offers_number"] != "max")
		$offers_number = $_POST["offers_number"];
} else {
	$offers_number = 10;
}

if (!$search) {
	$featured_offers = getFeaturedOffers($con, $offers_number);
} else {
	$s_text = ($search_text == "") ? "%" : $search_text;
	$s_from = ($search_from == "") ? "%" : $search_from;
	$s_to = ($search_to == "") ? "%" : $search_to;
	$s_guests = ($search_guests == "") ? "%" : $search_guests;
	$s_standard = ($search_standard == "") ? "%" : $search_standard;

	$featured_offers = getSearchedOffers($con, $offers_number, $s_text); // TO Change when reservations
}

// Offers with desciption
if (isset($_POST["offers_with_desc_number"]) && is_numeric($_POST["offers_with_desc_number"]) && $_POST["offers_with_desc_number"] > 0) {
	if ($_POST["offers_with_desc_number"] != "max")
		$offers_with_desc_number = $_POST["offers_with_desc_number"];
} else {
	$offers_with_desc_number = 3;
}
$offers_with_desc = getOffersWithDescription($con, $offers_with_desc_number);
?>

<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Rent 4 Cent</title>
	<link rel="stylesheet" href="../styles/style_rezerwacja.css" />
</head>

<body>
	<!-- Menu ----------------------- -->
	<header>
		<article class="header-left">
			<h1>
                <a href="../index.php" style="text-decoration:none;color:white;">
					REN<br />
					T4₵
				</a>
            </h1>
			<a href="zaloguj.php"><img src="../assets/icon/facebook.png" alt="logowanie" /></a>
		</article>
		<nav>
			<ul>
				<li><a href="../index.php#onas">O nas</a></li>
				<li><a href="rezerwacja.php">Rezerwacja</a></li>
				<li><a href="kontakt.html">Kontakt</a></li>
				<li>
					<form action="jezyki.html" method="post">
						<input type="submit" value="PL" />
					</form>
				</li>
			</ul>
		</nav>
	</header>

	<!-- Rezerwacja------------------- -->
	<section style="clear: both" id="wyszukiwanie">
		<article id="search">
			<!-- special action to avoid clearing search form -->
			<form action="?<?php echo http_build_query($_GET); ?>" method="get">
				<article class="search-bar">
					<ul>
						<li>
							<div class="input-container">
								<label for="location" class="input-label">Miejsce</label>
								<input type="text" id="location" class="text-input" placeholder="Miasto, hotel itd."
									name="search_text" value="<?= $search_text ?>" />
							</div>
						</li>
						<li>
							<div class="input-container">
								<label for="od" class="input-label">Od</label>
								<input min="<?= date("Y-m-d") ?>" type="date" id="od" class="text-input"
									value="<?= $search_from ?>" name="search_from" />
							</div>
						</li>
						<li>
							<div class="input-container">
								<label for="do" class="input-label">Do</label>
								<input
									min="<?= date_add(date_create(), date_interval_create_from_date_string("1 day"))->format("Y-m-d") ?>"
									type="date" id="do" class="text-input" value="<?= $search_to ?>" name="search_to" />
							</div>
						</li>
						<li>
							<div class="input-container">
								<label for="gosci" class="input-label">Ile Osób</label>
								<select name="search_guests" id="gosci">
									<?php for ($i = 1; $i < 5; $i++): ?>
										<option value="<?= $i ?>" <?= ($search_guests == $i) ? 'selected' : '' ?>>
											<?= $i ?> Osobowy
										</option>
									<?php endfor; ?>
								</select>
							</div>
						</li>
						<li>
							<div class="input-container">
								<label for="standard" class="input-label">Jaki standard</label>
								<select name="search_standard" id="standard">
									<?php foreach ($standards as $standard): ?>
										<option value="<?= $standard ?>" <?= ($search_standard == $standard) ? 'selected' : '' ?>>
											<?php if ($standard == "std")
												echo "Standardowy";
											else if ($standard == "biz")
												echo "Biznes";
											else
												echo "Prezydencki"; ?>
										</option>
									<?php endforeach; ?>
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
	</section>
	<section id="proponowane">
		<?php foreach ($featured_offers as $offer) { ?>
			<article class="propozycja">
				<img src="../assets/thumbnails/<?= $offer->thumbnail ?>" alt="Zdjęcie hotelu" /><br />
				<div class="proponowane_tekst">
					<h3><?= $offer->name ?></h3>
					<h4><?= $offer->city ?>, <?= $offer->country ?></h4>
					<br />
					<hr />
					<br />
					<div class="zanoc">
						<h3>Od <?= intval($offer->day_price_pln) ?>zł za noc</h3>
						<form action="szczegoly.php?id=<?= $offer->id ?>" method="post">
							<input type="submit" value="+" />
						</form>
					</div>
				</div>
			</article>
		<?php } ?>

		<form action="" method="post" style="width: 100%; display: flex; justify-content: center; gap: 10px">
			Wyświetlane oferty:
			<select name="offers_number" id="offers_number" onchange="this.form.submit()">
				<option value="3" <?php if ($offers_number == 3)
					echo "selected" ?>>3</option>
					<option value="5" <?php if ($offers_number == 5)
					echo "selected" ?>>5</option>
					<option value="10" <?php if ($offers_number == 10)
					echo "selected" ?>>10</option>
					<option value="20" <?php if ($offers_number == 20)
					echo "selected" ?>>20</option>
					<option value="50" <?php if ($offers_number == 50)
					echo "selected" ?>>50</option>
					<option value="100" <?php if ($offers_number == 100)
					echo "selected" ?>>100</option>
				</select>
			</form>
		</section>

		<section id="opisy">
			<hr />
		<?php foreach ($offers_with_desc as $key => $offer) { ?>
			<article class="zakladka">
				<div class="zakladka_image">
					<img src="../assets/thumbnails/<?= $offer->thumbnail ?>" alt="Zdjęcie hotelu" />
				</div>

				<div class="zakladka_tekst">
					<h2><?= $offer->name ?></h2>
					<h3><?= $offer->city ?>, <?= $offer->country ?></h3>
					<br />
					<p>
						<?= substr($offer->description, 0, 320) ?>...
					</p>
					<br />
					<div class="przyciski_zakladka">
						<button class="button1">
							<a href="szczegoly.php?id=<?= $offer->id ?>">Od <?= intval($offer->day_price_pln) ?>zł za
								noc</a>
						</button>
						<button class="button2">
							<a href="szczegoly.php?id=<?= $offer->id ?>">Szczegóły</a>
						</button>
					</div>
				</div>
			</article>

			<?php if ($key % 2 == 1 && $key != $offers_with_desc_number - 1)
				echo "<hr />"; ?>
		<?php } ?>

		<form action="" method="post" style="width: 100%; display: flex; justify-content: center; gap: 10px">
			Wyświetlane oferty:
			<select name="offers_with_desc_number" id="offers_with_desc_number" onchange="this.form.submit()">
				<option value="3" <?php if ($offers_with_desc_number == 3)
					echo "selected" ?>>3</option>
					<option value="5" <?php if ($offers_with_desc_number == 5)
					echo "selected" ?>>5</option>
					<option value="10" <?php if ($offers_with_desc_number == 10)
					echo "selected" ?>>10</option>
					<option value="20" <?php if ($offers_with_desc_number == 20)
					echo "selected" ?>>20</option>
					<option value="50" <?php if ($offers_with_desc_number == 50)
					echo "selected" ?>>50</option>
					<option value="100" <?php if ($offers_with_desc_number == 100)
					echo "selected" ?>>100</option>
				</select>
			</form>
		</section>
		<footer id="kontakt_block">
			<article id="numer_kontakt">
				<article id="numer_kontakt2">
					<h2>+48 780 560 350</h2>
					<br />
					<article id="sociale">
						<img src="../assets/icon/inst.png" alt="instagram" />
						<img src="../assets/icon/facebook.png" alt="facebook" />
						<img src="../assets/icon/twitter.png" alt="twitter" />
					</article>
				</article>
			</article>
			<article id="email_kontakt">
				<h2>rent4cent@gmail.com</h2>
				<br /><br />
				<hr />
				<h3><a href="privacy.txt">Privacy Policy</a></h3>
				<h3>Recommendation technologies are used</h3>
			</article>
		</footer>
	</body>

	</html>

	<?php

				// DB Disconnect
				mysqli_close($con);

				?>