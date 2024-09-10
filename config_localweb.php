<?php
// Configuração de conexão com o banco de dados para a Localweb
$servername = "186.202.152.237";
$username = "mcqeletro";
$password = "Mcq@134";
$dbname = "diariocor";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checa a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Se a conexão estiver bem-sucedida
echo "Conexão com o banco de dados realizada com sucesso!";

