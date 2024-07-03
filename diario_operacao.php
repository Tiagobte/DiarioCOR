<?php
include_once('conexao.php');

// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Processamento do formulário aqui
    $data = $_POST['data'];
    $atividades = $_POST['atividades'];
    $usina = $_POST['usina']; // Nova variável para capturar o valor da usina

    // Insira aqui o código para salvar no banco de dados

    // Exemplo básico de inserção
    $query = "INSERT INTO diario_operacao (data, atividades, usina) VALUES (:data, :atividades, :usina)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':data' => $data, ':atividades' => $atividades, ':usina' => $usina]);

    // Redireciona para evitar reenvio do formulário
    header('Location: diario_operacao.php');
    exit;
}

// Consulta para obter as entradas do diário de operação, ordenadas por data e usina
$query = "SELECT * FROM diario_operacao ORDER BY data DESC, usina";
$stmt = $pdo->prepare($query);
$stmt->execute();
$registros = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Diário de Operação</title>
</head>
<body>
    <div class="container">
        <h2>Diário de Operação</h2>

        <!-- Formulário de inserção -->
        <form action="diario_operacao.php" method="POST">
            <div class="form-group">
                <label for="data">Data:</label>
                <input type="date" id="data" name="data" required>
            </div>
            <div class="form-group">
                <label for="atividades">Atividades:</label>
                <textarea id="atividades" name="atividades" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="usina">Usina:</label>
                <select id="usina" name="usina" required>
                    <option value="">Selecione a Usina</option>
                    <option value="ASU - Alto Sucuriú">ASU - Alto Sucuriú</option>
                    <option value="BOC - Bocaiuva">BOC - Bocaiuva</option>
                    <option value="SFR - São Francisco">SFR - São Francisco</option>
                    <option value="ART - Arturo Andreoli">ART - Arturo Andreoli</option>
                    <option value="BVI - Boa Vista">BVI - Boa Vista</option>
                    <option value="CAC - Cachoeira">CAC - Cachoeira</option>
                    <option value="CON - Confluência">CON - Confluência</option>
                    <option value="CGZ - Carlos Gonzatto">CGZ - Carlos Gonzatto</option>
                    <option value="MBO - Marco Baldo">MBO - Marco Baldo</option>
                    <option value="RON - Rondinha">RON - Rondinha</option>
                    <option value="GAM - Gameleira">GAM - Gameleira</option>
                    <option value="SBO - São Bartolomeu">SBO - São Bartolomeu</option>
                </select>
            </div>
            <button type="submit" class="btn">Salvar Registro</button>
        </form>

        <br>
        <br>
        <a href="#" onclick="history.back();">Retornar</a>
        <!-- Tabela de exibição dos registros -->
        <table>
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Usina</th>
                    <th>Atividades</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($registros as $registro): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($registro['data']); ?></td>
                        <td><?php echo htmlspecialchars($registro['usina']); ?></td>
                        <td><?php echo htmlspecialchars($registro['atividades']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
