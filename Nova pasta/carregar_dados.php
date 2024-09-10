<?php
// Conectar ao banco de dados
$conn = new mysqli("localhost", "root", "", "diariocor");

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consulta para buscar os dados
$sql = "SELECT * FROM alarmes_recorrentes ORDER BY id DESC";
$result = $conn->query($sql);

$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Retorna os dados em formato JSON
echo json_encode($data);

$conn->close();
