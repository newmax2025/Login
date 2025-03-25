<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['username'];
    $senha = $_POST['password'];

    // Busca o usuário no banco
    $sql = "SELECT * FROM clientes WHERE usuario = :usuario AND senha = :senha";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        session_start();
        $_SESSION["usuario"] = $usuario;
        header("Location: painel.php"); // Redireciona para o painel
        exit;
    } else {
        echo "Usuário ou senha inválidos!";
    }
} else {
    echo "Acesso negado!";
}
?>
