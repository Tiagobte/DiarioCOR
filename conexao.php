<?php
// Conexão com o banco de dados
require 'db.php';

// Dados do formulário
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$name = $_POST['name'];
$phone = $_POST['phone']; // Novo campo

// Hash da senha
$password_hash = password_hash($password, PASSWORD_DEFAULT);

try {
    // Preparar e executar a consulta
    $stmt = $pdo->prepare('INSERT INTO users (username, password_hash, email, name, phone) VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$username, $password_hash, $email, $name, $phone]);

    echo "Usuário cadastrado com sucesso!";
} catch (PDOException $e) {
    echo "Erro ao cadastrar usuário: " . $e->getMessage();
}
?>
