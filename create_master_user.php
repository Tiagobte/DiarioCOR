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

// Verifica se houve algum erro de conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Dados do usuário
$username = 'master';
$password = password_hash('5a2c1234', PASSWORD_DEFAULT); // Corrigido para gerar o hash da senha
$email = 'tiago.cor@mcq.com.br';
$name = 'Master User';
$phone = '66 9 99352176';
$approved = 1; // Usuário aprovado

// Inserir usuário no banco de dados
$sql = "INSERT INTO users (username, password_hash, email, name, phone, approved) 
        VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssi", $username, $password, $email, $name, $phone, $approved);

if ($stmt->execute()) {
    echo "Usuário master criado com sucesso!";
} else {
    echo "Erro ao criar usuário: " . $stmt->error;
}

$conn->close();
