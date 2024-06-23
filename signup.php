<?php
session_start();
// config.php contains the database connection values
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // save user form inputs in variables
    $first_name = mysqli_real_escape_string($conn, $_POST['firstName']);
    $last_name = mysqli_real_escape_string($conn, $_POST['lastName']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);

    if ($password != $confirmPassword) {
        //check for password verification
        echo "Passwords do not match!";
        //exit if they dont match
        exit();
    }
    //hash the password in a new variable
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    //connect to the database table users
    $sql = "INSERT INTO users (first_name, last_name, username, email, password)
            VALUES ('$first_name', '$last_name', '$username', '$email', '$hashed_password')";

    if (mysqli_query($conn, $sql)) {
       // Set session variables
       $_SESSION['username'] = $username;
       $_SESSION['user_id'] = $row['id']; // Store user ID in session

       // Set a cookie to indicate the user is logged in
       $cookie_name = "loggedin";
       $cookie_value = 1;
       $cookie_expiration = time() + (86400 * 7); // 1 week
       setcookie($cookie_name, $cookie_value, $cookie_expiration, "/");

        // Redirect to the homepage
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
