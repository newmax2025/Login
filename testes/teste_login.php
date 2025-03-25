<?php
$host = "mysql.hostinger.com";  
$dbname = "u377990636_DataBase"; 
$username = "u377990636_Admin";  
$password = "+c4Nrz@H5";         

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $user = "visitanteteste"; // Troque pelo usuário de teste
    $pass = "123456";   // Troque pela senha de teste

    $stmt = $pdo->prepare("SELECT * FROM admin WHERE usuario = :usuario AND senha = :senha");
    $stmt->execute(["usuario" => $user, "senha" => $pass]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin) {
        echo "Usuário encontrado!";
    } else {
        echo "Usuário não encontrado!";
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>
