<?php

// Check for ID in url
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (!is_numeric($id) || $id < 0 || !$id || strlen($id) > 11) {
        header('location: ./index.php');
        die();
    }
} else {
    header('location: ./index.php');
    die();
}

// Values in form
$search_from = date("Y-m-d");
$search_to = date_add(date_create(), date_interval_create_from_date_string("7 day"))->format("Y-m-d");

// Get offer
require_once "../api/database.php";
require_once "../api/offers/read-functions.php";

$con = dbConnect();
if (!$con) {
    die("<h2>Brak połączenia z bazą danych...</h2><br>Proszę spróbć później.");
}

$offer = getFullOffer($con, $id);
if (!$offer) {
    header('location: ./rezerwacja.php');
    die();
}
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent 4 Cent</title>
    <link rel="stylesheet" href="../styles/style_szczegoly.css">
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
            <a href="zaloguj.php"><img src="../assets/icon/facebook.png" alt="logowanie"></a>
        </article>
        <nav>
            <ul>


                <li><a href="../index.php#onas">O nas</a></li>
                <li><a href="rezerwacja.php">Rezerwacja</a></li>
                <li><a href="kontakt.html">Kontakt</a></li>
                <li>
                    <form action="jezyki.html" method="post"><input type="submit" value="PL"></form>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Rezerwacja------------------- -->
    <section style="clear: both;" id="wyszukiwanie">

        <article id="search">
            <form action="./rezerwacja.php" method="get">
                <article class="search-bar">
                    <ul>
                        <li>
                            <div class="input-container">
                                <label for="location" class="input-label">Miejsce</label>
                                <input type="text" id="location" class="text-input" name="search_text"
                                    placeholder="Miasto, hotel itd.">
                            </div>
                        </li>
                        <li>
                            <div class="input-container">
                                <label for="od" class="input-label">Od</label>
                                <input type="date" id="od" class="text-input" name="search_from"
                                    min="<?= $search_from ?>" value="<?= $search_from ?>">
                            </div>
                        </li>
                        <li>
                            <div class="input-container">
                                <label for="do" class="input-label">Do</label>
                                <input type="date" id="do" class="text-input" name="search_to"
                                    min="<?= date_add(date_create(), date_interval_create_from_date_string("1 day"))->format("Y-m-d") ?>"
                                    value="<?= $search_to ?>">
                            </div>
                        </li>
                        <li>
                            <div class="input-container">
                                <label for="gosci" class="input-label">Ile Osób</label>
                                <select name="search_guests" id="gosci">
                                    <option value="1">1 Osobowy</option>
                                    <option value="2">2 Osobowy</option>
                                    <option value="3">3 Osobowy</option>
                                    <option value="4">4 Osobowy</option>
                                    <option value="5">5 Osobowy</option>
                                </select>
                            </div>
                        </li>
                        <li>

                            <div class="input-container">
                                <label for="gosci" class="input-label">Jaki standart</label>
                                <select name="search_standard" id="gosci">
                                    <option value="std">Standardowy</option>
                                    <option value="biz">Biznes</option>
                                    <option value="pre">Prezydencki</option>
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
    <section id="szczegoly_hoteli">
        <section class="block_main">
            <section class="lewy_blok">
                <img src="../assets/thumbnails/<?= $offer->thumbnail ?>" alt="Obraz 3" class="lewy_blok_img">
            </section>
            <section class="prawy_blok">
                <img src="../assets/thumbnails/<?= $offer->thumbnail ?>" alt="Obraz 1" class="prawy_gorny">

                <div class="prawy_dolny">
                    <img src="../assets/thumbnails/<?= $offer->thumbnail ?>" alt="Obraz 2" class="prawy_dolny_lewy">
                    <img src="../assets/thumbnails/<?= $offer->thumbnail ?>" alt="Obraz 4" class="prawy_dolny_prawy">
                </div>
            </section>

        </section>
    </section>
    <section class="centerer">
        <section id="szczegoly_main_block">

            <h2><?= $offer->name ?></h2>
            <br>
            <hr>
            <section id="szczegoly_info_block">
                <section id="szczegoly_info_block_left">
                    <article class="szczegolowe_info">
                        <!-- <div class="oceny_gwiazdki">
                            <h1>5.0</h1>
                            <div class="kolumna">
                                <span>Bardzo Dobry</span>
                                <img src="../assets/pictures/pictureone.jpg" alt="gwiazdki">
                            </div>
                        </div> -->
                        <p>1 z najlepszych hoteli w: <br><?= $offer->city ?>, <?= $offer->country ?></p>
                        <div class="like_bar">
                            <h5>Lokalizacja</h5>
                            <div class="gray_bar">
                                <div class="green_bar" style="width: 90%;"></div>
                                <div class="tekst_bar">5.0</div>
                            </div>
                        </div>
                        <div class="like_bar">
                            <h5>Atrakcje</h5>
                            <div class="gray_bar">
                                <div class="green_bar" style="width: 65%;"></div>
                                <div class="tekst_bar">5.0</div>
                            </div>
                        </div>
                        <div class="like_bar">
                            <h5>Obsługa</h5>
                            <div class="gray_bar">
                                <div class="green_bar" style="width: 100%;"></div>
                                <div class="tekst_bar">5.0</div>
                            </div>
                        </div>
                        <div class="like_bar">
                            <h5>Opinie</h5>
                            <div class="gray_bar">
                                <div class="green_bar" style="width: 30%;"></div>
                                <div class="tekst_bar">5.0</div>
                            </div>
                        </div>
                        <p class="opis"><?= $offer->description ?></p>

                    </article>
                    <article id="szczegoly_przycisk">
                        <form action="rezerwuj.php" method="post">
                            <input type="submit" value="ZRÓB REZERWACJĘ">
                        </form>
                    </article>
                </section>
                <section id="szczegoly_info_block_right">

                    <h4>Usługi:</h4>
                    <article>
                        <ul>
                            <li><img src="../assets/icon/parking.png" alt="ikonka_parking">Bezpłatny Parking</li>
                            <li><img src="../assets/icon/wifi.png" alt="ikonka_wifi">Darmowy Wi-Fi</li>
                            <li><img src="../assets/icon/silownia.png" alt="ikonka_silownia">Siłownia</li>
                            <li><img src="../assets/icon/basen.png" alt="ikonka_basen">Basen</li>
                            <li><img src="../assets/icon/sniadanie.png" alt="ikonka_sniadanie">Śniadanie za darmo</li>
                            <li><img src="../assets/icon/atrakcje.png" alt="ikonka_atrakcje">Atrakcje dla całej rodziny</li>
                            <li></li>
                            <li><img src="../assets/icon/spoleczenstwo.png" alt="ikonka_pokoje">Pokoje do spotkań</li>
                        </ul>
                    </article>
                    <br><br>
                    <h4>Wyposażenie pokoi</h4>
                    <article>
                        <ul>
                            <li><img src="../assets/icon/klimatyzacja.png" alt="ikonka_klimatyzacja">Klimatyzacja</li>
                            <li><img src="../assets/icon/bezpieczenstwo.png" alt="ikonka_bezpieczenstwo">Bezpieczeństwo</li>
                            <li><img src="../assets/icon/obsluga.png" alt="ikonka_obsluga">Obsługa klienta</li>
                            <li><img src="../assets/icon/pokoje.png" alt="ikonka_wifi">Komfort</li>
                            <li></li>
                            <li><img src="../assets/icon/restauracja.png" alt="ikonka_wifi">Minibar</li>

                        </ul>
                    </article>
                    <br><br>
                    <h4>Rodzaje pokojów</h4>
                    <article>
                        <ul>
                            <li><img src="../assets/icon/pokoje.png" alt="ikonka_wifi">standart</li>
                            <li><img src="../assets/icon/palenie.png" alt="ikonka_wifi">dla nie palących</li>
                            <li><img src="../assets/icon/pokoje.png" alt="ikonka_wifi">biznes</li>
                            <li><img src="../assets/icon/pokoje.png" alt="ikonka_wifi">rodzinowe</li>
                        </ul>
                    </article>
                    <br><br>
                    <h4>Dobrze wiedzieć</h4>
                    <article>
                        <ul>
                            <li>
                                <div class="kolumna">
                                    <span>Klasa Hotelu</span>
                                    <img src="../assets/pictures/gwiazdki.png" alt="gwiazdki">
                                </div>
                            </li>
                            <li>
                                <div class="kolumna">
                                    <span>Języki</span>
                                    English, Polish, Russian
                                </div>
                            </li>
                        </ul>


                    </article>
                    <br>
                    <h6>SPONSORZY</h6>
                    <h5>Rent4Cent</h5>
                    <h5>PropellerProtection</h5>
                </section>
            </section>
        </section>
    </section>

    <footer id="kontakt_block">
        <article id="numer_kontakt">
            <article id="numer_kontakt2">
                <h2>+48 780 560 350</h2>
                <br>
                <article id="sociale">
                    <img src="../assets/icon/inst.png" alt="instagram">
                    <img src="../assets/icon/facebook.png" alt="facebook">
                    <img src="../assets/icon/twitter.png" alt="twitter">
                </article>
            </article>
        </article>
        <article id="email_kontakt">
            <h2>rent4cent@gmail.com</h2><br><br>
            <hr>
            <h3><a href="privacy.txt">Privacy Policy</a></h3>
            <h3>Recommendation technologies are used</h3>
        </article>
    </footer>
</body>

</html>

<?php
mysqli_close($con);
?>