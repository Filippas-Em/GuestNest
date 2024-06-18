<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $checkin = mysqli_real_escape_string($conn, $_POST['checkin']);
    $checkout = mysqli_real_escape_string($conn, $_POST['checkout']);
    $listing_id = mysqli_real_escape_string($conn, $_POST['listing_id']);

    $sql = "SELECT * FROM reservations WHERE listing_id = ? AND 
            ((start_date <= ? AND end_date > ?) OR (start_date < ? AND end_date >= ?))";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "issss", $listing_id, $checkout, $checkin, $checkout, $checkin);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        echo json_encode(['status' => 'unavailable']);
    } else {
        echo json_encode(['status' => 'available']);
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>
