<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //save the user's data input
    $listing_id = mysqli_real_escape_string($conn, $_POST['listing_id']);
    $user_id = $_SESSION['user_id']; 
    $start_date = mysqli_real_escape_string($conn, $_POST['start_date']);
    $end_date = mysqli_real_escape_string($conn, $_POST['end_date']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    // insert the reservation details to the database
    $sql = "INSERT INTO reservations (listing_id, user_id, start_date, end_date) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "iiss", $listing_id, $user_id, $start_date, $end_date);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php");
    } else {
        echo "Error: Could not complete the reservation.";
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>
