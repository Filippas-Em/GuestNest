
form = document.getElementById("contactForm");

//functionality for the form inputs e.g. value validation and messages in case its not valid (red border,label move when input populated)

form.addEventListener('input', function(event) {
    const inputs = document.querySelectorAll("#firstName, #lastName");

    inputs.forEach(inputElement => {
        const text = inputElement.nextElementSibling;
        const label = inputElement.previousElementSibling;
        const regex = /\d/;

        if (inputElement.value.trim() === "") {
            label.style.color = "black";
            inputElement.style.borderColor = "black";
            text.style.color = "black";
        } else if (regex.test(inputElement.value)) {
            text.innerHTML = "Must contain only letters";
            text.style.color = "red";
            inputElement.style.borderColor = "red";
            label.style.color = "red";
        } else {
            text.innerHTML = "";
            inputElement.style.borderColor = "limegreen";
            label.style.color = "limegreen";
        }
    
    });
        
    const email = document.getElementById("email");
    const emailText = email.nextElementSibling;
    const emailLabel = email.previousElementSibling;

    if (email.value.trim() === "") {
            emailLabel.style.color = "black";
            email.style.borderColor = "black";
            emailText.innerHTML = "";
    } else if (!email.value.includes("@") || !email.value.includes(".")) {
            emailText.innerHTML = "Invalid email";
            emailText.style.color = "red";
            email.style.borderColor = "red";
            emailLabel.style.color = "red";
    } else {
            emailText.innerHTML = "";
            email.style.borderColor = "limegreen";
            emailLabel.style.color = "limegreen";
    }
    
    const password = document.getElementById("password"); 
    const passwordText = password.nextElementSibling; 
    const passwordLabel = password.previousElementSibling;
    const regex = /\d/; 
    let valid = false;

    if (password.value.length <4 && password.value.trim() !== "" ) {
        if (regex.test(password.value)) {
            passwordText.innerHTML = "Must be at least 4 characters long";
            
        } else {
            passwordText.innerHTML = "Must be at least 4 characters and contain at least one number";
            
        }
        
        passwordText.style.color = "red";
        password.style.borderColor = "red";
        passwordLabel.style.color = "red";

    } else if (password.value.length >10){
        passwordText.innerHTML = "Must be less than 10 characters";
        passwordText.style.color = "red";
        password.style.borderColor = "red";
        passwordLabel.style.color = "red";
    } else if (password.value.trim() === ""){
        passwordText.innerHTML = "";
        password.style.borderColor = "black";
        passwordLabel.style.color = "black";

    }else {
        if (regex.test(password.value)) {
            passwordText.innerHTML = "";
            password.style.borderColor = "limegreen";
            passwordLabel.style.color = "limegreen";
            valid = true;
        } else if ( password.value.trim() !== "" ) {
            passwordText.innerHTML = "Must contain at least one number";
            passwordText.style.color = "red";
            password.style.borderColor = "red";
            passwordLabel.style.color = "red";
            
        }
    }

    passwordConfirm = document.getElementById("passwordConfirm");
    passwordConfirmText = passwordConfirm.nextElementSibling;
    passwordConfirmLabel = passwordConfirm.previousElementSibling;

    console.log(valid);


    if (passwordConfirm.value.trim() === "") {
        passwordConfirmText.innerHTML = "";
        passwordConfirm.style.borderColor = "black";
        passwordConfirmLabel.style.color = "black";
    } else if (passwordConfirm.value !== password.value && valid === true) {
        passwordConfirmText.innerHTML = "Passwords do not match";
        passwordConfirmText.style.color = "red";
        passwordConfirm.style.borderColor = "red";
        passwordConfirmLabel.style.color = "red";
    } else if (valid === true) {
        passwordConfirmText.innerHTML = "";
        passwordConfirm.style.borderColor = "limegreen";
        passwordConfirmLabel.style.color = "limegreen";
    } 

    const username = document.getElementById("username");
    const usernameLabel = username.previousElementSibling;    

    if (username.value.trim()!=="") {
        username.style.borderColor = "limegreen";
        usernameLabel.style.color = "limegreen";
    } else {
        username.style.borderColor = "black";
        usernameLabel.style.color = "black";
    }

});




document.addEventListener("DOMContentLoaded", function() {
    const inputs = document.querySelectorAll(".input");
  
    inputs.forEach(input => {
        const label = input.previousElementSibling;
  
        if (input.value) {
            label.style.transform = "translateY(-20px)";
            label.style.fontSize = "12px";
            label.style.color = "black";
        }
  
        input.addEventListener('focus', function() {
            label.style.transform = "translateY(-30px)";
            label.style.fontSize = "15px";
            label.style.color = "black";
        });
  
        input.addEventListener('blur', function() {
            if (!this.value) {
                label.style.transform = "translateY(0px)";
                label.style.fontSize = "15px";
                label.style.color = "black";
            }
        });
    });
  });














    




 

 