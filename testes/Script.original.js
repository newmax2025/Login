document.addEventListener("DOMContentLoaded", function () {
    document
    .getElementById("loginForm")
    .addEventListener("submit", async function (event) {
        event.preventDefault();

        const username = document.getElementById("username").value.trim();
        const password = document.getElementById("password").value.trim();
        const errorMessage = document.getElementById("error-message");

        if (!username || !password) {
        errorMessage.textContent = "Preencha todos os campos!";
        errorMessage.style.color = "red";
        return;
        }

        try {
        const response = await fetch("login.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ username, password }),
        });

        const result = await response.json();
        console.log("Resposta do servidor:", result); // <-- Mostra a resposta no Console

        if (result.success) {
            window.location.href = result.redirect;
        } else {
            errorMessage.textContent = result.message;
            errorMessage.style.color = "red";
        }
        } catch (error) {
        console.error("Erro ao conectar ao servidor:", error);
        errorMessage.textContent = "Erro ao conectar ao servidor!";
        errorMessage.style.color = "red";
        }
    });
});
