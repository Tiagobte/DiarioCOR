<?php
// Inclua o arquivo de conexão com o banco de dados
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verifica se todos os campos necessários estão definidos
    if (isset($_POST['username'], $_POST['password'], $_POST['email'], $_POST['name'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $name = $_POST['name'];
        $phone = isset($_POST['phone']) ? $_POST['phone'] : null; // Pode ser opcional

        // Hash da senha
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        try {
            $stmt = $pdo->prepare('INSERT INTO users (username, password_hash, email, name, phone) VALUES (?, ?, ?, ?, ?)');
            $stmt->execute([$username, $password_hash, $email, $name, $phone]);

            echo "Usuário cadastrado com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao cadastrar usuário: " . $e->getMessage();
        }
    } else {
        echo "Todos os campos são obrigatórios!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuário</title>
</head>
<body>
    <h1>Registro de Usuário</h1>
    <form action="register.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone">
        
        <button type="submit">Register</button>
    </form>
</body>
</html>
