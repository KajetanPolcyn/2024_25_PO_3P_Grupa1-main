<?php

if (isset($_POST["submit"])) {

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once "../database.php";
    $con = dbConnect();

    require_once 'functions.inc.php';

    if (emptyInputSignup($fname, $lname, $email, $username, $pwd, $pwdRepeat) !== false) {
        header("location: ../../sites/zarejestruj.php?error=emptyinput");
        exit();
    }
    if (invalidUid($username) !== false) {
        header("location: ../../sites/zarejestruj.php?error=invaliduid");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../../sites/zarejestruj.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../../sites/zarejestruj.php?error=passwordsdontmatch");
        exit();
    }
    if (uidExists($con, $username, $email) !== false) {
        header("location: ../../sites/zarejestruj.php?error=usernametaken");
        exit();
    }

    $role = 'user';
    createUser($con, $fname, $lname, $email, $username, $pwd, $role);
} else {
    header("location: ../../sites/zarejestruj.php");
    exit();
}
