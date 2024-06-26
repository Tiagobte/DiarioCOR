<?php
// Inclui o arquivo de conexão com o banco de dados
include_once('conexao.php');

// Verifica se os dados do formulário foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $usina = $_POST['usina'];
    $responsavel = $_POST['responsavel'];
    $data_inicio = $_POST['data_inicio'];
    $data_fim = $_POST['data_fim'];

    // Insere os dados na tabela escala_sobreaviso
    $query = "INSERT INTO escala_sobreaviso (usina, responsavel, data_inicio, data_fim) VALUES (:usina, :responsavel, :data_inicio, :data_fim)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':usina', $usina, PDO::PARAM_STR);
    $stmt->bindParam(':responsavel', $responsavel, PDO::PARAM_STR);
    $stmt->bindParam(':data_inicio', $data_inicio);
    $stmt->bindParam(':data_fim', $data_fim);
    
    if ($stmt->execute()) {
        // Prepara a resposta em JSON para o JavaScript
        $response = [
            'success' => true,
            'message' => 'Escala de sobreaviso salva com sucesso.'
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'Erro ao salvar a escala de sobreaviso.'
        ];
    }

    // Retorna a resposta em JSON
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
?>
