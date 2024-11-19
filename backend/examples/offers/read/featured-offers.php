<?php

require_once "./../../../api/database.php";
require_once "./../../../api/offers/read-functions.php";

$con = dbConnect();
if (!$con) {
    die("<h2>Brak połączenia z bazą danych...</h2><br>Proszę spróbować później.");
}

?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Examples</title>
</head>

<body>
    <h1>Lista ofert</h1>
    <?php
    $featuredOffers = getFeaturedOffers($con, 4);

    foreach ($featuredOffers as $offer) {
        echo "<h4>$offer->name</h4>";
        echo "<p>$offer->country, $offer->city</p>";
        echo "<p>Od $offer->day_price_pln zł za dobę</p>";
        echo "<p><a href='offer.php?id=$offer->id'>Więcej o hotelu...</a></p>";
        echo "<hr />";
    }
    ?>
</body>

</html>

<?php
mysqli_close($con);
?>