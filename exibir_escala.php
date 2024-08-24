<?php
require 'conexao.php'; // Inclua o arquivo de conexão com o banco de dados

// Consulta para obter todos os dados da tabela operadores
$sql = "SELECT * FROM operadores";
$stmt = $conexao->prepare($sql);
$stmt->execute();
$operadores = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operadores</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Ajuste o caminho se necessário -->
</head>
<body>
    <h1>Lista de Operadores</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Turno Início</th>
                <th>Turno Fim</th>
                <th>Data</th>
                <th>Turno</th>
                <th>Grupo</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($operadores)): ?>
                <tr>
                    <td colspan="7">Nenhum operador encontrado.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($operadores as $operador): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($operador['id']); ?></td>
                        <td><?php echo htmlspecialchars($operador['nome']); ?></td>
                        <td><?php echo htmlspecialchars($operador['turno_inicio']); ?></td>
                        <td><?php echo htmlspecialchars($operador['turno_fim']); ?></td>
                        <td><?php echo htmlspecialchars($operador['data']); ?></td>
                        <td><?php echo htmlspecialchars($operador['turno']); ?></td>
                        <td><?php echo htmlspecialchars($operador['grupo']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
