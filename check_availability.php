<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $checkin = mysqli_real_escape_string($conn, $_POST['checkin']);
    $checkout = mysqli_real_escape_string($conn, $_POST['checkout']);
    $listing_id = mysqli_real_escape_string($conn, $_POST['listing_id']);
    $listing_price = mysqli_real_escape_string($conn, $_POST['listing_price']);
    
    error_log("Checking availability for listing ID: $listing_id, Check-in: $checkin, Check-out: $checkout");

    $checkinDate = new DateTime($checkin);
    $checkoutDate = new DateTime($checkout);
    $interval = $checkinDate->diff($checkoutDate);
    $days = $interval->days;


    $sql = "SELECT * FROM reservations WHERE listing_id = ? AND 
            ((start_date <= ? AND end_date >= ?) OR 
             (start_date <= ? AND end_date >= ?) OR 
             (start_date >= ? AND start_date <= ?))";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "issssss", $listing_id, $checkout, $checkin, $checkin, $checkout, $checkin, $checkout);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        echo json_encode(['status' => 'unavailable', 'days' => $days, 'listing_price' => $listing_price]);
    } else {
        echo json_encode(['status' => 'available', 'days' => $days, 'listing_price' => $listing_price]);
    }
    
    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>
