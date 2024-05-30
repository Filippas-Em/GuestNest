
form = document.getElementById("contactForm");

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
                label.style.fontSize = "20px";
                label.style.color = "black";
            }
        });
    });
  });














    




 

 