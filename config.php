<?php
// Configuração de conexão com o banco de dados para localhost
$servername = "localhost"; // Endereço do servidor local
$username = "root"; // Usuário padrão do MySQL para localhost
$password = ""; // Senha padrão do MySQL para localhost (normalmente em branco)
$dbname = "diariocor"; // Nome do banco de dados

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checa a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Se a conexão estiver bem-sucedida
echo "Conexão com o banco de dados realizada com sucesso!";

