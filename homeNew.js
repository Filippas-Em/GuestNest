const login = document.getElementById("login") ;
const login2 = document.getElementById("login2");
const popup = document.getElementById("test");
const cancel = document.getElementById("cancel");
const loginPopup = document.getElementById("loginpopup");
const signupPopup = document.getElementById("signuppopup");
const loginForm =  document.querySelector(".logIn") ;
const signupForm = document.querySelector(".signUp") ;
const linkCheck = document.getElementById("linkCheck");




//signup login form show
login.addEventListener("click", function() {
    popup.classList.remove("hidden");
})
login2.addEventListener("click", function() {
    popup.classList.remove("hidden");
    console.log("clicked");
})

cancel.addEventListener("click", function() {
    popup.classList.add("hidden");
})


//login button style changes when clicked
loginPopup.addEventListener("click", function() {
    signupPopup.style.backgroundColor = "#FF5A5F";
    loginPopup.style.backgroundColor = "white";
    loginForm.classList.remove("hidden");
    signupForm.classList.add("hidden");
})
//login button style changes when clicked

signupPopup.addEventListener("click", function() {
    signupPopup.style.backgroundColor = "white";
    loginPopup.style.backgroundColor = "#FF5A5F";
    loginForm.classList.add("hidden");
    signupForm.classList.remove("hidden");
})


const navlist = document.getElementById("listing");
const navLogin = document.getElementById("login");
const navLogout = document.getElementById("logout");

const navlist2 = document.getElementById("listing2");
const navLogin2 = document.getElementById("login2");
const navLogout2 = document.getElementById("logout2");



function getCookie(name) {
    let cookies = document.cookie.split('; ');
    for (let cookie of cookies) {
        let [cookieName, cookieValue] = cookie.split('=');
        if (cookieName === name) {
            return decodeURIComponent(cookieValue);
        }
    }
    return null;
}

document.addEventListener('DOMContentLoaded', (event) => {
    
    let loggedIn = getCookie('loggedin');
    if (loggedIn === "1") {
        //if cookie value is one it means the user is logged in and we can show the hidden features
        showHiddenFeatures();
    } else {
        hideHiddenFeatures();
    }
});

//declare functions for user form
function showHiddenFeatures() {  
   navlist.classList.remove("hidden");
   navLogout.classList.remove("hidden");
   navLogin.classList.add("hidden");
   navlist2.classList.remove("hidden");
   navLogout2.classList.remove("hidden");
   navLogin2.classList.add("hidden");
}
//declare functions for user form
function hideHiddenFeatures() {
    navlist.classList.add("hidden");
    navLogout.classList.add("hidden");
    navLogin.classList.remove("hidden");
    navlist2.classList.add("hidden");
    navLogout2.classList.add("hidden");
    navLogin2.classList.remove("hidden");
}

const buttons = document.getElementsByClassName('bookBtn');



for (let i = 0; i < buttons.length; i++) {

    //show the login popup if a user isnt logged in and tries to book a room
    buttons[i].addEventListener('click', function() {
        let loggedIn = getCookie("loggedin");
        if (loggedIn === null){
        popup.classList.remove("hidden");
    }
    });
}



