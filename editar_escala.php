<?php
include_once('conexao.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM escala_sobreaviso WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $escala = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    echo "ID da escala não especificado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Editar Escala de Sobreaviso</title>
</head>
<body>
    <div class="container">
        <h2>Editar Escala de Sobreaviso</h2>
        
        <form action="atualizar_escala.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $escala['id']; ?>">
            
            <div class="form-group">
                <label for="usina">Usina:</label>
                <input type="text" id="usina" name="usina" value="<?php echo htmlspecialchars($escala['usina']); ?>" required>
            </div>
            <div class="form-group">
                <label for="responsavel">Responsável:</label>
                <input type="text" id="responsavel" name="responsavel" value="<?php echo htmlspecialchars($escala['responsavel']); ?>" required>
            </div>
            <div class="form-group">
                <label for="data_inicio">Data de Início:</label>
                <input type="date" id="data_inicio" name="data_inicio" value="<?php echo htmlspecialchars($escala['data_inicio']); ?>" required>
            </div>
            <div class="form-group">
                <label for="data_fim">Data de Fim:</label>
                <input type="date" id="data_fim" name="data_fim" value="<?php echo htmlspecialchars($escala['data_fim']); ?>" required>
            </div>
            <button type="submit" class="btn">Atualizar Escala</button>
        </form>
    </div>
</body>
</html>
