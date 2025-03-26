<?php
header('Content-Type: application/json');

// Configuração do banco de dados
$host = "seu_host";
$dbname = "seu_banco";
$username = "seu_usuario";
$password = "sua_senha";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Erro ao conectar ao banco de dados."]));
}

// Recebendo os dados
$data = json_decode(file_get_contents("php://input"), true);
$user = $data["username"];
$pass = $data["password"];
$tipoUsuario = $data["tipoUsuario"];

// Validação básica
if (empty($user) || empty($pass)) {
    die(json_encode(["success" => false, "message" => "Preencha todos os campos!"]));
}

// Define a tabela correta
$tabela = ($tipoUsuario === "admin") ? "admin" : "clientes";

// Insere no banco de dados
$sql = "INSERT INTO $tabela (usuario, senha) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $user, $pass);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "message" => "Erro ao cadastrar usuário."]);
}

$stmt->close();
$conn->close();
?>
