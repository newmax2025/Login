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

    // Captura os dados enviados via POST
    $json = file_get_contents("php://input");
    $data = json_decode($json, true);

    // Verifica se os dados foram recebidos corretamente
    if (!$data) {
        echo json_encode(["success" => false, "message" => "Erro ao receber os dados!"]);
        exit;
    }

    $user = trim($data['username'] ?? '');
    $pass = trim($data['password'] ?? '');

    if (empty($user) || empty($pass)) {
        echo json_encode(["success" => false, "message" => "Usuário ou senha não podem estar vazios!"]);
        exit;
    }

    // Primeiro, verifica na tabela admin
    $stmt = $pdo->prepare("SELECT * FROM admin WHERE BINARY usuario = :usuario AND BINARY senha = :senha");
    $stmt->execute(["usuario" => $user, "senha" => $pass]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin) {
        $_SESSION["user"] = $user;
        $_SESSION["role"] = "admin";
        echo json_encode(["success" => true, "redirect" => "admin.html"]);
        exit;
    }

    // Agora, verifica na tabela usuário
    $stmt = $pdo->prepare("SELECT * FROM usuario WHERE BINARY usuario = :usuario AND BINARY senha = :senha");
    $stmt->execute(["usuario" => $user, "senha" => $pass]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        $_SESSION["user"] = $user;
        $_SESSION["role"] = "user";
        echo json_encode(["success" => true, "redirect" => "AM.html"]);
        exit;
    }

    // Caso não encontre o usuário
    echo json_encode(["success" => false, "message" => "Usuário ou senha inválidos!"]);
} catch (PDOException $e) {
    echo json_encode(["success" => false, "message" => "Erro no servidor: " . $e->getMessage()]);
}
?>
