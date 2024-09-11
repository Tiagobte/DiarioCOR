<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "186.202.152.237"; // IP do servidor de banco de dados
$username = "mcqeletro";          // Usuário do banco de dados
$password = "Mcq@134*";           // Senha do banco de dados
$dbname = "diariocor";            // Nome do banco de dados

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

echo "Conexão bem-sucedida!";
$conn->close();
?>
