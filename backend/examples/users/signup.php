    <?php
    require_once 'header.php';
    ?>

    <h2 class="title">Sign up</h2>
    <div class="form">
        <form action="../../api/users/signup.inc.php" method="post">
            <input name="fname" type="text" placeholder="First name">
            <input name="lname" type="text" placeholder="Last name">
            <input name="email" type="text" placeholder="Email">
            <input name="uid" type="text" placeholder="Username">
            <input name="pwd" type="password" placeholder="Password">
            <input name="pwdrepeat" type="password" placeholder="Repeat password">
            <input class="form__btn" name="submit" value="Sign up" type="submit">
        </form>

        <div class="form__messages">
            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "emptyinput") {
                    echo "<p>Fill in all fields!</p>";
                } else if ($_GET['error'] == "invaliduid") {
                    echo "<p>Choose a proper username!</p>";
                } else if ($_GET['error'] == "invalidemail") {
                    echo "<p>Choose a proper email!</p>";
                } else if ($_GET['error'] == "passwordsdontmatch") {
                    echo "<p>Passwords doesn't match!</p>";
                } else if ($_GET['error'] == "stmtfailed") {
                    echo "<p>Something went wrong, try again!</p>";
                } else if ($_GET['error'] == "usernametaken") {
                    echo "<p>Username already taken!</p>";
                } else if ($_GET['error'] == "none") {
                    echo "<p>You have signed up!</p>";
                }
            }
            ?>
        </div>
    </div>
    </body>

    </html>