<?php
require 'config.php'; // Conexão com o banco

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['username'];
    $senha = $_POST['password'];
    $captchaResponse = $_POST['cf-turnstile-response'];

    //Verifica se o CAPTCHA foi preenchido
    if (empty($captchaResponse)) {
        echo "Erro: CAPTCHA obrigatório!";
        exit;
    }

    //Busca o usuário no banco
    $sql = "SELECT * FROM clientes WHERE usuario = :usuario";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user) {
    echo "Usuário encontrado no banco!<br>";
    echo "Senha digitada: " . $senha . "<br>";
    echo "Senha no banco: " . $user['senha'] . "<br>";

    if (password_verify($senha, $user['senha'])) {
        echo "Senha correta!";
    } else {
        echo "Senha incorreta!";
    }
} else {
    echo "Usuário não encontrado!";
}
exit;


    //Verifica se o usuário existe e se a senha está correta
    if ($user && password_verify($senha, $user['senha'])) {
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
