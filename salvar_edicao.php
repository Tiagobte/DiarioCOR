<?php
include_once('conexao.php');

// Verifica se o formulário de edição foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_id'])) {
    // Recebe os dados do formulário
    $id = $_POST['edit_id'];
    $nova_data = $_POST['data'];
    $nova_hora = $_POST['hora'];
    $nova_atividade = $_POST['atividades'];
    $nova_usina = $_POST['usina'];

    // Atualiza o registro no banco de dados
    $query = "UPDATE diario_operacao SET data = :data, hora = :hora, atividades = :atividades, usina = :usina WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $resultado = $stmt->execute([':data' => $nova_data, ':hora' => $nova_hora, ':atividades' => $nova_atividade, ':usina' => $nova_usina, ':id' => $id]);

    if ($resultado) {
        // Redireciona para a página principal após editar
        header('Location: diario_operacao.php');
        exit;
    } else {
        // Tratamento de erro ao atualizar o registro
        echo "Erro ao atualizar o registro.";
    }
} else {
    // Redireciona se tentar acessar diretamente sem submeter o formulário
    header('Location: diario_operacao.php');
    exit;
}
?>
