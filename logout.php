<?php
// Configuração do caminho das sessões, dependendo do ambiente
if ($_SERVER['SERVER_NAME'] == 'localhost') {
    ini_set('session.save_path', 'C:/xampp/tmp'); // Caminho local para sessões (Windows)
} else {
    ini_set('session.save_path', '/home/storage/0/2a/3a/mcq2/public_html/sessions'); // Caminho no servidor Localweb
}

// Inicia a sessão
session_start();

// Remove todas as variáveis de sessão
$_SESSION = array();

// Se houver um cookie de sessão, exclua-o
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"], $params["secure"], $params["httponly"]
    );
}

// Destrói a sessão
session_destroy();

// Redireciona para a página de login
header('Location: login.php');
exit();
?>
