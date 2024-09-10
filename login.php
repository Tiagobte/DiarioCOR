<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifique se os índices existem
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Conectar ao banco de dados
    $conn = new mysqli('localhost', 'root', '', 'diariocor');

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Prepare e execute a consulta para obter o hash da senha
    $stmt = $conn->prepare("SELECT id, password_hash, is_master FROM users WHERE username = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $password_hash, $is_master);
        $stmt->fetch();

        // Verifique a senha
        if (password_verify($password, $password_hash)) {
            // Login bem-sucedido, defina as variáveis de sessão
            $_SESSION['user_id'] = $user_id;
            $_SESSION['is_master'] = $is_master;
            header('Location: index.php');
            exit();
        } else {
            $error = 'Usuário ou senha inválidos!';
        }
    } else {
        $error = 'Usuário ou senha inválidos!';
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css"> <!-- Link para o CSS -->
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <div class="input-group">
                <label for="username">Usuário:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <input type="submit" value="Login" class="login-button">
        </form>
        <?php
        if (isset($error)) {
            echo '<p class="error">' . htmlspecialchars($error) . '</p>';
        }
        ?>
        <p class="register-link">Não tem uma conta? <a href="register_user.php">Registre-se aqui</a></p> <!-- Link para a página de registro -->
    </div>
</body>
</html>



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
