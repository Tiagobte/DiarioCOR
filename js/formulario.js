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
document.getElementById('escalaForm').addEventListener('submit', function(event) {
    event.preventDefault();

    // Obter os valores do formulário
    const usina = document.getElementById('usina').value;
    const responsavel = document.getElementById('responsavel').value;
    const dataInicio = document.getElementById('data-inicio').value;
    const dataFim = document.getElementById('data-fim').value;

    // Criar uma nova linha na tabela
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td>${usina}</td>
        <td>${responsavel}</td>
        <td>${dataInicio}</td>
        <td>${dataFim}</td>
    `;

    // Adicionar a nova linha ao corpo da tabela
    document.getElementById('escalaTableBody').appendChild(newRow);

    // Salvar a escala no armazenamento local
    salvarEscala(usina, responsavel, dataInicio, dataFim);

    // Limpar o formulário
    document.getElementById('escalaForm').reset();
});

document.getElementById('consultaForm').addEventListener('submit', function(event) {
    event.preventDefault();

    // Obter os valores do formulário de consulta
    const consultaUsina = document.getElementById('consultaUsina').value;
    const consultaDataInicio = document.getElementById('consultaDataInicio').value;
    const consultaDataFim = document.getElementById('consultaDataFim').value;

    // Filtrar e exibir as escalas correspondentes
    consultarEscalas(consultaUsina, consultaDataInicio, consultaDataFim);
});

function salvarEscala(usina, responsavel, dataInicio, dataFim) {
    const escalas = JSON.parse(localStorage.getItem('escalas')) || [];
    escalas.push({ usina, responsavel, dataInicio, dataFim });
    localStorage.setItem('escalas', JSON.stringify(escalas));
}

function consultarEscalas(usina, dataInicio, dataFim) {
    const escalas = JSON.parse(localStorage.getItem('escalas')) || [];
    const resultadoConsulta = escalas.filter(escala => {
        return escala.usina === usina &&
               escala.dataInicio >= dataInicio &&
               escala.dataFim <= dataFim;
    });

    const consultaTableBody = document.getElementById('consultaTableBody');
    consultaTableBody.innerHTML = '';

    resultadoConsulta.forEach(escala => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${escala.usina}</td>
            <td>${escala.responsavel}</td>
            <td>${escala.dataInicio}</td>
            <td>${escala.dataFim}</td>
        `;
        consultaTableBody.appendChild(row);
    });
}
