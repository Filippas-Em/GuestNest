<?php
session_start();
include 'config.php';

$sql = "SELECT * FROM listings";
$result = mysqli_query($conn, $sql);

$listings = [];
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $listings[] = $row;
    }
}

mysqli_close($conn);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest Nest</title>
    
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="navbars.css">
    <link rel="stylesheet" href="forms.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">


</head>
<body>


    <div class="wrapper">
        <nav class="desktopNav">
            <ul >
                <li><a href="">Guest Nest</a></li>
                <li id="listing"class="createListing hidden"><a href="listing.html">Create Listing</a></li>
                <li id="login" class="login"><a href="#">Log In</a></li>
                <li id="logout" class="logout " ><a href="logout.php">Log Out</a></li>
            </ul>
        </nav>
        <nav class="mobileNav"></nav>   

        <div class="container">
            <?php if (!empty($listings)): ?>
                <?php foreach ($listings as $listing): ?>
                    <div class="box">
                        <img src="<?php echo htmlspecialchars($listing['image_path']); ?>" alt="">
                        <h3><?php echo htmlspecialchars($listing['title']); ?></h3>
                        <div class="info">
                            <div class="specInfo">
                                <p class="location"><?php echo htmlspecialchars($listing['location']); ?></p>
                                <p class="rooms">Rooms: <?php echo htmlspecialchars($listing['rooms']); ?></p>
                            </div>
                            <p><span class="price"><?php echo htmlspecialchars($listing['price']); ?> €</span> per Night</p>
                        </div>
                        <a href="book_listing.php?listing_id=<?php echo htmlspecialchars($listing['id']); ?>&image_path=<?php echo urlencode($listing['image_path']); ?>" class="bookBtn">Book Me</a>
                        </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No listings available.</p>
            <?php endif; ?>


            <div class="box">
                <img src="Assets/room photo.png" alt="">
                <h3>Here is the Title</h3>
                <div class="info">
                    <div class="specInfo">
                        <p class="location">Kallithea</p>
                        <p class="rooms">Rooms: 2</p>
                    </div>
                    <p> <span class="price">80 €</span> per Night</p>
                </div>
                <button  class="bookBtn">Book Me</button>
            </div>
            <div class="box">
                <img src="Assets/room photo.png" alt="">
                <h3>Here is the Title</h3>
                <div class="info">
                    <div class="specInfo">
                        <p class="location">Kallithea</p>
                        <p class="rooms">Rooms: 2</p>
                    </div>
                    <p> <span class="price">80 €</span> per Night</p>
                </div>
                <button class="bookBtn">Book Me</button>
            </div>
            <div class="box">
                <img src="Assets/room photo.png" alt="">
                <h3>Here is the Title</h3>
                <div class="info">
                    <div class="specInfo">
                        <p class="location">Kallithea</p>
                        <p class="rooms">Rooms: 2</p>
                    </div>
                    <p> <span class="price">80 €</span> per Night</p>
                </div>
                <button class="bookBtn">Book Me</button>
            </div>
            <div class="box">
                <img src="Assets/room photo.png" alt="">
                <h3>Here is the Title</h3>
                <div class="info">
                    <div class="specInfo">
                        <p class="location">Kallithea</p>
                        <p class="rooms">Rooms: 2</p>
                    </div>
                    <p> <span class="price">80 €</span> per Night</p>
                </div>
                <button class="bookBtn">Book Me</button>
            </div>
            <div class="box">
                <img src="Assets/room photo.png" alt="">
                <h3>Here is the Title</h3>
                <div class="info">
                    <div class="specInfo">
                        <p class="location">Kallithea</p>
                        <p class="rooms">Rooms: 2</p>
                    </div>
                    <p> <span class="price">80 €</span> per Night</p>
                </div>
                <button class="bookBtn">Book Me</button>
            </div>
            <div class="box">
                <img src="Assets/room photo.png" alt="">
                <h3>Here is the Title</h3>
                <div class="info">
                    <div class="specInfo">
                        <p class="location">Kallithea</p>
                        <p class="rooms">Rooms: 2</p>
                    </div>
                    <p> <span class="price">80 €</span> per Night</p>
                </div>
                <button class="bookBtn">Book Me</button>
            </div>
            <div class="box">
                <img src="Assets/room photo.png" alt="">
                <h3>Here is the Title</h3>
                <div class="info">
                    <div class="specInfo">
                        <p class="location">Kallithea</p>
                        <p class="rooms">Rooms: 2</p>
                    </div>
                    <p> <span class="price">80 €</span> per Night</p>
                </div>
                <button class="bookBtn">Book Me</button>
            </div>
            <div class="box">
                <img src="Assets/room photo.png" alt="">
                <h3>Here is the Title</h3>
                <div class="info">
                    <div class="specInfo">
                        <p class="location">Kallithea</p>
                        <p class="rooms">Rooms: 2</p>
                    </div>
                    <p> <span class="price">80 €</span> per Night</p>
                </div>
                <button class="bookBtn">Book Me</button>
            </div>
           

        </div>
    </div>
    
    <div class="authForms hidden" id="test">
        <div class="selection">
            <div class="loginDiv">
                <button id="loginpopup" class="popupBtn">Login</button>
            </div>
            <div class="signupDiv">
                <button id="signuppopup" class="popupBtn">Sign Up</button>
            </div>
        </div>

        <form id="contactFom" class="logIn" action="login.php" method="post">
            <div class="loginText">
                <h3>Log In</h3>
                <p>Don't have an account ? <br>Create one !</p>
            </div>
            
        

            <div class="inputField">
                <label for="username">Username</label>
                <input type="text" name="username" id="usernames" class="input">
                <p></p>
            </div>
    
            
    
            <div class="inputField">
                <label for="password">Password</label>
                <input type="password" name="password" id="passwords" class="input">
                <p id="passwordText"></p>
            </div>
        
            <input type="submit" value="Log In" id="button">
        </form>
 
        <form id="contactForm" class="signUp hidden" action="signup.php" method="post">
            <h3>Sign Up</h3>
            <div class="inputField">
                <label for="firstName">First Name</label>
                <input type="text" name="firstName" id="firstName" class="input"> 
                <p></p>
            </div>
            <div class="inputField">
                <label for="lastName">Last Name</label>
                <input type="text" name="lastName" id="lastName" class="input">
                <p></p>
            </div>
            <div class="inputField">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="input">
                <p></p>
            </div>
    
            <div class="inputField"> 
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="input">
                <p></p>
            </div>
    
            <div class="inputField">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="input">
                <p id="passwordText"></p>
            </div>
        
            <div class="inputField cp">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" name="confirmPassword" id="passwordConfirm" class="input">
                <p></p>
            </div>
    
           
            
            
            <input type="submit" value="Sign up" id="button">
        </form>

        <p id="cancel" >Cancel</p>
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

    <script src="formScript.js"></script>
    <script src="home.js"></script>
</body>
</html>