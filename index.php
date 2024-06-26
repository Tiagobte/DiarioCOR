<?php
// Inicia a sessão
session_start();

// Verifica se o usuário está logado, caso contrário, redireciona para a página de login
if (!isset($_SESSION['user_id'])) {
    header('Location: login.html');
    exit;
}

// Aqui você pode adicionar lógica para buscar o nome do usuário logado, se necessário
require_once 'db.php';
$query = "SELECT username FROM users WHERE id = :id";
$statement = $pdo->prepare($query);
$statement->execute([':id' => $_SESSION['user_id']]);
$user = $statement->fetch(PDO::FETCH_ASSOC);
$username = $user['username'];

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Página Inicial</title>
</head>
<body class="home">
    <div class="container home">
        <div class="welcome-message">
            <h2>Bem-vindo à Página Inicial</h2>
            <p><strong>Usuário logado:</strong> <?php echo htmlspecialchars($username); ?></p>
        </div>
        <div class="button-group-container">
            <div class="button-group">
                <a href="https://sintegre.ons.org.br/paginas/meu-perfil/meus-sistemas.aspx" target="_blank">ONS</a>
                <a href="https://www.ccee.org.br/web/guest/precos/painel-precos" target="_blank">CCEE</a>
                <a href="http://simepar.br/prognozweb/" target="_blank">Simepar</a>
                <a href="https://stats.uptimerobot.com/2963AIKqz6" target="_blank">Uptime Robot</a>
                <a href="https://pim.way2.com.br/GraficosHtml5" target="_blank">PIM Way2</a>
                <a href="https://www.copel.com/mhbweb/paginas/bacia-iguacu.jsf" target="_blank">Copel</a>
                <a href="http://servidor.ambitec.eng.br:8080/sistema/index.php?class=LoginForm&method=onReload&order=send_date&direction=asc" target="_blank">Ambitec</a>
                <a href="https://hidro.tach.com.br/index.php" target="_blank">Hidro Tach</a>
                <a href="https://selinc.com/pt/products/tables/ansi/" target="_blank">SEL Inc.</a>
                <a href="https://webmail-seguro.com.br/" target="_blank">Acesso ao Webmail</a>
                <a href="https://www.google.com.br/?hl=pt-BR" target="_blank">Acesso ao navegador</a>
                <a href="https://web.skype.com/" target="_blank">Skype</a>
                <a href="https://10.20.20.110/" target="_blank">IHM CAC</a>
                <a href="https://www.copel.com/mhbweb/paginas/bacia-iguacu.jsf" target="_blank">COPEL Hidrologia</a>
                <a href="http://10.20.120.5/" target="_blank">INTELBRAS</a>
                <a href="logout.php" class="btn-logout">Sair</a>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> SeuSite. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
