<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuário - Diário COR</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <h2>Registrar Novo Usuário</h2>

        <!-- Exibir mensagem de erro -->
        <?php if (isset($_GET['error'])): ?>
        <div class="error-message">
            <p><?php echo htmlspecialchars($_GET['error']); ?></p>
        </div>
        <?php endif; ?>

        <!-- Exibir mensagem de sucesso -->
        <?php if (isset($_GET['success'])): ?>
        <div class="success-message">
            <p><?php echo htmlspecialchars($_GET['success']); ?></p>
        </div>
        <?php endif; ?>

        <!-- Formulário de registro -->
        <form action="create_user.php" method="POST">
            <div class="input-group">
                <label for="username">Usuário:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="name">Nome Completo:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="input-group">
                <label for="phone">Telefone:</label>
                <input type="text" id="phone" name="phone" required>
            </div>
            <button type="submit" class="submit-button">Registrar</button>
        </form>

        <!-- Botão para voltar ao login -->
        <button onclick="window.location.href='login.php'" class="back-button">Voltar ao Login</button>
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

/* Estilos do corpo */
body {
    font-family: 'Arial', sans-serif;
    background: linear-gradient(135deg, #2980b9, #6a11cb); /* Gradiente suave */
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Container do formulário */
.form-container {
    background-color: #fff;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
    text-align: center;
}

/* Título */
h2 {
    font-size: 2.2em;
    color: #333;
    margin-bottom: 20px;
}

/* Estilos dos campos de input */
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

/* Botão de envio */
.submit-button {
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

.submit-button:hover {
    background-color: #5a0fbf;
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
}

/* Botão de voltar ao login */
.back-button {
    width: 100%;
    background-color: #007bff;
    color: #fff;
    padding: 12px;
    border: none;
    border-radius: 5px;
    font-size: 1.1em;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
    margin-top: 10px;
}

.back-button:hover {
    background-color: #0056b3;
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
}

/* Mensagem de erro */
.error-message {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
    padding: 15px;
    border-radius: 5px;
    margin-bottom: 20px;
    display: inline-block;
    width: 100%;
}

.error-message p {
    margin: 0;
}

/* Mensagem de sucesso */
.success-message {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
    padding: 15px;
    border-radius: 5px;
    margin-bottom: 20px;
    display: inline-block;
    width: 100%;
}

.success-message p {
    margin: 0;
}

/* Responsividade */
@media (max-width: 768px) {
    .form-container {
        padding: 30px 20px;
    }

    h2 {
        font-size: 1.8em;
    }
}
</style>
