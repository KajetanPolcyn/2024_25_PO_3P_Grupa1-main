<?php
require_once "../database.php";
$con = dbConnect();
session_start();
require_once "functions.inc.php";

if (!isset($_SESSION['userid']) || !isAdmin($con, $_SESSION['userid'])) {
    header("Location: ../../index.php?error=accessdenied");
    exit();
}

if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    $currentUserId = $_SESSION['userid'];
    $sql = "DELETE FROM users WHERE usersId = ?;";
    $stmt = mysqli_stmt_init($con);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $userId);
        mysqli_stmt_execute($stmt);
        if ($userId == $currentUserId) {
            session_unset();
            session_destroy();
            header("Location: ../../sites/zaloguj.php");
            exit();
        }
        header("Location: admin.php?message=userdeleted");
        exit();
    }
}

header("Location: admin.php?error=deletefailed");
exit();