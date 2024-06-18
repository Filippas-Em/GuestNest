<?php
session_start();
include 'config.php';

if (isset($_GET['listing_id'])) {
    $listing_id = mysqli_real_escape_string($conn, $_GET['listing_id']);

    // Query to fetch listing details from database
    $sql = "SELECT * FROM listings WHERE id = '$listing_id'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $title = $row['title'];
        $location = $row['location'];
        $rooms = $row['rooms'];
        $price = $row['price'];
        $image_path = $row['image_path'];
        $description = $row['description'];

        // Display the listing details
        echo '<div class="container">';
        echo '<div class="box">';
        echo '<img src="' . htmlspecialchars($image_path) . '" alt="">';
        echo '<h3>' . $title . '</h3>';
        echo '<div class="info">';
        echo '<div class="specInfo">';
        echo '<p class="location">' . $location . '</p>';
        echo '<p class="rooms">Rooms: ' . $rooms . '</p>';
        echo '</div>';
        echo '<p> <span class="price">' . $price . ' €</span> per Night</p>';
        echo '</div>';
        echo '<p>' . $description . '</p>';
        echo '<a href="booking_form.php?listing_id=' . $listing_id . '" class="bookBtn">Proceed to Booking</a>';
        echo '</div>';
        echo '</div>';
    } else {
        echo 'Listing not found.';
    }
} else {
    echo 'Listing ID not provided.';
}
?>
