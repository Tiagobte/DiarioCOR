<?php
include_once('conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Diário de Operação - Ilha 1</title>
</head>
<body>
    <div class="container">
        <h2>Diário de Operação - Ilha 1</h2>
        <table>
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Atividades</th>
                    <th>Usina</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Consulta para obter registros da Ilha 1
                $query = "SELECT * FROM diario_operacao WHERE ilha = 'Ilha 1' ORDER BY data DESC, hora DESC";
                $stmt = $pdo->prepare($query);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['data']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['hora']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['atividades']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['usina']) . "</td>";
                        echo "<td>";
                        echo "<a href='editar_diario_operacao_ilha1.php?id=" . $row['id'] . "'>Editar</a> | ";
                        echo "<a href='excluir_diario_operacao_ilha1.php?id=" . $row['id'] . "'>Excluir</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Nenhum registro encontrado.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="adicionar_diario_operacao_ilha1.php">Adicionar Novo Registro - Ilha 1</a>
        <br>
        <a href="index.php">Voltar para a Tela Principal</a>
    </div>
</body>
</html>

