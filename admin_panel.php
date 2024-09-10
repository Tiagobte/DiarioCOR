<?php

// Verifica se estamos em um ambiente Localweb
if (defined('LOCALWEB_ENV') && LOCALWEB_ENV === true) {
    require_once 'config_localweb.php';
} else {
    // Configuração local ou padrão
    require_once 'config_local.php'; // Arquivo de configuração local
}


session_start();
echo 'is_master: ' . $_SESSION['is_master']; // Para depuração
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
                        <a href="admin_panel.php?approve=<?php echo $row['id']; ?>" class="approve">Aprovar</a> | 
                        <a href="admin_panel.php?reject=<?php echo $row['id']; ?>" class="reject">Rejeitar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="index.php" class="return-button">Retornar</a>
    </div>
</body>
</html>

<?php
$conn->close();
?>


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

        /* Estilo do contêiner de aprovação */
        .approval-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            width: 100%;
            text-align: center;
        }

        /* Estilo do título */
        h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
            font-weight: 700;
            text-transform: uppercase;
        }

        /* Estilo da tabela */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        /* Estilo do cabeçalho da tabela */
        th {
            background-color: #2980b9;
            color: #fff;
            padding: 10px;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Estilo das células da tabela */
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
            color: #333;
        }

        /* Estilo das ações */
        td a {
            text-decoration: none;
            color: #2980b9;
            font-weight: 600;
            margin: 0 5px;
            transition: color 0.3s;
        }

        /* Efeito hover nas ações */
        td a:hover {
            color: #1b6692;
        }

        /* Estilo alternado para as linhas */
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Estilo dos botões de aprovação e rejeição */
        .approval-actions a {
            background-color: #28a745;
            color: white;
            padding: 8px 12px;
            border-radius: 5px;
            text-decoration: none;
            margin-right: 10px;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        /* Cor de hover para os botões de aprovação */
        .approval-actions a.approve:hover {
            background-color: #218838;
        }

        /* Cor para os botões de rejeição */
        .approval-actions a.reject {
            background-color: #dc3545;
        }

        /* Cor de hover para os botões de rejeição */
        .approval-actions a.reject:hover {
            background-color: #c82333;
        }

        /* Adaptação responsiva */
        @media (max-width: 768px) {
            table, thead, tbody, th, td, tr {
                display: block;
                width: 100%;
            }

            td, th {
                padding: 10px;
                font-size: 12px;
                text-align: right;
                position: relative;
            }

            td::before, th::before {
                content: attr(data-label);
                position: absolute;
                left: 10px;
                font-weight: bold;
                text-transform: uppercase;
                color: #555;
            }

            td:last-child {
                border-bottom: 0;
            }
        }
        /* Estilo do botão de "Retornar" */
.return-button {
    display: inline-block;
    background-color: #2980b9; /* Cor de fundo azul */
    color: #fff; /* Cor do texto */
    padding: 10px 20px; /* Espaçamento interno */
    border-radius: 5px; /* Bordas arredondadas */
    text-decoration: none; /* Remove o sublinhado do link */
    font-size: 16px; /* Tamanho da fonte */
    font-weight: bold; /* Negrito */
    margin-bottom: 20px; /* Espaçamento inferior */
    transition: background-color 0.3s ease, transform 0.3s ease; /* Transições suaves */
}

/* Efeito ao passar o mouse sobre o botão */
.return-button:hover {
    background-color: #1b6692; /* Cor mais escura no hover */
    transform: translateY(-3px); /* Eleva o botão ao passar o mouse */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Sombra no hover */
}

/* Adaptação para dispositivos móveis */
@media (max-width: 768px) {
    .return-button {
        width: 100%; /* O botão ocupará toda a largura em telas menores */
        text-align: center; /* Centraliza o texto */
    }
}

    </style>