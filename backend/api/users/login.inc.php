<?php

if (isset($_POST["submit"])) {

    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once "../database.php";
    $con = dbConnect();

    require_once 'functions.inc.php';

    if (emptyInputLogin($username, $pwd) !== false) {
        header("location: ../../examples/users/login.php?error=emptyinput");
        exit();
    }

    loginUser($con, $username, $pwd);
} else {
    header("location: ../../examples/users/login.php");
    exit();
}