<?php
// Conexão com o banco de dados
require 'db.php';

// Dados do formulário com valores padrão para evitar warnings
$username = isset($_POST['username']) ? trim($_POST['username']) : null;
$password = isset($_POST['password']) ? trim($_POST['password']) : null;
$email = isset($_POST['email']) ? trim($_POST['email']) : null;
$name = isset($_POST['name']) ? trim($_POST['name']) : null;
$phone = isset($_POST['phone']) ? trim($_POST['phone']) : null;

// Verifique se todos os campos obrigatórios foram preenchidos
if (!$username || !$password || !$email || !$name) {
    die('Todos os campos obrigatórios (Nome de Usuário, Senha, Email, Nome) devem ser preenchidos.');
}

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
