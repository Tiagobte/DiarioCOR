<?php
// Configurações de conexão com o banco de dados
$host = 'localhost';
$db_name = 'diariocor';
$username = 'root';
$password = '';

// Tentativa de conexão com o banco de dados usando PDO
try {
    $pdo = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
    die();
}
?>
