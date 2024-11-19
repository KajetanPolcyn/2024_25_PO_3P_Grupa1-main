<?php
require_once "../database.php";
$con = dbConnect();
session_start();
require_once "functions.inc.php";

// Check if the user is an admin
if (!isset($_SESSION['userid']) || !isAdmin($con, $_SESSION['userid'])) {
    header("Location: ../../index.php?error=accessdenied");
    exit();
}

echo "<h2>Welcome to the Admin Panel!</h2>";

// Handle adding a new user
if (isset($_POST["submit"])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $password = $_POST["pwd"];
    $passwordrepeat = $_POST["pwdrepeat"];
    $role = $_POST["role"];

    if (emptyInputSignup($fname, $lname, $email, $username, $password, $passwordrepeat) !== false) {
        header("location: admin.php?error=emptyinput");
        exit();
    }
    if (invalidUid($username) !== false) {
        header("location: admin.php?error=invaliduid");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: admin.php?error=invalidemail");
        exit();
    }

    if (pwdMatch($password, $passwordrepeat) !== false) {
        header("location: admin.php?error=passwordsdontmatch");
        exit();
    }

    if (uidExists($con, $username, $email) !== false) {
        header("location: admin.php?error=usernametaken");
        exit();
    }

    if (createUser($con, $fname, $lname, $email, $username, $password, $role)) {
        header("Location: admin.php?message=useradded");
        exit();
    } else {
        header("Location: admin.php?error=useraddfailed");
        exit();
    }
}

// Display users table
$sql = "SELECT usersId, usersFname, usersLname, usersEmail, usersUid, usersRole FROM users;";
$result = mysqli_query($con, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['usersId']}</td>
                <td>{$row['usersFname']}</td>
                <td>{$row['usersLname']}</td>
                <td>{$row['usersEmail']}</td>
                <td>{$row['usersUid']}</td>
                <td>{$row['usersRole']}</td>
                <td>
                    <a href='edit_user.php?id={$row['usersId']}'>Change Role</a> |
                    <a href='delete_user.php?id={$row['usersId']}'>Delete</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No users found.</p>";
}

// Display messages
if (isset($_GET['message'])) {
    if ($_GET['message'] == 'useradded') {
        echo "<p>User added successfully!</p>";
    } else if ($_GET['message'] == 'userdeleted') {
        echo "<p>User successfully deleted.</p>";
    } else if ($_GET['message'] == 'roleupdated') {
        echo "<p>User role updated successfully.</p>";
    }
}

// Display errors
if (isset($_GET['error'])) {
    if ($_GET['error'] == 'emptyinput') {
        echo "<p>All fields are required. Please fill out the form completely.</p>";
    } else if ($_GET['error'] == 'useraddfailed') {
        echo "<p>Error adding user. Please try again.</p>";
    } else if ($_GET['error'] == 'deletefailed') {
        echo "<p>Error deleting user. Please try again.</p>";
    } else if ($_GET['error'] == 'updatefailed') {
        echo "<p>Error updating user role. Please try again.</p>";
    } else if ($_GET['error'] == "invaliduid") {
        echo "<p>Choose a proper username!</p>";
    } else if ($_GET['error'] == "invalidemail") {
        echo "<p>Choose a proper email!</p>";
    } else if ($_GET['error'] == "passwordsdontmatch") {
        echo "<p>Passwords doesn't match!</p>";
    } else if ($_GET['error'] == "usernametaken") {
        echo "<p>Username already taken!</p>";
    }
}
?>

<!-- Form for adding a new user -->
<h2>Add New User</h2>
<form action="admin.php" method="post">
    <input type="text" name="fname" placeholder="First Name" required>
    <input type="text" name="lname" placeholder="Last Name" required>
    <input type="text" name="email" placeholder="Email" required>
    <input type="text" name="uid" placeholder="Username" required>
    <input type="password" name="pwd" placeholder="Password" required>
    <input type="password" name="pwdrepeat" placeholder="Password repeat" required>
    <select name="role" required>
        <option value="user">User</option>
        <option value="admin">Admin</option>
    </select>
    <button type="submit" name="submit">Add User</button>
</form>