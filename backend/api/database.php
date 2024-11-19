<?php
require_once "constans.php";

/**
 * Connects to the database
 * @return false|mysqli connection to the database or false on failure
 */
function dbConnect()
{
    try {
        $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    } catch (Exception $e) {
        return false;
    }

    if (!$con || mysqli_errno($con) != 0) {
        return false;
    }

    return $con;
}
