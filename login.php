<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="forms.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>


<div class="container">
    <form id="contactForm" action="">
        <h3>Log In</h3>
        
        <div class="inputField">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="input">
            <p></p>
        </div>

        

        <div class="inputField">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="input">
            <p id="passwordText"></p>
        </div>
    
        <input type="submit" value="Log In" id="button">
        <p>Don't have an account ? <a href="signup.html">Create one!</a></p>
    </form>
</div>

<script src="formScript.js"></script>
</body>
</html>