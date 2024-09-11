<?php
// Verificar se estamos rodando no localhost ou no servidor da Localweb
if ($_SERVER['SERVER_NAME'] == 'localhost') {
    // Configuração para localhost
    $servername = "localhost"; // Endereço do servidor local
    $username = "root"; // Usuário padrão do MySQL para localhost
    $password = ""; // Senha padrão do MySQL para localhost (normalmente em branco)
    $dbname = "diariocor"; // Nome do banco de dados local
} else {
    // Configuração para Localweb
    $servername = "186.202.152.237"; // Endereço do servidor na Localweb
    $username = "diariocor"; // Usuário do banco de dados na Localweb
    $password = "Mcq@134"; // Senha do banco de dados na Localweb
    $dbname = "diariocor"; // Nome do banco de dados na Localweb
}

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checa a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
