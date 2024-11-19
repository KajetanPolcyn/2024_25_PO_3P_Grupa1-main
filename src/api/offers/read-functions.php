<?php

require_once "classes.php";

// ===========================
// FEATURED OFFERS
// ===========================

/**
 * Returns array of featuredOffer objects, sorted by views in descending order
 *
 * @param mysqli $con Connection to the database
 * @param int $amount Number of offers to return
 *
 * @return false|array Array of featuredOffer objects on success, false on failure
 */
function getFeaturedOffers($con, $amount)
{
    if (!is_numeric($amount) || $amount < 1) {
        return false;
    }

    $query = "SELECT id, name, country, city, day_price_pln, thumbnail FROM offers ORDER BY views DESC LIMIT $amount";
    $result = mysqli_query($con, $query);

    if (!$result) {
        return false;
    }

    $offers = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $offet = new featuredOffer($row["id"], $row["name"], $row["country"], $row["city"], $row["day_price_pln"], $row["thumbnail"]);
        array_push($offers, $offet);
    }

    return $offers;
}

// ===========================
// OFFERS WITH DESCRIPTION
// ===========================
function getOffersWithDescription($con, $amount)
{
    if (!is_numeric($amount) || $amount < 1) {
        return false;
    }

    $query = "SELECT id, name, country, city, day_price_pln, thumbnail, description FROM offers ORDER BY views ASC LIMIT $amount";
    $result = mysqli_query($con, $query);

    if (!$result) {
        return false;
    }

    $offers = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $offer = new offerWithDescription($row["id"], $row["name"], $row["country"], $row["city"], $row["day_price_pln"], $row["thumbnail"], $row["description"]);
        array_push($offers, $offer);
    }

    return $offers;
}


// ===========================
// FULL OFFERS
// ===========================

/**
 * Returns a fullOffer object with all details for the offer with the given id
 *
 * @param mysqli $con Connection to the database
 * @param int $id Unique identifier for the offer
 *
 * @return false|fullOffer Full offer object on success, false on failure
 */
function getFullOffer($con, $id)
{
    $query = "SELECT id, name, country, city, street, apartment_number, post_code, thumbnail, day_price_pln,  description, views FROM offers WHERE id = $id";
    $result = mysqli_query($con, $query);

    if (!$result || mysqli_num_rows($result) == 0) {
        return false;
    }

    $row = mysqli_fetch_assoc($result);

    $offer = new fullOffer( // TODO when changing table offers
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
        $row["views"]
    );

    incrementViews($con, $id);

    return $offer;
}

/**
 * Increments the view count for a specific offer by its id.
 *
 * @param mysqli $con Connection to the database
 * @param int $id Unique identifier for the offer
 *
 * @return bool True on success, false on failure
 */
function incrementViews($con, $id)
{
    $query = "UPDATE offers SET views = views + 1 WHERE id = $id";
    $result = mysqli_query($con, $query);

    if (!$result) {
        return false;
    }

    return true;
}

// ===========================
// SEARCHING OFFERS
// ===========================

/**
 * Returns an array of all unique country names from the offers table.
 *
 * @param mysqli $con Connection to the database
 *
 * @return array|false Array of country names on success, false on failure
 */
function getCountries($con)
{
    $query = "SELECT DISTINCT country FROM offers";
    $result = mysqli_query($con, $query);

    if (!$result) {
        return false;
    }

    $countries = [];
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($countries, $row["country"]);
    }

    return $countries;
}


/**
 * Searches for offers based on a search term and optional country filter.
 *
 * This function performs a search in the offers table for records that match
 * any of the provided search terms in the specified columns, including name,
 * city, country, description, street, apartment_number, and post_code. The
 * search terms are split using common delimiters such as commas, spaces, and
 * hyphens. If a specific country is provided, the search is further filtered
 * by the specified country. The results are sorted by views in descending order
 * and limited to the specified number of offers.
 *
 * @param mysqli $con Connection to the database
 * @param int $limit Maximum number of offers to return
 * @param string $search Search term(s) to filter the offers
 * @param string $s_country Country to filter the search results, 'all' for no filter
 *
 * @return false|array Array of featuredOffer objects on success, false on failure
 */
function getSearchedOffers($con, $limit, $search, $s_country = "all")
{
    // Base
    $query = "SELECT id, name, country, city, day_price_pln, thumbnail FROM offers WHERE 1=1";

    // Search engine
    $separators = "/[,\s;.-]/";
    $words = preg_split($separators, $search, -1, PREG_SPLIT_NO_EMPTY);
    foreach ($words as $word) {
        $query .= " AND ";
        $query .= "(name LIKE '%$word%' OR city LIKE '%$word%' OR country LIKE '%$word%' OR description LIKE '%$word%' OR street LIKE '%$word%' OR apartment_number LIKE '%$word%' OR post_code LIKE '%$word%')";
    }

    // Country filter
    if ($s_country != "all") {
        $query .= " AND country = '$s_country'";
    }

    // End of query
    $query .= " ORDER BY views DESC LIMIT $limit";
    $result = mysqli_query($con, $query);

    if (!$result) {
        return false;
    }

    $offers = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $offer = new featuredOffer($row["id"], $row["name"], $row["country"], $row["city"], $row["day_price_pln"], $row["thumbnail"]);
        array_push($offers, $offer);
    }

    return $offers;
}
