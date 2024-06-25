<?php
// register.php

// Inclui o arquivo de conexão com o banco de dados
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Processamento do formulário de registro
    
    // Validação dos dados (omiti para brevidade)

    // Verificação se o email ou nome de usuário já está cadastrado
    try {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $name = $_POST['name']; // Certifique-se de que o campo 'name' está presente no formulário
        $phone = $_POST['phone']; // Certifique-se de que o campo 'phone' está presente no formulário
        $password = $_POST['senha'];
        $confirmPassword = $_POST['confirmarSenha'];

        // Verifica se as senhas digitadas coincidem
        if ($password !== $confirmPassword) {
            echo "As senhas digitadas não coincidem. Por favor, tente novamente.";
            exit; // Encerra o script caso as senhas não coincidam
        }

        // Verifica se o email já está cadastrado
        $query_check_email = "SELECT * FROM users WHERE email = :email";
        $statement = $pdo->prepare($query_check_email);
        $statement->execute([
            ':email' => $email
        ]);
        $existing_email = $statement->fetch(PDO::FETCH_ASSOC);

        if ($existing_email) {
            // Caso o email já esteja cadastrado, exibe uma mensagem
            echo "Este email já está cadastrado. Por favor, utilize outro email.";
            exit; // Encerra o script para evitar a inserção duplicada
        }

        // Verifica se o nome de usuário já está cadastrado
        $query_check_username = "SELECT * FROM users WHERE username = :username";
        $statement = $pdo->prepare($query_check_username);
        $statement->execute([
            ':username' => $username
        ]);
        $existing_username = $statement->fetch(PDO::FETCH_ASSOC);

        if ($existing_username) {
            // Caso o nome de usuário já esteja cadastrado, exibe uma mensagem
            echo "Este nome de usuário já está em uso. Por favor, escolha outro.";
            exit; // Encerra o script para evitar a inserção duplicada
        }

        // Se o email e o nome de usuário não estiverem cadastrados e as senhas coincidirem, procede com a inserção
        $hashedPassword = md5($password); // Ajuste conforme método de hash seguro
        
        $query_insert_user = "INSERT INTO users (name, email, phone, username, password) VALUES (:name, :email, :phone, :username, :password)";
        $statement = $pdo->prepare($query_insert_user);
        $statement->execute([
            ':name' => $name,
            ':email' => $email,
            ':phone' => $phone,
            ':username' => $username,
            ':password' => $hashedPassword
        ]);

        // Redireciona para a página de login após o cadastro
        header('Location: login.html');
        exit;
    } catch(PDOException $e) {
        // Em caso de erro na inserção ou consulta, exibe uma mensagem de erro
        echo "Erro ao cadastrar usuário: " . $e->getMessage();
    }
}
?>
