    <?php
    require_once 'header.php';
    ?>

    <h2 class="title">Log in</h2>
    <div class="form">
        <form action="../../api/users/login.inc.php" method="post">
            <input name="uid" type="text" placeholder="Username/email">
            <input name="pwd" type="password" placeholder="Password">
            <input class="form__btn" name="submit" value="Log in" type="submit">
        </form>

        <div class="form__messages">
            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "emptyinput") {
                    echo "<p>Fill in all fields!</p>";
                } else if ($_GET['error'] == "wronglogin") {
                    echo "<p>Incorrect login information!</p>";
                }
            }
            ?>
        </div>
    </div>
    </body>

    </html>