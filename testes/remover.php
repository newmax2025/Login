<?php
header('Content-Type: application/json');

// Configuração do banco de dados
$host = "mysql.hostinger.com";
$dbname = "u377990636_DataBase";
$username = "u377990636_Admin";
$password = "+c4Nrz@H5";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Erro ao conectar ao banco de dados."]));
}

// Recebe os dados
$data = json_decode(file_get_contents("php://input"), true);
$user = $data["username"];

// Validação básica
if (empty($user)) {
    die(json_encode(["success" => false, "message" => "Usuário não informado."]));
}

// Remove do banco de dados
$sql = "DELETE FROM clientes WHERE usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "message" => "Erro ao remover usuário."]));
}

$stmt->close();
$conn->close();
?>
