// Função para validar formulário de login
function validateLoginForm() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    if (username.trim() === '' || password.trim() === '') {
        document.getElementById('login-error').innerText = 'Por favor, preencha todos os campos.';
        return false;
    }

    return true;
}

// Função para validar formulário de login
function validateLoginForm() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    if (username.trim() === '' || password.trim() === '') {
        document.getElementById('login-error').innerText = 'Por favor, preencha todos os campos.';
        return false;
    }

    return true;
}

// Adiciona listener para o evento submit do formulário de login
document.getElementById('loginForm').addEventListener('submit', function(event) {
    if (!validateLoginForm()) {
        event.preventDefault(); // Evita o envio do formulário se a validação falhar
    }
});
