<?php
// Conectar ao banco de dados
$conn = new mysqli("localhost", "root", "", "diariocor");

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Obter os dados enviados via POST
$data = json_decode(file_get_contents('php://input'), true);

foreach ($data as $row) {
    $data = $conn->real_escape_string($row['data']);
    $hora = $conn->real_escape_string($row['hora']);
    $operador = $conn->real_escape_string($row['operador']);
    $ug_local = $conn->real_escape_string($row['ug_local']);
    $alarme = $conn->real_escape_string($row['alarme']);
    $acoes = $conn->real_escape_string($row['acoes']);
    $comentario = $conn->real_escape_string($row['comentario']);
    $situacao = $conn->real_escape_string($row['situacao']);

    // Inserir no banco de dados
    $sql = "INSERT INTO alarmes_recorrentes (data, hora, operador, ug_local, alarme, acoes, comentario, situacao)
            VALUES ('$data', '$hora', '$operador', '$ug_local', '$alarme', '$acoes', '$comentario', '$situacao')";

    if (!$conn->query($sql)) {
        echo "Erro ao salvar os dados: " . $conn->error;
        exit;
    }
}

echo "Dados salvos com sucesso!";
$conn->close();

