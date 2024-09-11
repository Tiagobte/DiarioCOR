<?php
// Verifica se estamos em um ambiente Localweb ou localhost
if ($_SERVER['SERVER_NAME'] == 'localhost') {
    // Configurações para ambiente local (localhost)
    $servername = 'localhost';
    $db_username = 'root'; // Usuário do MySQL local
    $db_password = ''; // Senha do MySQL local (normalmente em branco)
    $dbname = 'diariocor'; // Nome do banco de dados local
} else {
    // Configurações para ambiente de produção (Localweb)
    $servername = '186.202.152.237'; // IP do servidor MySQL na Localweb
    $db_username = 'diariocor'; // Usuário do MySQL na Localweb
    $db_password = 'Mcq@134'; // Senha do MySQL na Localweb
    $dbname = 'diariocor'; // Nome do banco de dados na Localweb
}

// Conexão com o banco de dados
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

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

