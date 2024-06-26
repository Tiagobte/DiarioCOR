<?php
include_once('conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $usina = $_POST['usina'];
    $responsavel = $_POST['responsavel'];
    $data_inicio = $_POST['data_inicio'];
    $data_fim = $_POST['data_fim'];

    $query = "UPDATE escala_sobreaviso SET usina = :usina, responsavel = :responsavel, data_inicio = :data_inicio, data_fim = :data_fim WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':usina', $usina, PDO::PARAM_STR);
    $stmt->bindParam(':responsavel', $responsavel, PDO::PARAM_STR);
    $stmt->bindParam(':data_inicio', $data_inicio);
    $stmt->bindParam(':data_fim', $data_fim);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header('Location: EscalaSobreaviso.php');
        exit;
    } else {
        echo "Erro ao atualizar a escala de sobreaviso.";
    }
} else {
    echo "Método inválido para processar atualização.";
    exit;
}
?>
