<?php

// Configuração do caminho das sessões, dependendo do ambiente
if ($_SERVER['SERVER_NAME'] == 'localhost') {
    ini_set('session.save_path', 'C:/xampp/tmp'); // Caminho local para sessões (Windows)
} else {
    ini_set('session.save_path', '/home/storage/0/2a/3a/mcq2/public_html/sessions'); // Caminho no servidor Localweb
}

// Inicia a sessão
session_start();

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Verifica se estamos no localhost ou no servidor da Localweb
    if ($_SERVER['SERVER_NAME'] == 'localhost') {
        // Configurações de banco de dados para localhost
        $servername = 'localhost';
        $db_username = 'root';
        $db_password = ''; // Defina sua senha local, se houver
        $dbname = 'diariocor';
    } else {
        // Configurações de banco de dados para Localweb
        $servername = '186.202.152.237';
        $db_username = 'diariocor';
        $db_password = 'Mcq@134';
        $dbname = 'diariocor';
    }

    // Conectar ao banco de dados
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Preparar e executar a consulta para obter o hash da senha
    $stmt = $conn->prepare("SELECT id, password_hash, is_master FROM users WHERE username = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $password_hash, $is_master);
        $stmt->fetch();

        // Verifica a senha
        if (password_verify($password, $password_hash)) {
            // Login bem-sucedido, definir as variáveis de sessão
            $_SESSION['user_id'] = $user_id;
            $_SESSION['is_master'] = $is_master;
            $_SESSION['loggedin'] = true; // Marcar como logado
            header('Location: index.php');
            exit();
        } else {
            $error = 'Usuário ou senha inválidos!';
        }
    } else {
        $error = 'Usuário ou senha inválidos!';
    }

    // Fechar a conexão
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Reset básico */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Estilos da página */
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #2980b9, #6a11cb); /* Gradiente suave de fundo */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        /* Container de login */
        .login-container {
            background-color: #fff;
            padding: 40px 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        /* Estilo do título */
        h2 {
            font-size: 2.2em;
            color: #333;
            margin-bottom: 20px;
            font-weight: 600;
        }

        /* Estilo dos grupos de input */
        .input-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .input-group label {
            display: block;
            font-size: 1em;
            color: #333;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .input-group input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
            background-color: #f9f9f9;
            transition: border-color 0.3s ease;
        }

        .input-group input:focus {
            border-color: #6a11cb;
            outline: none;
        }

        /* Botão de login */
        input[type="submit"] {
            width: 100%;
            background-color: #6a11cb;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 1.1em;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #5a0fbf;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        /* Mensagem de erro */
        .error {
            color: #e74c3c;
            margin-top: 10px;
        }

        /* Link de registro */
        .register-link {
            margin-top: 20px;
            color: #333;
        }

        .register-link a {
            color: #6a11cb;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .register-link a:hover {
            color: #5a0fbf;
            text-decoration: underline;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .login-container {
                padding: 30px 20px;
            }

            h2 {
                font-size: 1.8em;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <div class="input-group">
                <label for="username">Usuário:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <input type="submit" value="Entrar">
        </form>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <div class="register-link">
            <p>Ainda não tem uma conta? <a href="register_user.php">Crie uma aqui</a></p>
        </div>
    </div>
</body>
</html>
