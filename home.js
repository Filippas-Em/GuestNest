const login = document.getElementById("login") ;
const popup = document.getElementById("test");
const cancel = document.getElementById("cancel");
const loginPopup = document.getElementById("loginpopup");
const signupPopup = document.getElementById("signuppopup");
const loginForm =  document.querySelector(".logIn") ;
const signupForm = document.querySelector(".signUp") ;


login.addEventListener("click", function() {
    console.log("Hello");
    popup.classList.remove("hidden");
})
cancel.addEventListener("click", function() {
    popup.classList.add("hidden");
})



loginPopup.addEventListener("click", function() {
    console.log("Hey");
    signupPopup.style.backgroundColor = "#FF5A5F";
    loginPopup.style.backgroundColor = "white";
    loginForm.classList.remove("hidden");
    signupForm.classList.add("hidden");
})

signupPopup.addEventListener("click", function() {
    console.log("Hey")
    signupPopup.style.backgroundColor = "white";
    loginPopup.style.backgroundColor = "#FF5A5F";
    loginForm.classList.add("hidden");
    signupForm.classList.remove("hidden");
})