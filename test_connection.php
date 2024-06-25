<?php
// Inclui o arquivo de conexão
require_once 'db.php';

// Teste simples de consulta para verificar a conexão
try {
    // Consulta para selecionar todos os registros da tabela 'users'
    $query = "SELECT * FROM users";
    $statement = $pdo->query($query);
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Exibir os resultados da consulta
    echo "<h2>Dados dos usuários:</h2>";
    foreach ($users as $user) {
        echo "ID: {$user['id']} | Nome: {$user['name']} | Email: {$user['email']}<br>";
    }
} catch(PDOException $e) {
    // Em caso de erro na consulta, exibe a mensagem de erro
    echo "Erro na consulta: " . $e->getMessage();
}
