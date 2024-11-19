<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link rel="stylesheet" href="../styles/style_sign_in.css">
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
                <li><a href="#">O nas</a></li>
                <li><a href="rezerwacja.php">Rezerwacja</a></li>
                <li><a href="kontakt.html">Kontakt</a></li>
            </ul>
        </nav>
    </header>
    <section id="logowanie">
        <h2>ZALOGUJ SIĘ</h2>
        <form action="../api/users/login.inc.php" method="post">
            <input name="uid" type="text" placeholder="Email">
            <input name="pwd" type="password" placeholder="Password">
            <input name="submit" value="ZALOGUJ SIĘ" type="submit">
            <div id="zarejestruj-zaloguj"><a href="zarejestruj.php">ZAREJESTRUJ SIĘ</a></div>
        </form>

        <div class="form__messages">
            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "emptyinput") {
                    echo "<p>Fill in all fields!</p>";
                } else if ($_GET['error'] == "wronglogin") {
                    echo "<p>Incorrect login information!</p>";
                }
            }
            ?>
        </div>

        <!-- <article id="sociale">
            <img src="../assets/icon/facebook.png" alt="Facebook">
            <img src="../assets/icon/facebook.png" alt="GitHub">
            <img src="../assets/icon/facebook.png" alt="Gmail">
            <img src="../assets/icon/facebook.png" alt="LinkedIn">
            <img src="../assets/icon/facebook.png" alt="Twitter">
            <img src="../assets/icon/facebook.png" alt="Nie mam kurcze pojecia co to jest">
        </article> -->
        <p>Rejestrując się Pan(i) przyjmuje <a href="politka.txt">Warunki i politykę prywatności</a></p>
    </section>
</body>

</html>