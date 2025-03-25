<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Filtra e sanitiza os inputs
    $usuario = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    if (empty($usuario) || empty($senha)) {
        die("Usuário e senha são obrigatórios!");
    }

    try {
        // Verifica se o usuário já existe
        $sql_check = "SELECT COUNT(*) FROM clientes WHERE usuario = :usuario";
        $stmt_check = $pdo->prepare($sql_check);
        $stmt_check->bindParam(':usuario', $usuario);
        $stmt_check->execute();
        $user_exists = $stmt_check->fetchColumn();

        if ($user_exists) {
            die("Erro: Usuário já cadastrado!");
        }

        // Hash da senha antes de salvar no banco
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        // Insere o usuário no banco de dados
        $sql = "INSERT INTO clientes (usuario, senha) VALUES (:usuario, :senha)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':senha', $senha_hash);

        if ($stmt->execute()) {
            echo "Usuário cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar usuário!";
        }
    } catch (PDOException $e) {
        error_log($e->getMessage()); // Registra erro no log
        echo "Erro no sistema. Tente novamente mais tarde!";
    }
}
?>
