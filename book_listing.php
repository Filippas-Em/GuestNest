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
    } else {
        echo 'Listing not found.';
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
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="navbars.css">
    <link rel="stylesheet" href="bookingStyles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">




</head>
<body>
    <div class="wrapper">
        <nav class="desktopNav">
            <ul >
                <li><a href="">Guest Nest</a></li>
                <li id="listing"class="createListing "><a href="listing.html">Create Listing</a></li>
                <li id="logout" class="logout " ><a href="logout.php">Log Out</a></li>
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
                        <h3 id="title"><?php echo htmlspecialchars($title); ?></h3>
                        
                        <p id="location"><?php echo htmlspecialchars($location); ?></p>
                    </div>
                    <div class="dataPrice">
                        <p> <img src="Assets/bed-alt.png" alt="bedIcon"><?php echo htmlspecialchars($rooms); ?></p>
                        <p id="price"> <img src="Assets/brand.png" alt="moneyIcon"> <h3>€ <?php echo htmlspecialchars($price); ?></h3> /Night</p>
                    </div>
                    <div class="datePicker">
                        <form id="calendar" action="check_availability.php" method="POST">
                            <h4>Check for available dates</h4>
                            <label for="checkin">Check-in:</label>
                            <input type="date" id="checkin" name="checkin" required>
                            <label for="checkout">Check-out:</label>
                            <input type="date" id="checkout" name="checkout"  required>
                            <input type="hidden" name="listing_id" value="<?php echo $listing_id; ?>">
                            <input type="submit" id="button" value="Check Availability">
                        </form>
                    </div>
                </div>
            </div>
           

        </div>
    </div>
    <div class="description">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis quibusdam quod beatae unde recusandae excepturi, amet modi. Velit impedit modi nihil rem tempora, aliquid dignissimos deleniti! Veniam corporis dignissimos ratione.
        Repudiandae, culpa modi quam quibusdam atque sint pariatur deleniti hic quas error, quaerat voluptatibus fuga consequuntur voluptatum eveniet ipsa quod obcaecati aliquid labore consectetur fugiat nemo deserunt tenetur praesentium. Quis.
        Quaerat natus ex eligendi laudantium reiciendis, perspiciatis error a voluptatibus omnis quos nihil reprehenderit eos. Aliquam odit repellendus officia autem quod aliquid, ipsa vitae cum iusto. Commodi architecto veritatis amet.
        Nam tenetur ipsa doloremque nulla incidunt quo esse perspiciatis, vero, aut maxime eveniet placeat, architecto cum dolorem dolores itaque! Nesciunt sapiente corporis rerum placeat itaque ratione quidem quam doloribus reiciendis.</p>
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
</body>
</html>