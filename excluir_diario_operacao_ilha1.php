<?php
include_once('conexao.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Exclui o registro do banco de dados
    $query = "DELETE FROM diario_operacao WHERE id = :id";
    $stmt = $pdo->prepare($query);
    if ($stmt->execute([':id' => $id])) {
        // Redireciona após a exclusão
        header('Location: diario_operacao_ilha1.php');
        exit;
    } else {
        $errorInfo = $stmt->errorInfo();
        echo "Erro ao excluir registro do banco de dados: " . htmlspecialchars($errorInfo[2]) . "<br>";
    }
} else {
    echo "ID inválido.";
}
?>
