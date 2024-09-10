<?php
// Conexão com o banco de dados
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar os dados do formulário, garantindo que os campos existam no $_POST
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    $confirm_password = isset($_POST['confirm_password']) ? trim($_POST['confirm_password']) : '';

    // Verificar se todos os campos foram preenchidos
    if (empty($name) || empty($email) || empty($phone) || empty($username) || empty($password) || empty($confirm_password)) {
        echo "Erro: Todos os campos são obrigatórios.";
        exit();
    }

    // Verificar se as senhas coincidem
    if ($password !== $confirm_password) {
        echo "Erro: As senhas não coincidem.";
        exit();
    }

    // Verificar se o nome de usuário ou email já existe
    try {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
        $stmt->execute([$username, $email]);
        if ($stmt->rowCount() > 0) {
            echo "Erro: Nome de usuário ou email já existe. Escolha outro.";
            exit();
        }

        // Hash da senha
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Inserir o novo usuário no banco de dados
        $stmt = $pdo->prepare("INSERT INTO users (username, password_hash, email, name, phone) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$username, $password_hash, $email, $name, $phone]);

        // Redirecionar para a página de login
        header("Location: login.html");
        exit();
    } catch (PDOException $e) {
        echo "Erro ao cadastrar usuário: " . $e->getMessage();
    }
} else {
    echo "Método de requisição inválido.";
}
?>
