document.addEventListener("DOMContentLoaded", () => {
    const loginForms = document.getElementById("contactFom");
    const failMessage = document.getElementById("failMessage");

    if (loginForms) {
        loginForms.addEventListener("submit", function(event) {
            event.preventDefault();

            const loginData = new FormData(loginForms);

            fetch("login.php", {
                method: "POST",
                body: loginData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "failed") {
                    console.log("wrong username or password!");
                    failMessage.innerText = "Wrong Username or Password";
                } else if (data.status === "success") {
                    console.log("success");
                    window.location.href = "index.php";  
                }
            })
            .catch(error => console.error('Error:', error));
        });
    }
});
