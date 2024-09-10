<?php


// Verifica se estamos em um ambiente Localweb
if (defined('LOCALWEB_ENV') && LOCALWEB_ENV === true) {
    require_once 'config_localweb.php';
} else {
    // Configuração local ou padrão
    require_once 'config_local.php'; // Arquivo de configuração local
}


// Conexão com o banco de dados
$conn = new mysqli('localhost', 'root', '', 'diariocor');

// Verifica se houve erro na conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    // Verifica se o nome de usuário ou email já estão em uso
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        header("Location: register_user.php?error=Usuário ou email já existente.");
        exit();
    }

    $stmt->close();

    // Insere o novo usuário
    $stmt = $conn->prepare("INSERT INTO users (username, password_hash, email, name, phone, approved) VALUES (?, ?, ?, ?, ?, 0)");
    $stmt->bind_param("sssss", $username, $password, $email, $name, $phone);

    if ($stmt->execute()) {
        header("Location: register_user.php?success=Usuário criado com sucesso! Aguardando aprovação.");
    } else {
        header("Location: register_user.php?error=Erro ao criar usuário.");
    }

    $stmt->close();
}

$conn->close();

