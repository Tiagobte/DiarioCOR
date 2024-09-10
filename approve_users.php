<?php
// Verifica se estamos em um ambiente Localweb
if (defined('LOCALWEB_ENV') && LOCALWEB_ENV === true) {
    require_once 'config_localweb.php';
} else {
    // Configuração local ou padrão
    require_once 'config_local.php'; // Arquivo de configuração local
}

session_start();

// Conectar ao banco de dados
$conn = new mysqli('localhost', 'root', '', 'diariocor');
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

// Buscar usuários não aprovados
$sql = "SELECT id, email, nome, telefone FROM users WHERE approved = 0";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Administração</title>
    <style>
        /* Adicione seu estilo aqui */
    </style>
</head>
<body>
    <h1>Aprovação de Usuários</h1>
    <table border="1">
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
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo "<td>{$row['nome']}</td>";
                    echo "<td>{$row['telefone']}</td>";
                    echo "<td>
                            <a href='admin_panel.php?approve={$row['id']}'>Aprovar</a> | 
                            <a href='admin_panel.php?reject={$row['id']}'>Rejeitar</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Nenhum usuário encontrado.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="index.php">Retornar</a>
</body>
</html>

<?php
$conn->close();
?>
