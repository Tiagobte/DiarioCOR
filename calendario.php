<?php
// Função para formatar a data em 'dd/mm/yyyy'
function formatDate($date) {
    return date('d/m/Y', strtotime($date));
}

// Data de início
$dataInicio = '2024-08-24'; // Data de início: 24/08/2024
$dataFim = '2024-08-26'; // Data de fim: 26/08/2024

// Operadores e escalas
$escalas = [
    '2024-08-24' => [
        '07:00 - 19:00' => ['Luis Paulo', 'Jobson'],
    ],
    '2024-08-25' => [
        '07:00 - 19:00' => ['Joseneia', 'Júlio'],
    ],
    '2024-08-26' => [
        '07:00 - 19:00' => ['Filipe Lima', 'Aldeli'],
    ],
    '2024-08-27' => [
        '07:00 - 19:00' => ['Filipi Hasegawa', 'Christopher'],
    ],
];

// Função para gerar a tabela do calendário
function gerarCalendario($dataInicio, $dataFim, $escalas) {
    $dataAtual = $dataInicio;
    echo '<table border="1">';
    echo '<thead><tr><th>Data</th><th>Turno</th><th>Operadores</th></tr></thead>';
    echo '<tbody>';

    while ($dataAtual <= $dataFim) {
        $dataFormatada = formatDate($dataAtual);
        $turnos = $escalas[$dataAtual] ?? [];
        
        foreach ($turnos as $turno => $operadores) {
            $operadoresLista = implode(', ', $operadores);
            echo "<tr>
                    <td>{$dataFormatada}</td>
                    <td>{$turno}</td>
                    <td>{$operadoresLista}</td>
                </tr>";
        }

        // Avançar para o próximo dia
        $dataAtual = date('Y-m-d', strtotime($dataAtual . ' +1 day'));
    }

    echo '</tbody></table>';
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendário de Escala</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Calendário de Escala de Operadores</h1>
    <?php gerarCalendario($dataInicio, $dataFim, $escalas); ?>
</body>
</html>
