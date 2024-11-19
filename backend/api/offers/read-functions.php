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

    $query = "SELECT id, name, country, city, day_price_pln FROM offers ORDER BY views DESC LIMIT $amount";
    $result = mysqli_query($con, $query);

    if (!$result) {
        return false;
    }

    $offers = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $offet = new featuredOffer($row["id"], $row["name"], $row["country"], $row["city"], $row["day_price_pln"]);
        array_push($offers, $offet);
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

    if (!$result) {
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
 * Searches for offers based on provided search term and country filter.
 *
 * This function performs a search in the offers table for records that match
 * the given search term in any of the specified columns, including name, city,
 * country, description, street, apartment_number, and post_code. If a specific
 * country is provided, the search is further filtered by the country.
 *
 * @param mysqli $con Connection to the database
 * @param string $search Term to search for in the offers
 * @param string $s_country Country to filter the search results, 'all' for no filter
 *
 * @return false|array Array of featuredOffer objects on success, false on failure
 */
function getSearchedOffers($con, $search, $s_country)
{
    $query = "SELECT id, name, country, city, day_price_pln FROM offers WHERE (name LIKE '%$search%' OR city LIKE '%$search%' OR country LIKE '%$search%' OR description LIKE '%$search%' OR street LIKE '%$search%' OR apartment_number LIKE '%$search%' OR post_code LIKE '%$search%')";
    if ($s_country != "all") {
        $query .= " AND country = '$s_country'";
    }
    $query .= " ORDER BY views DESC";
    $result = mysqli_query($con, $query);

    if (!$result) {
        return false;
    }

    $offers = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $offer = new featuredOffer($row["id"], $row["name"], $row["country"], $row["city"], $row["day_price_pln"]);
        array_push($offers, $offer);
    }

    return $offers;
}
