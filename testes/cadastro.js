document
  .getElementById("cadastroForm")
  .addEventListener("submit", async function (event) {
    event.preventDefault();

    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    const tipoUsuario = document.getElementById("tipoUsuario").value;
    const mensagem = document.getElementById("mensagem");

    const response = await fetch("cadastro.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ username, password, tipoUsuario }),
    });

    const result = await response.json();

    if (result.success) {
      mensagem.textContent = "Cadastro realizado com sucesso!";
      mensagem.style.color = "green";
    } else {
      mensagem.textContent = result.message;
      mensagem.style.color = "red";
    }
  });
