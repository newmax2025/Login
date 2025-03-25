<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['username'];
    $senha = $_POST['password'];

    // Busca o usuário no banco
    $sql = "SELECT * FROM clientes WHERE usuario = :usuario";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($senha, $user['senha'])) {
        session_start();
        $_SESSION["usuario"] = $usuario;
        header("Location: painel.php");
        exit;
    } else {
    echo "Usuário ou senha inválidos!";
    }

    } else {
        echo "Acesso negado!";
}
?>
