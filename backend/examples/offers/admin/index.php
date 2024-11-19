<?php
session_start();

require_once "./../../../api/database.php";
require_once "./../../../api/offers/admin-functions.php";

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
    <title>Rent 4 Cent - Panel Administratora - Oferty</title>

    <style>
        #post_form_css {
            display: flex;
            justify-content: space-around;
            align-items: start;
            flex-direction: column;
            gap: 1rem;
        }
    </style>
</head>

<body>
    <h1>Panel Administratora - Oferty</h1>

    <?php
    if (isset($_SESSION['offer_admin_success'])) {
        echo "<h2>" . $_SESSION['offer_admin_success'] . "</h2>";
        unset($_SESSION['offer_admin_success']);
    } else if (isset($_SESSION['offer_admin_error'])) {
        echo "<h2>" . $_SESSION['offer_admin_error'] . "</h2>";
        unset($_SESSION['offer_admin_error']);
    }
    ?>

    <form action="#" method="post">
        <label>
            Od którego ID wyświetlić:<br>
            <input type="number" name="fromid" id="fromid">
        </label>

        <br><br>

        <label>
            Do którego ID wyświetlić:<br>
            <input type="number" name="toid" id="toid">
        </label>

        <p>
            <input type="submit" value="Wyświetl" name="admin-show-offers">
        </p>
    </form>

    <?php
    if (isset($_POST['admin-show-offers'])) {
        $fromid = $_POST['fromid'];
        $toid = $_POST['toid'];

        // getting list of thumbnails
        $thumbnails = getThumbnails();

        $offers = getAllFullOffers($con, $fromid, $toid);

        if ($offers) {
            foreach ($offers as $offer) {
                echo '<form action="./../../../api/offers/admin-form.php" method="post" id="post_form_css">';

                echo '<input type="number" name="offerid" value="' . $offer->id . '" readonly>';
                echo '<input type="text" name="offername" value="' . $offer->name . '">';
                echo '<input type="text" name="offercountry" value="' . $offer->country . '">';
                echo '<input type="text" name="offercity" value="' . $offer->city . '">';
                echo '<input type="text" name="offerstreet" value="' . $offer->street . '">';
                echo '<input type="text" name="offerapartment_number" value="' . $offer->apartment_number . '">';
                echo '<input type="text" name="offerpost_code" value="' . $offer->post_code . '">';

                echo '<select name="offerthumbnail">';
                foreach ($thumbnails as $thumbnail) {
                    echo '<option value="' . $thumbnail . '" ' . ($thumbnail == $offer->thumbnail ? 'selected' : '') . '>' . $thumbnail . '</option>';
                }
                echo '</select>';

                echo '<input type="number" name="offerday_price_pln" value="' . $offer->day_price_pln . '">';
                echo '<textarea name="offerdescription" rows="5" cols="50">' . $offer->description . '</textarea>';
                echo '<input type="number" name="offerviews" value="' . $offer->views . '" readonly>';

                echo '<input type="submit" value="Zapisz" name="admin-update-offer">';
                echo '<input type="submit" value="Usun" name="admin-delete-offer">';

                echo '</form>';

                echo '<hr style="margin-top: 5rem; margin-bottom: 5rem" />';
            }
        } else {
            echo "Brak wyników...";
        }
    }

    ?>
</body>

</html>