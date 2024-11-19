<?php

require_once "./../../../api/database.php";
require_once "./../../../api/offers/read-functions.php";

$con = dbConnect();
if (!$con) {
    die("<h2>Brak połączenia z bazą danych...</h2><br>Proszę spróbować później.");
}

$id = $_GET["id"] ?? false;
if (!is_numeric($id) || $id < 0 || !$id) {
    header('location: /rent-4-cent/backend/examples/offers/read/featured-offers.php');
    die();
}

$fullOffer = getFullOffer($con, $id);
if (!$fullOffer) {
    header('location: /rent-4-cent/backend/examples/offers/read/featured-offers.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $fullOffer->name ?> - Pełna oferta</title>
</head>

<body>
    <?php

    echo "<img src='/rent-4-cent/src/assets/thumbnails/$fullOffer->thumbnail' alt='$fullOffer->name'>";

    echo "<h1>$fullOffer->name</h1>";

    echo "<h2>$fullOffer->city, $fullOffer->country</h2>";
    echo "<p>$fullOffer->street $fullOffer->apartment_number</p>";

    echo "<p>$fullOffer->description</p>";

    echo "<p>Doba hotelowa już od: $fullOffer->day_price_pln zł</p>";

    ?>

    <a href="/rent-4-cent/backend/examples/offers/read/featured-offers.php">Powrót...</a>
</body>

</html>

<?php
mysqli_close($con);
?>