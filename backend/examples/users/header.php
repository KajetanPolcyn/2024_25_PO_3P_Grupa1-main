<?php
session_start();
require_once "../../api/database.php";
require_once "../../api/users/functions.inc.php";

$con = dbConnect();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login system</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <div class="wrapper">
            <a href="index.php"></a>
            <ul class="nav__menu">
                <li><a href="index.php">Home</a></li>
                <?php
                if (isset($_SESSION["userid"]) && isAdmin($con, $_SESSION["userid"])) {
                    echo '<li><a href="../../api/users/admin.php">Go to Admin Panel</a></li>';
                }
                if (isset($_SESSION["useruid"])) {
                    echo "<li><a href='profile.php'>Profile Page</a></li>";
                    echo "<li><a href='../../api/users/logout.inc.php'>Log Out</a></li>";
                } else {
                    echo "<li><a href='signup.php'>Sign Up</a></li>";
                    echo "<li><a href='login.php'>Log In</a></li>";
                }
                ?>
            </ul>
        </div>
    </nav>