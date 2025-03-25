<?php
require 'config.php'; // Conexão com o banco

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha']; // Sem criptografia
 // Senha segura

    // Insere o usuário no banco
    $sql = "INSERT INTO clientes (usuario, senha) VALUES (:usuario, :senha)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':senha', $senha);

    if ($stmt->execute()) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar!";
    }
}
?>
