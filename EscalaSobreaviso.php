<?php
include_once('conexao.php');

// Exclusão de escala de sobreaviso
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $query = "DELETE FROM escala_sobreaviso WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $delete_id, PDO::PARAM_INT);
    if ($stmt->execute()) {
        header('Location: EscalaSobreaviso.php');
        exit;
    } else {
        echo "Erro ao excluir a escala de sobreaviso.";
    }
}

// Inserção de escala de sobreaviso
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usina = $_POST['usina'];
    $responsavel = $_POST['responsavel'];
    $data_inicio = $_POST['data_inicio'];
    $data_fim = $_POST['data_fim'];

    $query = "INSERT INTO escala_sobreaviso (usina, responsavel, data_inicio, data_fim) VALUES (:usina, :responsavel, :data_inicio, :data_fim)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':usina', $usina, PDO::PARAM_STR);
    $stmt->bindParam(':responsavel', $responsavel, PDO::PARAM_STR);
    $stmt->bindParam(':data_inicio', $data_inicio, PDO::PARAM_STR);
    $stmt->bindParam(':data_fim', $data_fim, PDO::PARAM_STR);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Escala de sobreaviso salva com sucesso."]);
        exit;
    } else {
        echo json_encode(["success" => false, "message" => "Erro ao salvar a escala de sobreaviso."]);
        exit;
    }
}

// Consulta para obter as escalas de sobreaviso
$query = "SELECT * FROM escala_sobreaviso";
$stmt = $pdo->prepare($query);
$stmt->execute();
$escalas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Escala de Sobreaviso</title>
</head>
<body>
    <div class="container">
        <h2>Escala de Sobreaviso</h2>
        
        <form action="EscalaSobreaviso.php" method="POST">
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
            <div class="form-group">
                <label for="responsavel">Responsável:</label>
                <input type="text" id="responsavel" name="responsavel" required>
            </div>
            <div class="form-group">
                <label for="data_inicio">Data de Início:</label>
                <input type="date" id="data_inicio" name="data_inicio" required>
            </div>
            <div class="form-group">
                <label for="data_fim">Data de Fim:</label>
                <input type="date" id="data_fim" name="data_fim" required>
            </div>
            <button type="submit" class="btn">Salvar Escala</button>
        </form>

        <br>

        <!-- Tabela de exibição das escalas -->
        <table>
            <thead>
                <tr>
                    <th>Usina</th>
                    <th>Responsável</th>
                    <th>Data Início</th>
                    <th>Data Fim</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($escalas as $escala): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($escala['usina']); ?></td>
                        <td><?php echo htmlspecialchars($escala['responsavel']); ?></td>
                        <td><?php echo htmlspecialchars($escala['data_inicio']); ?></td>
                        <td><?php echo htmlspecialchars($escala['data_fim']); ?></td>
                        <td>
                            <a href="editar_escala.php?id=<?php echo $escala['id']; ?>">Editar</a>
                            <a href="EscalaSobreaviso.php?delete_id=<?php echo $escala['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir esta escala de sobreaviso?')">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <br>
        <a href="index.php" onclick="history.back();">Retornar</a>
    </div>

    <!-- Script JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        // Função para submeter o formulário via AJAX
        $('form').submit(function(event) {
            event.preventDefault(); // Evita o comportamento padrão do formulário
            
            // Faz a requisição AJAX para processa_escala.php
            $.ajax({
                type: 'POST',
                url: 'EscalaSobreaviso.php', // A própria página que exibe as escalas de sobreaviso
                data: $(this).serialize(), // Serializa os dados do formulário
                success: function(response) {
                    try {
                        var result = JSON.parse(response);
                        if (result.success) {
                            alert(result.message); // Exibe mensagem de sucesso
                            // Limpa os campos do formulário após o envio
                            $('form')[0].reset();
                            // Atualiza a tabela de escalas de sobreaviso na página atual
                            updateEscalasTable();
                        } else {
                            alert(result.message); // Exibe mensagem de erro
                        }
                    } catch (error) {
                        alert('Erro ao processar a resposta do servidor.'); // Exibe mensagem de erro genérico
                    }
                },
                error: function() {
                    alert('Erro ao enviar dados. Por favor, tente novamente.'); // Exibe mensagem de erro de requisição
                }
            });
        });

        // Função para atualizar a tabela de escalas de sobreaviso
        function updateEscalasTable() {
            $.ajax({
                type: 'GET',
                url: 'EscalaSobreaviso.php', // Página que exibe as escalas de sobreaviso
                success: function(data) {
                    // Substitui o conteúdo da tabela atualizado
                    $('tbody').html(data);
                },
                error: function() {
                    alert('Erro ao atualizar a tabela de escalas de sobreaviso.'); // Exibe mensagem de erro de requisição
                }
            });
        }
    });
    </script>
</body>
</html>
