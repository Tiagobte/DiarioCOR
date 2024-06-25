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

// Função para validar formulário de registro
function validateRegisterForm() {
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;
    var password = document.getElementById('register-password').value;
    var confirmPassword = document.getElementById('confirmPassword').value;

    if (name.trim() === '' || email.trim() === '' || phone.trim() === '' || password.trim() === '' || confirmPassword.trim() === '') {
        document.getElementById('register-error').innerText = 'Por favor, preencha todos os campos.';
        return false;
    }

    if (password !== confirmPassword) {
        document.getElementById('register-error').innerText = 'As senhas digitadas não coincidem. Por favor, tente novamente.';
        return false;
    }

    return true;
}

// Adiciona listener para o evento submit do formulário de registro
document.getElementById('registerForm').addEventListener('submit', function(event) {
    if (!validateRegisterForm()) {
        event.preventDefault(); // Evita o envio do formulário se a validação falhar
    }
});
