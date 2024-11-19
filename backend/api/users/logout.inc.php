<?php

session_start();
session_unset();
session_destroy();

header("location: ../../examples/users/index.php");
exit();
