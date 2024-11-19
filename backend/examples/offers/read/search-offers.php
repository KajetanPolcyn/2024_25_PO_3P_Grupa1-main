<?php

require_once "./../../../api/database.php";
require_once "./../../../api/offers/read-functions.php";

$con = dbConnect();
if (!$con) {
    die("<h2>Brak połączenia z bazą danych...</h2><br>Proszę spróbować później.");
}

// Getting search parameters
if (isset($_GET["search"])) {
    $search = $_GET["search"];
    $s_country = $_GET["country"];
} else {
    $search = "";
    $s_country = "all";
}

// Getting countries
$countries = getCountries($con);

if (!$countries) {
    die("<h2>Brak połączenia z bazą danych...</h2><br>Proszę spróbować później.");
}

?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Offers</title>
</head>

<body>
    <form action="#" method="get">
        <input type="search" name="search" placeholder="Szukaj..." value="<?php echo $search; ?>">

        <select name="country">
            <option value="all" <?php if ($s_country == "all") echo "selected"; ?>>Wszystkie kraje</option>
            <?php
            foreach ($countries as $country) {
                echo "<option value='$country' " . ($country == $s_country ? "selected" : "") . ">$country</option>";
            }
            ?>
        </select>

        <input type="submit" value="Szukaj">
    </form>

    <?php
    $offers = getSearchedOffers($con, $search, $s_country);
    if ($offers) {
        foreach ($offers as $offer) {
            echo "<h4>$offer->name</h4>";
            echo "<p>$offer->country, $offer->city</p>";
            echo "<p>Od $offer->day_price_pln zł za dobę</p>";
            echo "<p><a href='offer.php?id=$offer->id'>Więcej o ofercie...</a></p>";
            echo "<hr />";
        }
    } else {
        echo "<h2>Brak wyników...</h2>";
    }
    ?>
</body>

</html>