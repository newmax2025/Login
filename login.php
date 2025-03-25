<?php
require 'config.php'; // Importa a conexão com o banco

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['username'];
    $senha = $_POST['password'];
    $captchaResponse = $_POST['cf-turnstile-response'];

    // 1️⃣ Verifica se o CAPTCHA foi preenchido
    if (empty($captchaResponse)) {
        echo "Erro: CAPTCHA obrigatório!";
        exit;
    }

    // 2️⃣ Verifica se o usuário e senha estão no banco
    $sql = "SELECT * FROM admin WHERE usuario = :usuario AND senha = :senha";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
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
