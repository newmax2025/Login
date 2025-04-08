<?php
require_once 'conexao.php'; // Certifique-se de que a conexão com o banco esteja correta

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$username = $data['username'] ?? '';
$novaSenha = $data['novaSenha'] ?? '';

if (!$username || !$novaSenha) {
    echo json_encode(['success' => false, 'message' => 'Campos obrigatórios não fornecidos.']);
    exit;
}

try {
    $senhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("UPDATE clientes SET senha = :senha WHERE usuario = :usuario");
    $stmt->execute([':senha' => $senhaHash, ':usuario' => $username]);

    if ($stmt->rowCount() > 0) {
        echo json_encode(['success' => true, 'message' => 'Senha alterada com sucesso.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Usuário não encontrado ou senha idêntica.']);
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Erro ao alterar senha: ' . $e->getMessage()]);
}
