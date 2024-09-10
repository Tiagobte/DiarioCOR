<?php
// Definir o caminho da sessão
ini_set('session.save_path', '/home/storage/0/2a/3a/mcq2/public_html/sessions');

// Iniciar o buffer de saída
ob_start();

// Iniciar a sessão
session_start();

// Verificar se a sessão foi iniciada corretamente
if (!isset($_SESSION)) {
    echo "Erro ao iniciar a sessão.";
    exit();
}

// Destruir a sessão
session_destroy();

// Redirecionar para a página de login
header("Location: login.php");
exit();

// Limpar o buffer de saída
ob_end_flush();
?>
