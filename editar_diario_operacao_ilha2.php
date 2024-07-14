<?php
include_once('conexao.php');

// Verifica se o ID foi fornecido na URL
if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para obter o registro pelo ID
    $query = "SELECT * FROM diario_operacao WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':id' => $id]);
    $registro = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica se o registro foi encontrado
    if (!$registro) {
        die("Registro não encontrado.");
    }

    // Variáveis para preencher o formulário
    $data = $registro['data'];
    $hora = $registro['hora'];
    $atividades = $registro['atividades'];
    $usina = $registro['usina'];

    // Processamento do formulário de edição
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
        $data = $_POST['data'];
        $hora = $_POST['hora'];
        $atividades = $_POST['atividades'];
        $usina = $_POST['usina'];

        // Atualiza o registro no banco de dados
        $query = "UPDATE diario_operacao SET data = :data, hora = :hora, atividades = :atividades, usina = :usina WHERE id = :id";
        $stmt = $pdo->prepare($query);
        if ($stmt->execute([':data' => $data, ':hora' => $hora, ':atividades' => $atividades, ':usina' => $usina, ':id' => $id])) {
            // Redireciona após a atualização para evitar reenvio do formulário
            header('Location: diario_operacao_ilha2.php');
            exit;
        } else {
            $errorInfo = $stmt->errorInfo();
            echo "Erro ao atualizar registro no banco de dados: " . htmlspecialchars($errorInfo[2]) . "<br>";
        }
    }
} else {
    die("ID não especificado.");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Editar Registro - Diário de Operação Ilha 2</title>
</head>
<body>
    <div class="container">
        <h2>Editar Registro - Diário de Operação Ilha 2</h2>
        <form action="editar_diario_operacao_ilha2.php?id=<?php echo $id; ?>" method="POST" class="form-group">
            <div class="form-group">
                <label for="data">Data:</label>
                <input type="date" id="data" name="data" value="<?php echo htmlspecialchars($data); ?>" required>
            </div>
            <div class="form-group">
                <label for="hora">Hora:</label>
                <input type="time" id="hora" name="hora" value="<?php echo htmlspecialchars($hora); ?>" required>
            </div>
            <div class="form-group">
                <label for="atividades">Atividades:</label>
                <textarea id="atividades" name="atividades" rows="4" required><?php echo htmlspecialchars($atividades); ?></textarea>
            </div>
            <div class="form-group">
                <label for="usina">Usina:</label>
                <select id="usina" name="usina" required>
                    <option value="ASU - Alto Sucuriú" <?php if ($usina === "ASU - Alto Sucuriú") echo "selected"; ?>>ASU - Alto Sucuriú</option>
                    <option value="BOC - Bocaiuva" <?php if ($usina === "BOC - Bocaiuva") echo "selected"; ?>>BOC - Bocaiuva</option>
                    <option value="SFR - São Francisco" <?php if ($usina === "SFR - São Francisco") echo "selected"; ?>>SFR - São Francisco</option>
                    <option value="ART - Arturo Andreoli" <?php if ($usina === "ART - Arturo Andreoli") echo "selected"; ?>>ART - Arturo Andreoli</option>
                    <option value="BVI - Boa Vista" <?php if ($usina === "BVI - Boa Vista") echo "selected"; ?>>BVI - Boa Vista</option>
                    <option value="CAC - Cachoeira" <?php if ($usina === "CAC - Cachoeira") echo "selected"; ?>>CAC - Cachoeira</option>
                    <option value="CON - Confluência" <?php if ($usina === "CON - Confluência") echo "selected"; ?>>CON - Confluência</option>
                    <option value="CGZ - Carlos Gonzatto" <?php if ($usina === "CGZ - Carlos Gonzatto") echo "selected"; ?>>CGZ - Carlos Gonzatto</option>
                    <option value="MBO - Marco Baldo" <?php if ($usina === "MBO - Marco Baldo") echo "selected"; ?>>MBO - Marco Baldo</option>
                    <option value="RON - Rondinha" <?php if ($usina === "RON - Rondinha") echo "selected"; ?>>RON - Rondinha</option>
                    <option value="GAM - Gameleira" <?php if ($usina === "GAM - Gameleira") echo "selected"; ?>>GAM - Gameleira</option>
                    <option value="SBO - São Bartolomeu" <?php if ($usina === "SBO - São Bartolomeu") echo "selected"; ?>>SBO - São Bartolomeu</option>
                </select>
            </div>
            <button type="submit" name="update" class="btn">Salvar Alterações</button>
        </form>
    </div>
</body>
</html>
