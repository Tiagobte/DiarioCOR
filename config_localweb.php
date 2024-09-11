<?php
// Configuração específica para a Localweb
$servername = "diariocor.mysql.dbaas.com.br"; // Endereço do servidor na Localweb
$username = "diariocor"; // Usuário do banco de dados na Localweb
$password = "Mcq@134"; // Senha do banco de dados na Localweb
$dbname = "diariocor"; // Nome do banco de dados na Localweb

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checa a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
