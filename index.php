<?php
// Inicia a sessão
session_start();

// Verifica se o usuário está logado, caso contrário, redireciona para a página de login
if (!isset($_SESSION['user_id'])) {
    header('Location: login.html');
    exit;
}

// Aqui você pode adicionar lógica para buscar o nome do usuário logado, se necessário
require_once 'db.php';
$query = "SELECT username FROM users WHERE id = :id";
$statement = $pdo->prepare($query);
$statement->execute([':id' => $_SESSION['user_id']]);
$user = $statement->fetch(PDO::FETCH_ASSOC);
$username = $user['username'];

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
</head>
<body>
    <h2>Bem-vindo à Página Inicial</h2>
    <p>Este é o conteúdo da página inicial após o login.</p>
    <p>Usuário logado: <?php echo htmlspecialchars($username); ?></p>
    <p><a href="logout.php">Sair</a></p>
</body>
</html>
