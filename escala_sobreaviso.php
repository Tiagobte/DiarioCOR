<?php
require 'vendor/autoload.php'; // Inclua o autoload do Composer

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception;

// Função para ler e filtrar os dados da planilha
function lerPlanilha($busca = '') {
    $filePath = 'escala_sobreaviso.xlsx'; // Caminho absoluto para sua planilha

    try {
        // Verificar se o arquivo realmente existe
        if (!file_exists($filePath)) {
            throw new Exception('Arquivo não encontrado: ' . $filePath);
        }

        // Ler a planilha
        $reader = IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($filePath);
        $sheet = $spreadsheet->getActiveSheet();
        $data = $sheet->toArray();

        // Verificar se há dados na planilha
        if (empty($data)) {
            throw new Exception('A planilha está vazia ou não contém dados.');
        }

        // Filtrar dados
        $resultados = [];
        foreach ($data as $linha) {
            if ($busca === '' || stripos(implode(' ', $linha), $busca) !== false) {
                $resultados[] = $linha;
            }
        }

        return $resultados;
    } catch (Exception $e) {
        echo 'Erro ao ler a planilha: ', htmlspecialchars($e->getMessage());
        return [];
    }
}

// Processar a busca
$busca = isset($_GET['busca']) ? $_GET['busca'] : '';
$dados = lerPlanilha($busca);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escala de Sobreaviso</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>

<h1>Escala de Sobreaviso</h1>

<form method="get" action="escala_sobreaviso.php">
    <label for="busca">Buscar:</label>
    <input type="text" id="busca" name="busca" value="<?php echo htmlspecialchars($busca); ?>">
    <button type="submit">Buscar</button>
</form>

<table>
    <thead>
        <tr>
            <?php
            // Exibir os cabeçalhos, se disponíveis
            if (!empty($dados) && isset($dados[0])) {
                foreach ($dados[0] as $header) {
                    echo '<th>' . htmlspecialchars($header) . '</th>';
                }
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php
        // Exibir os dados filtrados
        if (!empty($dados)) {
            // Se houver dados, exibe todas as linhas (incluindo a primeira linha, que pode ser cabeçalho)
            foreach ($dados as $linha) {
                echo '<tr>';
                foreach ($linha as $celula) {
                    echo '<td>' . htmlspecialchars($celula) . '</td>';
                }
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="100%">Nenhum dado encontrado.</td></tr>';
        }
        ?>
    </tbody>
</table>

<a href="escala_sobreaviso.php"><button>Escala de Sobreaviso</button></a>

</body>
</html>
