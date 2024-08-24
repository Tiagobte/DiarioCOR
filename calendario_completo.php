<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendário Completo de Escala</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .page-title {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
            font-size: 1.5em;
            z-index: 1000;
        }

        .container {
            max-width: 1200px;
            margin: 80px auto 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        h2 {
            margin-top: 30px;
            color: #007bff;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
            font-size: 1.5em;
        }

        .search-container {
            margin-bottom: 20px;
            text-align: center;
        }

        .search-container input[type="text"] {
            padding: 10px;
            width: 300px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            margin-right: 10px;
        }

        .search-container button {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        .search-container button:hover {
            background-color: #0056b3;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .data-table th, .data-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .data-table th {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
        }

        .data-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .data-table tr:hover {
            background-color: #f1f1f1;
        }

        .data-table td {
            font-size: 0.9em;
        }

        @media (max-width: 768px) {
            .data-table, .data-table thead, .data-table tbody, .data-table th, .data-table td, .data-table tr {
                display: block;
            }

            .data-table th, .data-table td {
                box-sizing: border-box;
                width: 100%;
            }

            .data-table th {
                text-align: center;
            }

            .data-table td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }

            .data-table td::before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 50%;
                padding-left: 10px;
                font-weight: bold;
                text-align: left;
            }
        }
    </style>
</head>
<body>
    <div class="page-title">Calendário Completo de Escala de Operadores</div>

    <div class="container">
        <h1>Calendário Completo de Escala de Operadores</h1>
        
        <div class="search-container">
            <input type="text" id="search" placeholder="Buscar por data (dd/mm/aaaa)">
            <button id="search-btn">Buscar</button>
        </div>

        <?php
        function gerarCalendarioCompleto($dataInicio, $dataFim, $duplas) {
            $dataInicio = new DateTime($dataInicio);
            $dataFim = new DateTime($dataFim);
            
            $indiceDupla = 0; 

            function obterProximaDupla(&$indice, $duplas) {
                $dupla = $duplas[$indice];
                $indice = ($indice + 1) % count($duplas);
                return $dupla;
            }

            $calendario = [];

            while ($dataInicio <= $dataFim) {
                $duplaDiurno = obterProximaDupla($indiceDupla, $duplas);
                $duplaNoturno = obterProximaDupla($indiceDupla, $duplas);

                $calendario[$dataInicio->format('Y-m')][] = [
                    'Data' => $dataInicio->format('d/m/Y'),
                    'Turno' => '07:00 - 19:00',
                    'Operadores' => implode(', ', $duplaDiurno)
                ];

                $calendario[$dataInicio->format('Y-m')][] = [
                    'Data' => $dataInicio->format('d/m/Y'),
                    'Turno' => '19:00 - 07:00 (próximo dia)',
                    'Operadores' => implode(', ', $duplaNoturno)
                ];

                $dataInicio->modify('+1 day');
            }

            foreach ($calendario as $mes => $registros) {
                echo '<h2>' . DateTime::createFromFormat('!Y-m', $mes)->format('F Y') . '</h2>';
                echo '<table class="data-table">';
                echo '<thead>';
                echo '<tr><th>Data</th><th>Turno</th><th>Operadores</th></tr>';
                echo '</thead>';
                echo '<tbody>';
                foreach ($registros as $registro) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($registro['Data']) . '</td>';
                    echo '<td>' . htmlspecialchars($registro['Turno']) . '</td>';
                    echo '<td>' . htmlspecialchars($registro['Operadores']) . '</td>';
                    echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
            }
        }

        $dataInicio = '2024-09-01';
        $dataFim = '2024-12-31'; 

        $duplas = [
            ['Luis Paulo', 'Jobson'],
            ['Joseneia', 'Júlio'],
            ['Filipe Lima', 'Aldeli'],
            ['Filipi', 'Christopher']
        ];

        gerarCalendarioCompleto($dataInicio, $dataFim, $duplas);
        ?>
    </div>

    <script>
        document.getElementById('search-btn').addEventListener('click', function() {
            const searchTerm = document.getElementById('search').value.toLowerCase();
            const rows = document.querySelectorAll('.data-table tbody tr');
            rows.forEach(row => {
                const date = row.children[0].textContent.toLowerCase();
                if (date.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        document.getElementById('search').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('.data-table tbody tr');
            rows.forEach(row => {
                const date = row.children[0].textContent.toLowerCase();
                if (date.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
