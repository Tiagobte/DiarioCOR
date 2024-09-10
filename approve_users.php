<?php


// Verifica se estamos em um ambiente Localweb
if (defined('LOCALWEB_ENV') && LOCALWEB_ENV === true) {
    require_once 'config_localweb.php';
} else {
    // Configuração local ou padrão
    require_once 'config_local.php'; // Arquivo de configuração local
}


session_start();

// Verifica se o usuário está logado e é master
if (!isset($_SESSION['user_id']) || !$_SESSION['is_master']) {
    header('Location: login.php');
    exit();
}

// Conectar ao banco de dados
$conn = new mysqli('localhost', 'root', '', 'diariocor');

// Verifica se houve erro de conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Aprova um usuário
if (isset($_GET['approve'])) {
    $user_id = intval($_GET['approve']);
    $stmt = $conn->prepare("UPDATE users SET approved = 1 WHERE id = ?");
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $stmt->close();
    header('Location: admin_panel.php');
    exit();
}

// Rejeita um usuário
if (isset($_GET['reject'])) {
    $user_id = intval($_GET['reject']);
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $stmt->close();
    header('Location: admin_panel.php');
    exit();
}

// Consulta usuários não aprovados
$sql = "SELECT id, username, email, name, phone FROM users WHERE approved = 0";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aprovação de Usuários - Diário COR</title>
    <link rel="stylesheet" href="style.css"> <!-- Link para o CSS -->
</head>
<body>
    <div class="approval-container">
        <h2>Aprovação de Usuários</h2>
        <table>
            <thead>
                <tr>
                    <th>Usuário</th>
                    <th>Email</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['username']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['phone']); ?></td>
                    <td>
                        <a href="approve_users.php?approve=<?php echo $row['id']; ?>">Aprovar</a> | 
                        <a href="approve_users.php?reject=<?php echo $row['id']; ?>">Rejeitar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
