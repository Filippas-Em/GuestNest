<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT id, username, password FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row && password_verify($password, $row['password'])) {
        // Set session variable
        $_SESSION['username'] = $username;

        // Set a cookie to indicate the user is logged in
        $cookie_name = "loggedin";
        $cookie_value = 1;
        $cookie_expiration = time() + (86400 * 7); // 1 week
        setcookie($cookie_name, $cookie_value, $cookie_expiration, "/");

        // Redirect to the homepage
        header("Location: index.html");
        exit();
    } else {
        echo "Invalid username or password!";
    }
}
?>
