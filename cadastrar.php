require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['username'];
    $senha = $_POST['password'];

    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
    $sql = "INSERT INTO clientes (usuario, senha) VALUES (:usuario, :senha)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':senha', $senha_hash);
    
    if ($stmt->execute()) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar usuário!";
    }
}
?>
