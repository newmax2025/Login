<?php
session_start();
header("Content-Type: application/json");

$host = "mysql.hostinger.com";  
$dbname = "u377990636_DataBase"; 
$username = "u377990636_Admin";  
$password = "+c4Nrz@H5";         

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Pega os dados do JSON enviado
    $data = json_decode(file_get_contents("php://input"), true);
    $user = trim($data['username'] ?? '');
    $pass = trim($data['password'] ?? '');

    if (empty($user) || empty($pass)) {
        echo json_encode(["success" => false, "message" => "Usuário ou senha inválidos!"]);
        exit;
    }

    // Verifica na tabela de admin
    $stmt = $pdo->prepare("SELECT * FROM admin WHERE BINARY usuario = :usuario AND BINARY senha = :senha");
    $stmt->execute(["usuario" => $user, "senha" => $pass]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin) {
        $_SESSION["user"] = $user;
        $_SESSION["role"] = "admin";
        echo json_encode(["success" => true, "redirect" => "admin.html"]);
        exit;
    }

    // Verifica na tabela de usuários comuns
    $stmt = $pdo->prepare("SELECT * FROM usuario WHERE BINARY usuario = :usuario AND BINARY senha = :senha");
    $stmt->execute(["usuario" => $user, "senha" => $pass]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        $_SESSION["user"] = $user;
        $_SESSION["role"] = "user";
        echo json_encode(["success" => true, "redirect" => "testes\AM.html"]);
        exit;
    }

    // Se não encontrou o usuário
    echo json_encode(["success" => false, "message" => "Usuário ou senha inválidos!"]);
} catch (PDOException $e) {
    echo json_encode(["success" => false, "message" => "Erro no servidor!"]);
}
?>
