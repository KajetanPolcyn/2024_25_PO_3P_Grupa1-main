<?php

session_start();

require_once "../database.php";
require_once "./admin-functions.php";
require_once "./classes.php";

echo "<h2>Proszę czekać</h2>";
echo "<p>Za chwilę nastąpi przekierowanie</p>";

if (isset($_POST['admin-update-offer'])) {
    // Updating offer

    $con = dbConnect();

    if ($con) {
        $offer = new fullOffer(
            $_POST['offerid'],
            $_POST['offername'],
            $_POST['offercountry'],
            $_POST['offercity'],
            $_POST['offerstreet'],
            $_POST['offerapartment_number'],
            $_POST['offerpost_code'],
            $_POST['offerthumbnail'],
            $_POST['offerday_price_pln'],
            $_POST['offerdescription'],
            $_POST['offerviews']
        );

        // Check for empty fields
        foreach ($offer as $key => $value) {
            if ($key != 'views' && empty($value)) {
                $_SESSION['offer_admin_error'] = "Nie podano wszystkich danych! ($key)";
                header("location: /rent-4-cent/backend/examples/offers/admin/index.php");
                die();
            }
        }

        // Check for sizes
        if (strlen($offer->id) > 10) {
            $_SESSION['offer_admin_error'] = "ID oferty jest zbyt długie!";
            header("location: /rent-4-cent/backend/examples/offers/admin/index.php");
            die();
        } else if (strlen($offer->name) > 254) {
            $_SESSION['offer_admin_error'] = "Nazwa oferty jest zbyt długa!";
            header("location: /rent-4-cent/backend/examples/offers/admin/index.php");
            die();
        } else if (strlen($offer->country) > 99) {
            $_SESSION['offer_admin_error'] = "Kraj oferty jest zbyt długi!";
            header("location: /rent-4-cent/backend/examples/offers/admin/index.php");
            die();
        } else if (strlen($offer->city) > 254) {
            $_SESSION['offer_admin_error'] = "Nazwa miasta oferty jest zbyt długa!";
            header("location: /rent-4-cent/backend/examples/offers/admin/index.php");
            die();
        } else if (strlen($offer->street) > 254) {
            $_SESSION['offer_admin_error'] = "Nazwa ulicy oferty jest zbyt długa!";
            header("location: /rent-4-cent/backend/examples/offers/admin/index.php");
            die();
        } else if (strlen($offer->apartment_number) > 19) {
            $_SESSION['offer_admin_error'] = "Numer lokalu oferty jest zbyt długi!";
            header("location: /rent-4-cent/backend/examples/offers/admin/index.php");
            die();
        } else if (strlen($offer->post_code) > 19) {
            $_SESSION['offer_admin_error'] = "Kod pocztowy oferty jest zbyt długi!";
            header("location: /rent-4-cent/backend/examples/offers/admin/index.php");
            die();
        } else if (strlen($offer->thumbnail) > 99) {
            $_SESSION['offer_admin_error'] = "Nazwa miniaturki oferty jest zbyt długa!";
            header("location: /rent-4-cent/backend/examples/offers/admin/index.php");
            die();
        } else if (strlen($offer->day_price_pln) > 13) {
            $_SESSION['offer_admin_error'] = "Cena oferty jest zbyt długa!";
            header("location: /rent-4-cent/backend/examples/offers/admin/index.php");
            die();
        } else if (strlen($offer->description) > 50000) {
            $_SESSION['offer_admin_error'] = "Opis oferty jest zbyt długi!";
            header("location: /rent-4-cent/backend/examples/offers/admin/index.php");
            die();
        }

        // Check for id in database
        $ids = getAllOfferIds($con);
        if (!in_array($offer->id, $ids)) {
            $_SESSION['offer_admin_error'] = "Oferta o podanym ID nie istnieje!";
            header("location: /rent-4-cent/backend/examples/offers/admin/index.php");
            die();
        }

        // Check for thumbnail in files
        $thumbnails = getThumbnails("../../../src/assets/thumbnails");

        if (!in_array($offer->thumbnail, $thumbnails)) {
            $_SESSION['offer_admin_error'] = "Miniaturka oferty nie istnieje!";

            header("location: /rent-4-cent/backend/examples/offers/admin/index.php");
            die();
        }

        // Check for forbidden characters
        $pattern = '/^[0-9\s\-_a-zA-ZąćęłńóśźżĄĆĘŁŃÓŚŹŻа-яА-ЯёЁéèáàäöüßÉÈÁÀÄÖÜ.,\(\)\[\]]+$/u';

        foreach ($offer as $key => $value) {
            if (!preg_match($pattern, $value)) {
                $_SESSION['offer_admin_error'] = "Żadne z pól nie może zawierać innych znaków niż litery, cyfry oraz znaki \"-\", \"_\" i \" \"!";
                header("location: /rent-4-cent/backend/examples/offers/admin/index.php");
                die();
            }
        }

        // Update offer
        $result = updateOffer($con, $offer);

        if (!$result) {
            $_SESSION['offer_admin_error'] = "Błąd aktualizacji oferty!";
        } else {
            $_SESSION['offer_admin_success'] = "Oferta $result[1] ($result[0]) została zaktualizowana!";
        }
    } else {
        $_SESSION['offer_admin_error'] = "Błąd połączenia z bazą danych!";
    }

    header("location: /rent-4-cent/backend/examples/offers/admin/index.php");
    die();
} else if (isset($_POST['admin-delete-offer'])) {
    // Deleting offer

    $con = dbConnect();

    if ($con) {
        $offerid = $_POST['offerid'];
        $result = deleteOffer($con, $offerid);

        if (!$result) {
            $_SESSION['offer_admin_error'] = "Błąd usuwania oferty!";
        }
    } else {
        $_SESSION['offer_admin_error'] = "Błąd połączenia z bazą danych!";
    }

    if (!isset($_SESSION['offer_admin_error'])) {
        $_SESSION['offer_admin_success'] = "Oferta $result została usunięta!";
    }

    mysqli_close($con);

    header("location: /rent-4-cent/backend/examples/offers/admin/index.php");
    die();
} else {
    // Check for going from URL
    header("location: /rent-4-cent/backend/examples/offers/admin/index.php");
}
