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

// Executa a consulta SQL para buscar usuários não aprovados
$sql = "SELECT id, username, email, name, phone FROM users WHERE approved = 0";
$result = $conn->query($sql);

// Verifica se a consulta retornou resultados
if ($result === false) {
    die("Erro na consulta SQL: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Administração</title>
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
            margin-bottom: 20px;
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
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
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
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Nenhum usuário pendente de aprovação.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <a href="index.php" class="return-button">Retornar</a>
    </div>
</body>
</html>


<?php
// Fechar a conexão
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
    max-width: 900px; /* Aumentado para mais espaço em telas grandes */
    width: 100%;
    text-align: center;
    margin: 20px; /* Espaçamento externo */
}

/* Estilo do título */
h2 {
    font-size: 26px; /* Aumentado para melhor destaque */
    color: #333;
    margin-bottom: 20px;
    font-weight: 700;
    text-transform: uppercase; /* Deixa o texto mais formal */
}

/* Estilo da tabela */
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

/* Estilo do cabeçalho da tabela */
th {
    background-color: #3498db; /* Azul mais vibrante */
    color: #fff;
    padding: 12px; /* Aumentado para mais espaço */
    font-size: 16px; /* Aumentado para melhor legibilidade */
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* Estilo das células da tabela */
td {
    padding: 12px; /* Aumentado para mais espaço */
    border-bottom: 1px solid #ddd;
    font-size: 14px;
    color: #333;
}

/* Estilo das ações */
td a {
    text-decoration: none;
    color: #3498db; /* Azul mais vibrante */
    font-weight: 600;
    margin: 0 8px; /* Aumentado para espaçamento */
    transition: color 0.3s, text-shadow 0.3s; /* Adicionada sombra de texto para efeito */
}

/* Efeito hover nas ações */
td a:hover {
    color: #1f78b4; /* Azul mais escuro */
    text-shadow: 0 1px 3px rgba(0, 0, 0, 0.2); /* Sombra para efeito de profundidade */
}

/* Estilo alternado para as linhas */
tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

/* Estilo do botão de "Retornar" */
.return-button {
    display: inline-block;
    background-color: #3498db; /* Azul mais vibrante */
    color: #fff; /* Cor do texto */
    padding: 12px 24px; /* Aumentado para mais espaço */
    border-radius: 6px; /* Bordas arredondadas mais suaves */
    text-decoration: none; /* Remove o sublinhado do link */
    font-size: 18px; /* Tamanho da fonte aumentado */
    font-weight: bold; /* Negrito */
    margin-top: 20px; /* Espaçamento superior */
    transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease; /* Transições suaves */
}

/* Efeito ao passar o mouse sobre o botão */
.return-button:hover {
    background-color: #1f78b4; /* Azul mais escuro */
    transform: translateY(-3px); /* Eleva o botão ao passar o mouse */
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2); /* Sombra mais pronunciada */
}

/* Adaptação responsiva */
@media (max-width: 768px) {
    table, thead, tbody, th, td, tr {
        display: block;
        width: 100%;
    }

    td, th {
        padding: 12px;
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

    .return-button {
        width: 100%; /* O botão ocupará toda a largura em telas menores */
        text-align: center; /* Centraliza o texto */
    }
}


</style>
