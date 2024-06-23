<?php
session_start();
include 'config.php';


if (isset($_GET['listing_id'])) {
    //save the listing id in order to know which listing to populate the page with
    $listing_id = mysqli_real_escape_string($conn, $_GET['listing_id']);

    // find the correct column in the listing table using the listing id and fetch its data
    $sql = "SELECT * FROM listings WHERE id = '$listing_id'";
    $result = mysqli_query($conn, $sql);
    
    //fetch and save the data in variables
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $title = $row['title'];
        $location = $row['location'];
        $rooms = $row['rooms'];
        $price = $row['price'];
        $image_path = $row['image_path'];
        $description = $row['description'];
        $user_id = $row['user_id'];
    } else {
        echo 'Listing not found.';
    }

        
    
    // find the correct column in the listing table using the user id and fetch its data
    $sql = "SELECT * FROM users WHERE id = '$user_id'";
    $result = mysqli_query($conn, $sql);
    //fetch and save the data in variables
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
    } else {
        echo 'user not found.';
    }

} else {
    echo 'Listing ID not provided.';
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Page</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="navbars.css">
    <link rel="stylesheet" href="bookingStylesNew.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <nav class="desktopNav">
            <ul>
                <li><a href="index.php">Guest Nest</a></li>
                <li id="listing" class="createListing"><a href="listing.html">Create Listing</a></li>
                <li id="logout" class="logout"><a href="logout.php">Log Out</a></li>
            </ul>
        </nav>
    </div>
    
    <div class="content">
        <div class="data">
            <div class="dataImage">
                <?php echo '<img src="' . htmlspecialchars($image_path) . '" alt="">'; ?>
            </div>
            <div class="information">
                <div class="dataText">
                    <div class="dataTitle">
                        <h3 class="title"><?php echo htmlspecialchars($title); ?></h3>
                        <p class="location"><?php echo htmlspecialchars($location); ?></p>
                    </div>
                    <div class="dataPrice ">
                        <p><img src="Assets/bed-alt.png" alt="bedIcon"><?php echo htmlspecialchars($rooms); ?></p>
                        <p class="price"><img src="Assets/brand.png" alt="moneyIcon"><h3>€ <?php echo htmlspecialchars($price); ?></h3> /Night</p>
                    </div>




                    <div class="datePicker ">
                        <div id="" class="calendarForm">
                        <form id="calendar1" class="test " method="POST">
                            <h4>Check for available dates</h4>
                            <label for="checkin">Check-in</label>
                            <input type="date" id="checkin" name="checkin" required>
                            <label for="checkout">Check-out</label>
                            <input type="date" id="checkout" name="checkout" required>
                            <input type="hidden" id="listing_price" name="listing_price" value="<?php echo $price; ?>">
                            <input type="hidden" name="listing_id" value="<?php echo $listing_id; ?>">
                            <input type="submit" id="button" value="Check Availability">
                            <p class="pseudolink"></p>
                        </form>
                        
                        </div>
                        
                        <p id="availabilityMessage"></p>



                        <div class="booking hidden">
                        <form id="bookingForm" class="bookingForm hidden" action="complete_booking.php" method="POST">
                            <h4>Book it!</h4>
                            <input type="hidden" name="listing_id" value="<?php echo $listing_id; ?>">
                            <input type="hidden" id="start_date" name="start_date">
                            <input type="hidden" id="end_date" name="end_date">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($first_name); ?>" required>
                            <label for="lastname">Last Name</label>
                            <input type="text" id="lastname" name="lastname" value="<?php echo htmlspecialchars($last_name); ?>" required>
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>

                            <div class="priceInfo">
                                <p>Original Price: <span id="priceDisplay"></span></p>
                                <p>Discount: <span id="discountDisplay"></span></p>
                                <p>Total: <span id="totalDisplay"></span></p>
                            </div>

                            <input type="submit" id="bookButton" value="Complete Booking">
                            <a id="backButton" href="">Back</a>
                        </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="descriptionWrapper">
        <div class="description">
            <h4>Listing Description</h4>
            <p><?php echo htmlspecialchars($description); ?></p>
        </div>
    </div>
   

    <footer class="footer">
        <div class="footerContainer">
            <div class="mapContainer"> 
                <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25170.611724393242!2d23.62671809905774!3d37.94616254717455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14a1bbebb7ac3147%3A0xd820da95ff30fdf7!2zzqDOtc65z4HOsc65zqzPgg!5e0!3m2!1sel!2sgr!4v1718112651516!5m2!1sel!2sgr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>  
            </div>
            <div class="info">
                <p><img src="Assets/phone-call.png" alt=""> Give us a call : <a href="tel:+306943694628">+30 694 369 4628</a></p>
                <p><img src="Assets/envelope.png" alt=""> Email us: <a href="mailto:emmanouil.filippas@gmail.com">emmanouil.filippas@gmail.com</a></p>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>

</body>
</html>
