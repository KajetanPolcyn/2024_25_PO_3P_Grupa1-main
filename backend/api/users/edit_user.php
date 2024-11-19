<?php
require_once "../database.php";
$con = dbConnect();
session_start();
require_once "../database.php";
require_once "functions.inc.php";

if (!isset($_SESSION['userid']) || !isAdmin($con, $_SESSION['userid'])) {
    header("Location: ../../examples/users/index.php?error=accessdenied");
    exit();
}

if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    $newRole = 'user';

    // Toggle role between 'admin' and 'user'
    $sql = "SELECT usersRole FROM users WHERE usersId = ?;";
    $stmt = mysqli_stmt_init($con);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $userId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);

        if ($user['usersRole'] === 'user') {
            $newRole = 'admin';
        }

        // Update role
        $updateSql = "UPDATE users SET usersRole = ? WHERE usersId = ?;";
        $updateStmt = mysqli_stmt_init($con);
        if (mysqli_stmt_prepare($updateStmt, $updateSql)) {
            mysqli_stmt_bind_param($updateStmt, "si", $newRole, $userId);
            mysqli_stmt_execute($updateStmt);
            header("Location: admin.php?message=roleupdated");
            exit();
        }
    }
}

header("Location: admin.php?error=updatefailed");
exit();