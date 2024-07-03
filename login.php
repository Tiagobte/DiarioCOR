<?php
// Inicia a sessão
session_start();

// Inclui o arquivo de conexão com o banco de dados
require_once 'db.php';

// Verifica se os dados do formulário foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados do formulário de forma segura
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = $_POST['password'];

    try {
        // Consulta preparada para selecionar o usuário com o username informado
        $query = "SELECT * FROM users WHERE username = :username";
        $statement = $pdo->prepare($query);
        $statement->execute([':username' => $username]);
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        // Verifica se encontrou um usuário correspondente
        if ($user) {
            // Verifica se a senha digitada corresponde à senha no banco de dados
            if (md5($password) === $user['password']) {
                // Armazena o ID e o nome do usuário na sessão
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];

                // Redireciona para a página inicial
                header('Location: index.php');
                exit;
            } else {
                // Senha incorreta
                $_SESSION['error_message'] = "Credenciais inválidas. Tente novamente.";
                header('Location: login.html');
                exit;
            }
        } else {
            // Usuário não encontrado
            $_SESSION['error_message'] = "Credenciais inválidas. Tente novamente.";
            header('Location: login.html');
            exit;
        }
    } catch(PDOException $e) {
        // Em caso de erro na consulta, exibe a mensagem de erro
        $_SESSION['error_message'] = "Erro na consulta: " . $e->getMessage();
        header('Location: login.html');
        exit;
    }
}
?>

