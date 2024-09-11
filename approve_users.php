<?php
// Configuração do caminho das sessões, dependendo do ambiente
if ($_SERVER['SERVER_NAME'] == 'localhost') {
    ini_set('session.save_path', 'C:/xampp/tmp'); // Caminho local para sessões (Windows)
} else {
    ini_set('session.save_path', '/home/storage/0/2a/3a/mcq2/public_html/sessions'); // Caminho no servidor Localweb
}

// Inicia a sessão
session_start();

// Verifica se o usuário está autenticado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit();
}

// Verifica se o usuário é administrador
$is_master = isset($_SESSION['is_master']) && $_SESSION['is_master'] == 1;

// Configurações de banco de dados
if ($_SERVER['SERVER_NAME'] == 'localhost') {
    $servername = 'localhost';
    $db_username = 'root';
    $db_password = ''; // Defina sua senha local
    $dbname = 'diariocor';
} else {
    $servername = '186.202.152.237';
    $db_username = 'diariocor';
    $db_password = 'Mcq@134';
    $dbname = 'diariocor';
}

// Conectar ao banco de dados
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verifica se a ação de aprovação ou rejeição foi solicitada
if (isset($_GET['approve']) || isset($_GET['reject'])) {
    $user_id = $_GET['approve'] ?? $_GET['reject'];
    $approve = isset($_GET['approve']) ? 1 : 2; // Ajusta o valor para rejeição como 2

    // Atualiza o status do usuário no banco de dados
    $stmt = $conn->prepare("UPDATE users SET approved = ? WHERE id = ?");
    $stmt->bind_param("ii", $approve, $user_id);

    if ($stmt->execute()) {
        $message = $approve == 1 ? "Usuário aprovado com sucesso!" : "Usuário rejeitado com sucesso!";
    } else {
        $message = "Erro ao atualizar o status do usuário: " . $stmt->error;
    }

    $stmt->close();
    header("Location: approve_users.php?message=" . urlencode($message));
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Usuários</title>
    <style>
        /* Estilo geral do corpo */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Estilo do contêiner de gerenciamento */
        .management-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            width: 100%;
            text-align: center;
        }

        /* Estilo do título */
        h2 {
            font-size: 26px;
            color: #333;
            margin-bottom: 20px;
            font-weight: 700;
            text-transform: uppercase;
        }

        /* Estilo da tabela */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto; /* Centraliza a tabela */
        }

        /* Estilo do cabeçalho da tabela */
        th {
            background-color: #3498db;
            color: #fff;
            padding: 12px;
            font-size: 16px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Estilo das células da tabela */
        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
            color: #333;
        }

        /* Estilo das ações */
        td a {
            text-decoration: none;
            font-weight: 600;
            margin: 0 8px;
            padding: 8px 12px; /* Espaçamento interno dos botões */
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
            display: inline-block; /* Para o padding funcionar corretamente */
        }

        /* Estilo do botão Aprovar */
        td a.approve {
            background-color: #2ecc71; /* Verde */
            color: #fff;
        }

        /* Estilo do botão Rejeitar */
        td a.reject {
            background-color: #e74c3c; /* Vermelho */
            color: #fff;
        }

        /* Efeito hover nos botões */
        td a:hover {
            opacity: 0.8; /* Reduz a opacidade no hover */
        }

        /* Estilo alternado para as linhas */
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Estilo do botão de "Retornar" */
        .return-button {
            display: inline-block;
            background-color: #3498db;
            color: #fff;
            padding: 12px 24px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
            transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
        }

        /* Efeito ao passar o mouse sobre o botão */
        .return-button:hover {
            background-color: #1f78b4;
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="management-container">
        <h2>Gerenciar Usuários</h2>
        <!-- Mensagem de feedback -->
        <?php if (isset($message)): ?>
            <p><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>

        <!-- Tabela de usuários pendentes -->
        <h3>Usuários Pendentes de Aprovação</h3>
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
                <?php
                // Consulta para listar usuários pendentes de aprovação
                $sql = "SELECT id, username, email, name, phone FROM users WHERE approved = 0";
                $result = $conn->query($sql);

                if ($result->num_rows > 0):
                    while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['username']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo htmlspecialchars($row['phone']); ?></td>
                            <td>
                                <a href="approve_users.php?approve=<?php echo $row['id']; ?>" class="approve">Aprovar</a> |
                                <a href="approve_users.php?reject=<?php echo $row['id']; ?>" class="reject">Rejeitar</a>
                            </td>
                        </tr>
                    <?php endwhile;
                else: ?>
                    <tr>
                        <td colspan="5">Nenhum usuário pendente de aprovação.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Tabela de usuários rejeitados -->
        <h3>Usuários Rejeitados</h3>
        <table>
            <thead>
                <tr>
                    <th>Usuário</th>
                    <th>Email</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Consulta para listar usuários rejeitados
                $sql_rejected = "SELECT id, username, email, name, phone FROM users WHERE approved = 2";
                $result_rejected = $conn->query($sql_rejected);

                if ($result_rejected->num_rows > 0):
                    while ($row = $result_rejected->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['username']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo htmlspecialchars($row['phone']); ?></td>
                        </tr>
                    <?php endwhile;
                else: ?>
                    <tr>
                        <td colspan="4">Nenhum usuário rejeitado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <a href="index.php" class="return-button">Retornar</a>
    </div>
</body>
</html>

<?php $conn->close(); ?>
