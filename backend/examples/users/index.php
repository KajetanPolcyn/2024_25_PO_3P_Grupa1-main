<?php
        require_once 'header.php';
?>

<h2 class="title">This is home page</h2>
<?php
    if (isset($_SESSION["useruid"])) {
        echo "<p style='text-align: center;'>Hello there " . $_SESSION["useruid"] . "</p>";
    }
?>
</body>
</html>