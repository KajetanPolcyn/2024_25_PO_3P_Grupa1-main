<?php

require_once "classes.php";

/**
 * Returns array of fullOffer objects, sorted by ID in ascending order
 *
 * @param mysqli $con Connection to the database
 * @param int $from_id ID of the first offer to return (inclusive)
 * @param int $to_id ID of the last offer to return (inclusive)
 *
 * @return false|array Array of fullOffer objects on success, false on failure
 */
function getAllFullOffers($con, $from_id = 0, $to_id = 10)
{
    // Validating parameters
    if (!is_numeric($from_id) || $from_id < 1) {
        $from_id = 10;
    }

    if (!is_numeric($to_id) || $to_id < 0) {
        $to_id = 0;
    }

    if ($from_id > $to_id) {
        $tmp = $from_id;
        $from_id = $to_id;
        $to_id = $tmp;
    }

    $query = "SELECT * FROM offers WHERE id BETWEEN $from_id AND $to_id";
    $result = mysqli_query($con, $query);

    if (!$result) {
        return false;
    }

    $offers = [];
    while ($row = mysqli_fetch_assoc($result)) { // TODO when changing table offers
        $offer = new fullOffer(
            $row["id"],
            $row["name"],
            $row["country"],
            $row["city"],
            $row["street"],
            $row["apartment_number"],
            $row["post_code"],
            $row["thumbnail"],
            $row["day_price_pln"],
            $row["description"],
            $row["views"],
        );
        array_push($offers, $offer);
    }

    return $offers;
}


/**
 * Returns array of all thumbnails in given directory (or default one if not given)
 *
 * @param string $path Path to the directory to look for thumbnails
 *
 * @return array Array of thumbnails, empty array on failure
 */
function getThumbnails($path = null)
{
    // $dir = scandir("rent-4-cent/src/assets/thumbnails");
    if ($path != null) {
        $dir = scandir($path);
    } else {
        $dir = scandir("../../../../src/assets/thumbnails"); // TODO when on server
    }
    $thumbnails = [];
    foreach ($dir as $file) {
        if ($file != "." && $file != "..") {
            array_push($thumbnails, $file);
        }
    }

    return $thumbnails;
}

/**
 * Deletes an offer from the database by its id.
 *
 * This function first verifies the validity of the id and then attempts
 * to delete the offer from the database. It returns the name of the offer
 * that was deleted, or false if the deletion was unsuccessful.
 *
 * @param mysqli $con Connection to the database
 * @param int $id Unique identifier for the offer
 *
 * @return false|string Name of the deleted offer on success, false on failure
 */
function deleteOffer($con, $id)
{
    if (!is_numeric($id) || $id < 0) {
        return false;
    }

    $query_name = "SELECT name FROM offers WHERE id = $id";
    $result_name = mysqli_query($con, $query_name);

    if (!$result_name) {
        return false;
    }

    $query_delete = "DELETE FROM offers WHERE id = $id";
    $result_delete = mysqli_query($con, $query_delete);

    if (!$result_delete) {
        return false;
    }

    return mysqli_fetch_row($result_name)[0];
}

/**
 * Returns an array of all IDs from the offers table.
 *
 * @param mysqli $con Connection to the database
 *
 * @return false|array Array of IDs on success, false on failure
 */
function getAllOfferIds($con)
{
    $query = "SELECT id FROM offers";
    $result = mysqli_query($con, $query);

    if (!$result) {
        return false;
    }

    $ids = [];
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($ids, $row["id"]);
    }

    return $ids;
}


/**
 * Updates an existing offer in the offers table with the provided data.
 *
 * @param mysqli $con Connection to the database
 * @param fullOffer $data Object containing the data to update the offer with
 *
 * @return false|array Array with two elements: the old name, and the new name of the offer on success, false on failure
 */
function updateOffer($con, $data)
{
    // Get old and new names
    $old_name_query = "SELECT name FROM offers WHERE id = $data->id";
    $old_name = mysqli_fetch_row(mysqli_query($con, $old_name_query))[0];
    if (!$old_name) return false;
    $new_name = $data->name;

    // Update offer
    $query = "UPDATE offers SET "; // TODO when updating table offers
    $query .= "name = '$new_name', ";
    $query .= "country = '$data->country', ";
    $query .= "city = '$data->city', ";
    $query .= "street = '$data->street', ";
    $query .= "apartment_number = '$data->apartment_number', ";
    $query .= "post_code = '$data->post_code', ";
    $query .= "thumbnail = '$data->thumbnail', ";
    $query .= "day_price_pln = '$data->day_price_pln', ";
    $query .= "description = '$data->description' ";
    $query .= "WHERE id = $data->id";

    $result = mysqli_query($con, $query);

    if (!$result) {
        return false;
    }

    return [$old_name, $new_name];
}
