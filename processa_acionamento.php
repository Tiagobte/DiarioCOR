<?php
// processa_acionamento.php

// Conectar ao banco de dados
require 'db.php';

// Recuperar dados do formulário
$horario = $_POST['horario'];
$responsavel = $_POST['responsavel'];
$local = $_POST['local'];
$horario_chegada = $_POST['horario_chegada'];
$horario_saida = $_POST['horario_saida'];
$descricao_falha = $_POST['descricao_falha'];
$descricao_atividades = $_POST['descricao_atividades'];
$relatorio_ocorrencia = $_POST['relatorio_ocorrencia'];
$pendencias_ocorrencia = $_POST['pendencias_ocorrencia'];

// Inserir registro no banco de dados
$sql = 'INSERT INTO acionamentos_sobreaviso (
    horario_solicitacao, responsavel_id, local_atividade, 
    horario_chegada, horario_saida, descricao_falha, 
    descricao_atividades, relatorio_ocorrencia, pendencias_ocorrencia
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';

$stmt = $pdo->prepare($sql);
$success = $stmt->execute([
    $horario,
    $responsavel,
    $local,
    $horario_chegada,
    $horario_saida,
    $descricao_falha,
    $descricao_atividades,
    $relatorio_ocorrencia,
    $pendencias_ocorrencia
]);

if ($success) {
    header('Location: sobreavisoElejor.php?status=success');
    exit;
} else {
    echo 'Erro ao registrar acionamento.';
}
?>
