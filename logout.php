<?php
session_start();
session_destroy();
setcookie("loggedin", "", time() - 3600, "/"); // Clear the cookie
header("Location: index.php");
exit();
