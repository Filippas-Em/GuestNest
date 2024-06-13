<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = mysqli_real_escape_string($conn, $_POST['firstName']);
    $last_name = mysqli_real_escape_string($conn, $_POST['lastName']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);

    if ($password != $confirmPassword) {
        echo "Passwords do not match!";
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (first_name, last_name, username, email, password)
            VALUES ('$first_name', '$last_name', '$username', '$email', '$hashed_password')";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['username'] = $username;
        $cookie_name = "loggedin";
        $cookie_value = 1;
        $cookie_expiration = time() + (86400 * 7); // 1 week
        setcookie($cookie_name, $cookie_value, $cookie_expiration, "/");

        // Redirect to the homepage
        header("Location: index.html");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
