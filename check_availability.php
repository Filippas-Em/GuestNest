<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Save the user input in variables
    $checkin = mysqli_real_escape_string($conn, $_POST['checkin']);
    $checkout = mysqli_real_escape_string($conn, $_POST['checkout']);
    $listing_id = mysqli_real_escape_string($conn, $_POST['listing_id']);
    $listing_price = mysqli_real_escape_string($conn, $_POST['listing_price']);
    
    // Validate that checkin date is before checkout date
    $checkinDate = new DateTime($checkin);
    $checkoutDate = new DateTime($checkout);
    
    if ($checkinDate >= $checkoutDate) {
        echo json_encode(['status' => 'error', 'message' => 'Check-in date must be before checkout date']);
        exit; // Exit script if validation fails
    }

    // Log message to error log
    error_log("Checking availability for listing ID: $listing_id, Check-in: $checkin, Check-out: $checkout");

    // Calculate number of days
    $interval = $checkinDate->diff($checkoutDate);
    $days = $interval->days;

    // Check availability in the database
    $sql = "SELECT * FROM reservations WHERE listing_id = ? AND  
            ((start_date <= ? AND end_date >= ?) OR 
             (start_date <= ? AND end_date >= ?) OR                     
             (start_date >= ? AND start_date <= ?))";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "issssss", $listing_id, $checkout, $checkin, $checkin, $checkout, $checkin, $checkout);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    // Pass JSON data to the JavaScript script to calculate user's payment and manage booking form availability
    if (mysqli_stmt_num_rows($stmt) > 0) {
        echo json_encode(['status' => 'unavailable', 'days' => $days, 'listing_price' => $listing_price]);
    } else {
        echo json_encode(['status' => 'available', 'days' => $days, 'listing_price' => $listing_price]);
    }
    
    // Close statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
