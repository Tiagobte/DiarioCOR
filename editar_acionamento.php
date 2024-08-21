<?php
// editar_acionamento.php

// Conectar ao banco de dados
require 'db.php';

// Recuperar o ID do registro
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Verificar se o ID é válido
if ($id <= 0) {
    die('ID inválido.');
}

// Consultar o registro a ser editado
$stmt = $pdo->prepare('SELECT * FROM acionamentos_sobreaviso WHERE id = ?');
$stmt->execute([$id]);
$registro = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$registro) {
    die('Registro não encontrado.');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Acionamento de Sobreaviso</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <style>/* styles.css */

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 2px solid #ddd;
    padding-bottom: 10px;
    margin-bottom: 20px;
}

header h1 {
    margin: 0;
    font-size: 1.5em;
}

nav .button {
    text-decoration: none;
    padding: 10px 15px;
    color: #fff;
    background-color: #007bff;
    border-radius: 5px;
    font-size: 1em;
}

nav .button.button-danger {
    background-color: #dc3545;
}

nav .button.button-secondary {
    background-color: #6c757d;
}

form {
    display: flex;
    flex-direction: column;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

.form-group input[type="datetime-local"],
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

.form-group textarea {
    resize: vertical;
}

.form-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.form-actions .button {
    margin-right: 10px;
}

.form-actions .button-secondary {
    background-color: #6c757d;
}
</style>
    <div class="container">
        <header>
            <h1>Editar Acionamento de Sobreaviso</h1>
            <nav>
                <a href="sobreavisoElejor.php" class="button">Voltar ao Painel</a>
                <a href="sair.php" class="button button-danger">Sair</a>
            </nav>
        </header>

        <form action="processa_edicao.php" method="post">
            <input type="hidden" name="id" value="<?= htmlspecialchars($registro['id']) ?>">

            <div class="form-group">
                <label for="horario">Horário da Solicitação:</label>
                <input type="datetime-local" id="horario" name="horario" value="<?= htmlspecialchars($registro['horario_solicitacao']) ?>" required>
            </div>

            <div class="form-group">
                <label for="responsavel">Responsável pela Escala:</label>
                <select id="responsavel" name="responsavel" required>
                    <option value="">Selecione o responsável</option>
                    <option value="1" <?= $registro['responsavel_id'] == 1 ? 'selected' : '' ?>>Eduardo Solano</option>
                    <option value="2" <?= $registro['responsavel_id'] == 2 ? 'selected' : '' ?>>Edimar</option>
                    <option value="3" <?= $registro['responsavel_id'] == 3 ? 'selected' : '' ?>>Jaiusley</option>
                    <option value="4" <?= $registro['responsavel_id'] == 4 ? 'selected' : '' ?>>Charles</option>
                    <option value="5" <?= $registro['responsavel_id'] == 5 ? 'selected' : '' ?>>Cintia</option>
                    <option value="6" <?= $registro['responsavel_id'] == 6 ? 'selected' : '' ?>>Lúcio</option>
                </select>
            </div>

            <div class="form-group">
                <label for="local">Local da Atividade:</label>
                <select id="local" name="local" required>
                    <option value="">Selecione o local</option>
                    <option value="UHE SANTA CLARA" <?= $registro['local_atividade'] == 'UHE SANTA CLARA' ? 'selected' : '' ?>>UHE SANTA CLARA</option>
                    <option value="UHE FUNDÃO" <?= $registro['local_atividade'] == 'UHE FUNDÃO' ? 'selected' : '' ?>>UHE FUNDÃO</option>
                    <option value="CGH FUNDÃO" <?= $registro['local_atividade'] == 'CGH FUNDÃO' ? 'selected' : '' ?>>CGH FUNDÃO</option>
                    <option value="CGH SANTA CLARA" <?= $registro['local_atividade'] == 'CGH SANTA CLARA' ? 'selected' : '' ?>>CGH SANTA CLARA</option>
                </select>
            </div>

            <div class="form-group">
                <label for="horario_chegada">Horário de Chegada:</label>
                <input type="datetime-local" id="horario_chegada" name="horario_chegada" value="<?= htmlspecialchars($registro['horario_chegada']) ?>" required>
            </div>

            <div class="form-group">
                <label for="horario_saida">Horário de Saída:</label>
                <input type="datetime-local" id="horario_saida" name="horario_saida" value="<?= htmlspecialchars($registro['horario_saida']) ?>" required>
            </div>

            <div class="form-group">
                <label for="descricao_falha">Descrição da Falha:</label>
                <textarea id="descricao_falha" name="descricao_falha" rows="4" required><?= htmlspecialchars($registro['descricao_falha']) ?></textarea>
            </div>

            <div class="form-group">
                <label for="descricao_atividades">Descrição das Atividades Realizadas:</label>
                <textarea id="descricao_atividades" name="descricao_atividades" rows="4" required><?= htmlspecialchars($registro['descricao_atividades']) ?></textarea>
            </div>

            <div class="form-group">
                <label for="relatorio_ocorrencia">Relatório da Ocorrência:</label>
                <textarea id="relatorio_ocorrencia" name="relatorio_ocorrencia" rows="4" required><?= htmlspecialchars($registro['relatorio_ocorrencia']) ?></textarea>
            </div>

            <div class="form-group">
                <label for="pendencias_ocorrencia">Pendências da Ocorrência:</label>
                <textarea id="pendencias_ocorrencia" name="pendencias_ocorrencia" rows="4" required><?= htmlspecialchars($registro['pendencias_ocorrencia']) ?></textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="button">Salvar Alterações</button>
                <a href="sobreavisoElejor.php" class="button button-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
