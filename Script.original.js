const users = {};  // Armazenamento dos usuários
const adminUsername = "@admin";
const adminPassword = "2025";
const userUsername = "visitante285";
const userPassword = "125481";

// Adiciona um usuário ao sistema
function addUser(username, password) {
    users[username] = password;
}

// Remove um usuário do sistema
function removeUser(username) {
    delete users[username];
}

// Expõe a função de adicionar usuários para o painel de administração
window.addUser = addUser;
window.removeUser = removeUser;

// Função para obter os usuários do localStorage
function getUsers() {
    return JSON.parse(localStorage.getItem('users')) || {};  // Retorna os usuários ou um objeto vazio caso não existam
}

// Função para salvar os usuários no localStorage
function saveUsers(users) {
    localStorage.setItem('users', JSON.stringify(users));
}

// Função para adicionar um usuário
function addUser(username, password) {
    const users = getUsers();
    users[username] = password;
    saveUsers(users);
}

// Função para remover um usuário
function removeUser(username) {
    const users = getUsers();
    delete users[username];
    saveUsers(users);
}

document.addEventListener("DOMContentLoaded", function () {
    document
    .getElementById("loginForm")
    .addEventListener("submit", function (event) {
        event.preventDefault();
        const username = document.getElementById("username").value;
        const password = document.getElementById("password").value;
        const errorMessage = document.getElementById("error-message");

        if (username === adminUsername && password === adminPassword) {
        window.location.href = "admin.html"; // Redireciona para o painel de admin
        } else if (username === userUsername && password === userPassword) {
        window.location.href = "AM.html"; // Redireciona para o painel de usuário comum
        } else {
        const users = getUsers();
        if (users[username] && users[username] === password) {
          window.location.href = "AM.html"; // Redireciona usuários cadastrados
        } else {
            errorMessage.textContent = "Usuário ou senha inválidos!";
            errorMessage.style.color = "red";
        }
        }
    });

  // Expõe a função de adicionar usuários para o painel de administração
    window.addUser = addUser;
    window.removeUser = removeUser;
});

