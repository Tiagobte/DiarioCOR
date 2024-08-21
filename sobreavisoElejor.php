<?php
// sobreavisoElejor.php

// Conectar ao banco de dados
require 'db.php';

// Verificar se há mensagem de sucesso
$status_message = '';
if (isset($_GET['status']) && $_GET['status'] == 'success') {
    $status_message = '<p style="color: green; font-weight: bold;">Acionamento registrado com sucesso!</p>';
}

// Consultar registros do banco de dados
$stmt = $pdo->query('SELECT * FROM acionamentos_sobreaviso ORDER BY horario_solicitacao DESC');
$registros = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acionamento de Sobreaviso</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 1200px;
            margin: 20px auto;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 15px;
            color: #333;
            font-weight: bold;
        }

        input[type="datetime-local"],
        select,
        textarea {
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
        }

        button[type="submit"] {
            margin-top: 20px;
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .status-message {
            color: green;
            font-weight: bold;
        }

        .buttons {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-back {
            background-color: #007bff;
        }

        .btn-back:hover {
            background-color: #0056b3;
        }

        .btn-logout {
            background-color: #dc3545;
        }

        .btn-logout:hover {
            background-color: #c82333;
        }

        .btn-edit {
            background-color: #28a745;
            color: #fff;
        }

        .btn-edit:hover {
            background-color: #218838;
        }

        .btn-delete {
            background-color: #dc3545;
            color: #fff;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Registro de Acionamento de Sobreaviso</h1>
        <form action="processa_acionamento.php" method="post">
            <label for="horario">Horário da Solicitação:</label>
            <input type="datetime-local" id="horario" name="horario" required>

            <label for="responsavel">Responsável pela Escala:</label>
            <select id="responsavel" name="responsavel" required>
                <option value="">Selecione o responsável</option>
                <!-- Exemplo de opções estáticas -->
                <option value="1">Eduardo Solano</option>
                <option value="2">Edimar</option>
                <option value="3">Jaiusley</option>
                <option value="4">Charles</option>
                <option value="5">Cintia</option>
                <option value="6">Lúcio</option>
            </select>

            <label for="local">Local da Atividade:</label>
            <select id="local" name="local" required>
                <option value="">Selecione o local</option>
                <option value="UHE SANTA CLARA">UHE SANTA CLARA</option>
                <option value="UHE FUNDÃO">UHE FUNDÃO</option>
                <option value="CGH FUNDÃO">CGH FUNDÃO</option>
                <option value="CGH SANTA CLARA">CGH SANTA CLARA</option>
            </select>

            <label for="horario_chegada">Horário de Chegada:</label>
            <input type="datetime-local" id="horario_chegada" name="horario_chegada" required>

            <label for="horario_saida">Horário de Saída:</label>
            <input type="datetime-local" id="horario_saida" name="horario_saida" required>

            <label for="descricao_falha">Descrição da Falha:</label>
            <textarea id="descricao_falha" name="descricao_falha" rows="4" required></textarea>

            <label for="descricao_atividades">Descrição das Atividades Realizadas:</label>
            <textarea id="descricao_atividades" name="descricao_atividades" rows="4" required></textarea>

            <label for="relatorio_ocorrencia">Relatório da Ocorrência:</label>
            <textarea id="relatorio_ocorrencia" name="relatorio_ocorrencia" rows="4" required></textarea>

            <label for="pendencias_ocorrencia">Pendências da Ocorrência:</label>
            <textarea id="pendencias_ocorrencia" name="pendencias_ocorrencia" rows="4" required></textarea>

            <button type="submit">Registrar Acionamento</button>
        </form>

        <!-- Exibir mensagem de sucesso, se houver -->
        <?php if ($status_message): ?>
            <p class="status-message"><?= $status_message ?></p>
        <?php endif; ?>

        <!-- Lista de registros -->
        <h2>Acionamentos de Sobreaviso</h2>

        <!-- Botões de navegação -->
        <div class="buttons">
            <a href="index.php" class="btn btn-back">Voltar ao Painel de Controle</a>
            <a href="logout.php" class="btn btn-logout">Sair</a>
        </div>

        <!-- Lista de registros -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Horário da Solicitação</th>
                    <th>Responsável</th>
                    <th>Local</th>
                    <th>Horário de Chegada</th>
                    <th>Horário de Saída</th>
                    <th>Descrição da Falha</th>
                    <th>Descrição das Atividades</th>
                    <th>Relatório da Ocorrência</th>
                    <th>Pendências da Ocorrência</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($registros as $registro): ?>
                
                    <tr>
                        <td><?= htmlspecialchars($registro['id']) ?></td>
                        <td><?= htmlspecialchars($registro['horario_solicitacao']) ?></td>
                        <td><?= htmlspecialchars($registro['responsavel_id']) ?></td>
                        <td><?= htmlspecialchars($registro['local_atividade']) ?></td>
                        <td><?= htmlspecialchars($registro['horario_chegada']) ?></td>
                        <td><?= htmlspecialchars($registro['horario_saida']) ?></td>
                        <td><?= htmlspecialchars($registro['descricao_falha']) ?></td>
                        <td><?= htmlspecialchars($registro['descricao_atividades']) ?></td>
                        <td><?= htmlspecialchars($registro['relatorio_ocorrencia']) ?></td>
                        <td><?= htmlspecialchars($registro['pendencias_ocorrencia']) ?></td>
                        <td>
                            <a href="editar_acionamento.php?id=<?= htmlspecialchars($registro['id']) ?>" class="btn-edit">Editar</a>
                            <a href="excluir_acionamento.php?id=<?= htmlspecialchars($registro['id']) ?>" class="btn-delete" onclick="return confirm('Tem certeza de que deseja excluir este registro?')">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
