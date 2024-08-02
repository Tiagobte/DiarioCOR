<?php
// Inclua o autoloader do Composer
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

// Caminho para o arquivo Excel
$inputFileName = 'C:/xampp/htdocs/DiarioCor/contatos/contatos.xlsx';

// Ler o arquivo Excel
$spreadsheet = IOFactory::load($inputFileName);

// Obter a planilha ativa
$worksheet = $spreadsheet->getActiveSheet();

// Obter os dados
$data = $worksheet->toArray();

// Verificar se há uma consulta de busca
$searchQuery = isset($_GET['search']) ? trim($_GET['search']) : '';

// Filtrar os dados com base na consulta
$filteredData = [];
if ($searchQuery !== '') {
    $filteredData = array_filter($data, function($row) use ($searchQuery) {
        foreach ($row as $cell) {
            if (stripos($cell, $searchQuery) !== false) {
                return true;
            }
        }
        return false;
    });
}

// Verificar se há dados para exibir
$hasData = !empty($data);
$hasFilteredData = !empty($filteredData);

// Exibir os dados em uma tabela HTML
echo '<!DOCTYPE html>
<html>
<head>
    <title>Agenda MCQ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        header h1 {
            margin: 0;
        }
        .action-buttons {
            display: flex;
            gap: 10px;
        }
        .action-buttons button {
            padding: 10px 20px;
            font-size: 16px;
            margin-right: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .action-buttons button.logout {
            background-color: #dc3545;
        }
        .action-buttons button:hover {
            opacity: 0.8;
        }
        .search-form {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .search-form label {
            font-weight: bold;
            margin-right: 10px;
        }
        .search-form input[type="text"] {
            flex-grow: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        .search-form button {
            padding: 10px 20px;
            margin-left: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .search-form button:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
        }
        th {
            background-color: #f2f2f2;
            text-align: left;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .no-results {
            color: #ff0000;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Agenda MCQ</h1>
            <div class="action-buttons">
                <button onclick="window.location.href=\'index.php\'">Tela Principal</button>
                <button class="logout" onclick="window.location.href=\'logout.php\'">Logout</button>
            </div>
        </header>
        <form method="get" class="search-form">
            <label for="search">Buscar:</label>
            <input type="text" id="search" name="search" value="' . htmlspecialchars($searchQuery) . '">
            <button type="submit">Buscar</button>
        </form>';

// Exibir resultado da busca
if ($searchQuery !== '' && !$hasFilteredData) {
    echo '<p class="no-results">Nenhum dado encontrado para "<strong>' . htmlspecialchars($searchQuery) . '</strong>"</p>';
}

// Exibir a tabela somente se houver dados
if ($hasData) {
    echo '<table>
        <thead>
            <tr>';
    // Exibir cabeçalhos (opcional)
    if ($hasFilteredData && !empty($filteredData)) {
        // Assegurar que o array não está vazio
        if (isset($filteredData[0]) && is_array($filteredData[0])) {
            foreach ($filteredData[0] as $header) {
                echo '<th>' . htmlspecialchars($header) . '</th>';
            }
            echo '</tr>';
        }
    } else {
        // Exibir cabeçalhos para todos os dados
        if (isset($data[0]) && is_array($data[0])) {
            foreach ($data[0] as $header) {
                echo '<th>' . htmlspecialchars($header) . '</th>';
            }
            echo '</tr>';
        }
    }
    echo '   </thead>
        <tbody>';
    // Exibir os dados filtrados ou todos os dados
    $displayData = $hasFilteredData ? $filteredData : $data;
    foreach ($displayData as $index => $row) {
        // Pular o cabeçalho se já exibido
        if ($index == 0 && $hasFilteredData) continue;
        echo '<tr>';
        foreach ($row as $cell) {
            echo '<td>' . htmlspecialchars($cell) . '</td>';
        }
        echo '</tr>';
    }
    echo '   </tbody>
    </table>';
} else {
    echo '<p class="no-results">Nenhum dado disponível para exibir.</p>';
}

echo '  </div>
</body>
</html>';
?>
