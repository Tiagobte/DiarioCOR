<?php


// Verifica se estamos em um ambiente Localweb
if (defined('LOCALWEB_ENV') && LOCALWEB_ENV === true) {
    require_once 'config_localweb.php';
} else {
    // Configuração local ou padrão
    require_once 'config_local.php'; // Arquivo de configuração local
}


session_start();

// Verifica se o usuário está logado e se é o master
if (!isset($_SESSION['user_id']) || !$_SESSION['is_master']) {
    header('Location: login.php');
    exit();
}

require 'config.php'; // Inclua o arquivo de configuração para a conexão com o banco de dados

// Obtém o ID do usuário a ser rejeitado
$user_id = intval($_GET['id']);

// Remove o usuário
$sql = "DELETE FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);

if ($stmt->execute()) {
    echo "Usuário rejeitado e removido com sucesso.";
} else {
    echo "Erro: " . $stmt->error;
}

$stmt->close();
$conn->close();

