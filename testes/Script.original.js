document.addEventListener("DOMContentLoaded", function () {
    document
    .getElementById("loginForm")
    .addEventListener("submit", function (event) {
        event.preventDefault();
        const username = document.getElementById("username").value;
        const password = document.getElementById("password").value;
        const errorMessage = document.getElementById("error-message");

        fetch("login.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ username, password }),
        })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
            window.location.href = data.redirect;
            } else {
            errorMessage.textContent = data.message;
            errorMessage.style.color = "red";
            }
        })
        .catch((error) => {
            console.error("Erro ao conectar com o servidor:", error);
            errorMessage.textContent = "Erro ao conectar com o servidor!";
            errorMessage.style.color = "red";
        });
    });
});
