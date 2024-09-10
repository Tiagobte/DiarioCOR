<?php
// Inclua o arquivo que contém a conexão com o banco de dados
require 'db.php';

// Dados do formulário
$username = $_POST['username'];
$password = $_POST['password'];

try {
    // Preparar e executar a consulta
    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->execute([$username]);

    // Fetch o resultado
    $user = $stmt->fetch();

    // Verifique se o usuário foi encontrado e se a senha está correta
    if ($user && password_verify($password, $user['password_hash'])) {
        // Autenticação bem-sucedida, inicialize a sessão
        session_start();
        $_SESSION['username'] = $user['username'];
        // Redirecione para a página inicial
        header('Location: index.php');
        exit;
    } else {
        echo "Nome de usuário ou senha inválidos.";
    }
} catch (PDOException $e) {
    echo "Erro ao fazer login: " . $e->getMessage();
}
?>
