<?php
// excluir_acionamento.php

// Conectar ao banco de dados
require 'db.php';

// Recuperar o ID do registro
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Verificar se o ID é válido
if ($id <= 0) {
    die('ID inválido.');
}

// Excluir o registro do banco de dados
$sql = 'DELETE FROM acionamentos_sobreaviso WHERE id = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

// Redirecionar para a lista de acionamentos com uma mensagem de sucesso
header('Location: sobreavisoElejor.php?status=success');
exit;
?>
