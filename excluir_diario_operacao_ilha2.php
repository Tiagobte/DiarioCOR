<?php
include_once('conexao.php');

// Verifica se o ID do registro foi passado via GET
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Exclui o registro da Ilha 02 pelo ID
    $query = "DELETE FROM diario_operacao WHERE id = :id AND usina = 'Ilha 02'";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':id' => $id]);

    // Redireciona após a exclusão para evitar reenvio do formulário
    header('Location: diario_operacao_ilha2.php');
    exit;
} else {
    die('ID do registro não especificado.');
}
?>
