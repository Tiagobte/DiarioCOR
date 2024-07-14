<?php
include_once('conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $atividades = $_POST['atividades'];
    $usina = $_POST['usina'];
    $ilha = 'Ilha 1'; // Definindo a ilha como Ilha 1

    // Inserir registro no banco de dados
    $query = "INSERT INTO diario_operacao (data, hora, atividades, usina, ilha) VALUES (:data, :hora, :atividades, :usina, :ilha)";
    $stmt = $pdo->prepare($query);

    if ($stmt->execute([':data' => $data, ':hora' => $hora, ':atividades' => $atividades, ':usina' => $usina, ':ilha' => $ilha])) {
        header('Location: diario_operacao_ilha1.php');
        exit;
    } else {
        $errorInfo = $stmt->errorInfo();
        echo "Erro ao inserir registro no banco de dados: " . htmlspecialchars($errorInfo[2]) . "<br>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Adicionar Registro - Diário de Operação - Ilha 1</title>
</head>
<body>
    <div class="container">
        <h2>Adicionar Registro - Diário de Operação - Ilha 1</h2>
        <form action="adicionar_diario_operacao_ilha1.php" method="POST" class="form-group">
            <div class="form-group">
                <label for="data">Data:</label>
                <input type="date" id="data" name="data" required>
            </div>
            <div class="form-group">
                <label for="hora">Hora:</label>
                <input type="time" id="hora" name="hora" required>
            </div>
            <div class="form-group">
                <label for="atividades">Atividades:</label>
                <textarea id="atividades" name="atividades" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="usina">Usina:</label>
                <select id="usina" name="usina" required>
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
        <a href="diario_operacao_ilha1.php">Voltar</a>
    </div>
</body>
</html>

