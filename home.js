const login = document.getElementById("login") ;
const popup = document.getElementById("test");
const cancel = document.getElementById("cancel");
const loginPopup = document.getElementById("loginpopup");
const signupPopup = document.getElementById("signuppopup");
const loginForm =  document.querySelector(".logIn") ;
const signupForm = document.querySelector(".signUp") ;
const linkCheck = document.getElementById("linkCheck");


login.addEventListener("click", function() {
    popup.classList.remove("hidden");
})
cancel.addEventListener("click", function() {
    popup.classList.add("hidden");
})



loginPopup.addEventListener("click", function() {
    signupPopup.style.backgroundColor = "#FF5A5F";
    loginPopup.style.backgroundColor = "white";
    loginForm.classList.remove("hidden");
    signupForm.classList.add("hidden");
})

signupPopup.addEventListener("click", function() {
    signupPopup.style.backgroundColor = "white";
    loginPopup.style.backgroundColor = "#FF5A5F";
    loginForm.classList.add("hidden");
    signupForm.classList.remove("hidden");
})


const navlist = document.getElementById("listing");
const navLogin = document.getElementById("login");
const navLogout = document.getElementById("logout");

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
        showHiddenFeatures();
    } else {
        hideHiddenFeatures();
    }
});

function showHiddenFeatures() {
   navlist.classList.remove("hidden");
   navLogout.classList.remove("hidden");
   navLogin.classList.add("hidden");
}

function hideHiddenFeatures() {
    navlist.classList.add("hidden");
    navLogout.classList.add("hidden");
    navLogin.classList.remove("hidden");
}

const buttons = document.getElementsById('bookBtn');



for (let i = 0; i < buttons.length; i++) {


    buttons[i].addEventListener('click', function() {
        console.log("test");
        let loggedIn = getCookie("loggedin");
        if (loggedIn === null){
        popup.classList.remove("hidden");
    }
    });
}



