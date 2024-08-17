<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Ferramentas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <img src="icons/logo-mcq.png" alt="Logo da Empresa Esquerda" class="logo-left">
    <h1>Centro de Operação Remota - Painel de Ferramentas</h1>
    <form action="logout.php" method="POST">
    <button type="submit" class="menu-button">Sair</button>
</form>

<aside class="sidebar">
    <!-- Conteúdo da sidebar -->
</aside>

<script>
function toggleSidebar() {
    const sidebar = document.querySelector('aside.sidebar');
    sidebar.classList.toggle('visible');
}
</script>

        </form>
    <aside class="sidebar">
       
</header>

   
    <!-- Conteúdo do painel -->
    <div id="painel">
        <div id="Ferramentas-Internas" class="menu-container">
            <button id="btn-ferramentas-internas">Ferramentas Internas</button>
            <div class="menu-content">
                <a href="agenda_mcq.php" class="button">Agenda</a>
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/EnYHmPa5YMNFgdi2VrVovzMB_XoXLS1_aE0G2w2LWIvaCQ?e=GopbiT" class="button" target="_blank">Relatorios de Ocorrências</a>
            </div>
        </div>
        <!-- Seus containers e botões aqui -->
        <div id="ferramentas-externas" class="menu-container">
            <button id="btn-ferramentas-externas">Ferramentas Externas</button>
            <div class="menu-content">
                <a href="https://sintegre.ons.org.br/paginas/meu-perfil/meus-sistemas.aspx" target="_blank">01 ONS</a>
                <a href="https://www.ccee.org.br/web/guest/precos/painel-precos" target="_blank">02 CCEE</a>
                <a href="http://www.simepar.br/prognozweb/sao_francisco/table_data_station_hourly" target="_blank">03 Simepar</a>
                <a href="https://stats.uptimerobot.com/2963AIKqz6" target="_blank">04 Status de conexão</a>
                <a href="https://www.copel.com/mhbweb/paginas/bacia-iguacu.jsf" target="_blank">06 Copel Hidrologias</a>
                <a href="http://servidor.ambitec.eng.br:8080/sistema/index.php?class=MyMessageList" target="_blank">07 NaturWelt</a>
                <a href="https://hidro.tach.com.br/index.php" target="_blank">08 Hidro Tach</a>
                <a href="https://10.20.20.110/" target="_blank">09 IHM CAC</a>
                <a href="https://web.skype.com/" target="_blank">12 Skype</a>
                <a href="https://webmail-seguro.com.br/" target="_blank">10 Acesso ao Webmail</a>
            </div>
        </div>
        <div id="ferramentas-externas" class="menu-container">
            <button id="btn-ferramentas-externas">Previsão de Chuvas</button>
            <div class="menu-content">
                <a href="http://www.simepar.br/prognozweb/alto_sucuriu/forecast_by_counties/5002951" target="_blank">Previsão do tempo - ASU / Chapadão do Sul - MS.</a>
                <a href="http://www.simepar.br/prognozweb/bocaiuva/forecast_by_counties/5101902" target="_blank">Previsão do tempo - BOC / Branorte - MT.</a>
                <a href="http://www.simepar.br/prognozweb/sao_francisco/forecast_by_counties/4127700" target="_blank">Previsão do tempo / SFR - Toledo- PR.</a>
                <a href="http://www.simepar.br/prognozweb/fozchopim/forecast_by_counties/4106571" target="_blank">Previsão do tempo - ART / Cruzeiro do Iguaçu - PR</a>
                <a href="https://www.climatempo.com.br/previsao-do-tempo/cidade/4332/turvo-pr" target="_blank">Previsão do tempo - BVI & CAC - Turvo - PR</a>
                <a href="https://www.climatempo.com.br/previsao-do-tempo/cidade/1329/prudentopolis-pr" target="_blank">Previsão do tempo - CON / Prudentópolis - PR</a>
                <a href="https://www.climatempo.com.br/previsao-do-tempo/cidade/2947/camponovo-rs" target="_blank">Previsão do tempo - CGZ / Campo Novo - RS</a>
                <a href="https://www.climatempo.com.br/previsao-do-tempo/cidade/2942/braga-rs" target="_blank">Previsão do tempo - MBO / Braga - RS</a>
                <a href="https://www.climatempo.com.br/previsao-do-tempo/cidade/2942/braga-rs" target="_blank">Previsão do tempo - RON / Passos Maia - SC</a>
                <a href="https://www.climatempo.com.br/previsao-do-tempo/cidade/2942/braga-rs" target="_blank">Previsão do tempo - SBO / Luziânia - GO</a>
                <a href="https://www.climatempo.com.br/previsao-do-tempo/cidade/2942/braga-rs" target="_blank">Previsão do tempo - TBI / Cristalina - GO</a>
                <a href="https://www.climatempo.com.br/previsao-do-tempo/cidade/2942/braga-rs" target="_blank">Previsão do tempo - GAM / Cristalina - GO</a>
            </div>
        </div>


        <div id="planilhas-ilha1" class="menu-container">
            <button id="btn-planilhas-ilha1">Planilhas Diárias de Operação - Ilha 01</button>
            <div class="menu-content">
                <a href="https://mcqcombr-my.sharepoint.com/personal/operacao_mcqcombr_onmicrosoft_com/_layouts/15/onedrive.aspx?view=0&id=%2Fpersonal%2Foperacao%5Fmcqcombr%5Fonmicrosoft%5Fcom%2FDocuments%2F01%20%2D%20Opera%C3%A7%C3%A3o%2FUsinas%20CESBE%2FPCH%20Carlos%20Gonzatto%2F02%20%2D%20P%C3%B3s%20Opera%C3%A7%C3%A3o%2F01%20%2D%20Planilhas%20Di%C3%A1rias%20de%20Opera%C3%A7%C3%A3o%2F2024" target="_blank">01 PCH Carlos Gonzatto</a>
                <a href="https://mcqcombr-my.sharepoint.com/personal/operacao_mcqcombr_onmicrosoft_com/_layouts/15/onedrive.aspx?view=0&id=%2Fpersonal%2Foperacao%5Fmcqcombr%5Fonmicrosoft%5Fcom%2FDocuments%2F01%20%2D%20Opera%C3%A7%C3%A3o%2FUsinas%20CESBE%2FPCH%20Marco%20Baldo%2F02%20%2D%20P%C3%B3s%20Opera%C3%A7%C3%A3o%2F01%20%2D%20Planilhas%20Di%C3%A1rias%20de%20Opera%C3%A7%C3%A3o%2F2024" target="_blank">02 PCH Marco Baldo</a>
                <a href="https://mcqcombr-my.sharepoint.com/personal/operacao_mcqcombr_onmicrosoft_com/_layouts/15/onedrive.aspx?view=0&id=%2Fpersonal%2Foperacao%5Fmcqcombr%5Fonmicrosoft%5Fcom%2FDocuments%2F01%20%2D%20Opera%C3%A7%C3%A3o%2FUsinas%20Tradener%2FPCH%20Rondinha%2F02%20%2D%20P%C3%B3s%20Opera%C3%A7%C3%A3o%2F01%20%2D%20Planilhas%20Di%C3%A1rias%20de%20Opera%C3%A7%C3%A3o%2F2024" target="_blank">03 PCH Rondinha</a>
                <a href="https://mcqcombr-my.sharepoint.com/personal/operacao_mcqcombr_onmicrosoft_com/_layouts/15/onedrive.aspx?view=0&id=%2Fpersonal%2Foperacao%5Fmcqcombr%5Fonmicrosoft%5Fcom%2FDocuments%2F01%20%2D%20Opera%C3%A7%C3%A3o%2FUsinas%20SILEA%2FPCH%20Alto%20Sucuri%C3%BA%2F02%20%2D%20P%C3%B3s%20Opera%C3%A7%C3%A3o%2F01%20%2D%20Planilhas%20Di%C3%A1rias%20de%20Opera%C3%A7%C3%A3o%2F2024" target="_blank">04 PCH Alto Sucuriú</a>
                <a href="https://mcqcombr-my.sharepoint.com/personal/operacao_mcqcombr_onmicrosoft_com/_layouts/15/onedrive.aspx?view=0&id=%2Fpersonal%2Foperacao%5Fmcqcombr%5Fonmicrosoft%5Fcom%2FDocuments%2F01%20%2D%20Opera%C3%A7%C3%A3o%2FUsinas%20SILEA%2FPCH%20S%C3%A3o%20Francisco%2F02%20%2D%20P%C3%B3s%20Opera%C3%A7%C3%A3o%2F01%20%2D%20Planilhas%20Di%C3%A1rias%20de%20Opera%C3%A7%C3%A3o%2F2024" target="_blank">05 PCH São Francisco</a>
                <a href="https://mcqcombr-my.sharepoint.com/personal/operacao_mcqcombr_onmicrosoft_com/_layouts/15/onedrive.aspx?view=0&id=%2Fpersonal%2Foperacao%5Fmcqcombr%5Fonmicrosoft%5Fcom%2FDocuments%2F01%20%2D%20Opera%C3%A7%C3%A3o%2FUsinas%20CER%2FPCH%20Conflu%C3%AAncia%2F02%20%2D%20P%C3%B3s%20Opera%C3%A7%C3%A3o%2F01%20%2D%20Planilha%20Di%C3%A1ria%20de%20Opera%C3%A7%C3%A3o%2F2024" target="_blank">06 PCH Confluência</a>
                <a href="https://mcqcombr-my.sharepoint.com/personal/operacao_mcqcombr_onmicrosoft_com/_layouts/15/onedrive.aspx?view=0&id=%2Fpersonal%2Foperacao%5Fmcqcombr%5Fonmicrosoft%5Fcom%2FDocuments%2F01%20%2D%20Opera%C3%A7%C3%A3o%2FUsinas%20Elejor%2FUHE%20e%20CGH%20Santa%20Clara%2F02%20%2D%20P%C3%B3s%20Opera%C3%A7%C3%A3o%2F01%20%2D%20Planilhas%20Di%C3%A1rias%20de%20Opera%C3%A7%C3%A3o%2F2024" target="_blank">07 UHE Santa Clara</a>
            </div>
        </div>
        <div id="planilhas-ilha2" class="menu-container">
            <button id="btn-planilhas-ilha2">Planilhas Diárias de Operação - Ilha 02</button>
            <div class="menu-content">
                <a href="https://mcqcombr-my.sharepoint.com/personal/operacao_mcqcombr_onmicrosoft_com/_layouts/15/onedrive.aspx?view=0&id=%2Fpersonal%2Foperacao%5Fmcqcombr%5Fonmicrosoft%5Fcom%2FDocuments%2F01%20%2D%20Opera%C3%A7%C3%A3o%2FUsinas%20Elejor%2FUHE%20e%20CGH%20Fund%C3%A3o%2F02%20%2D%20P%C3%B3s%20Opera%C3%A7%C3%A3o%2F01%20%2D%20Planilhas%20Di%C3%A1rias%20de%20Opera%C3%A7%C3%A3o%2F2024" target="_blank">08 UHE Fundão</a>
                <a href="https://mcqcombr-my.sharepoint.com/personal/operacao_mcqcombr_onmicrosoft_com/_layouts/15/onedrive.aspx?view=0&id=%2Fpersonal%2Foperacao%5Fmcqcombr%5Fonmicrosoft%5Fcom%2FDocuments%2F01%20%2D%20Opera%C3%A7%C3%A3o%2FUsinas%20SILEA%2FPCH%20Bocai%C3%BAva%2F02%20%2D%20P%C3%B3s%20Opera%C3%A7%C3%A3o%2F01%20%2D%20Planilhas%20Di%C3%A1rias%20de%20Opera%C3%A7%C3%A3o%2F2024" target="_blank">09 PCH Bocaiuva</a>
                <a href="https://mcqcombr-my.sharepoint.com/personal/operacao_mcqcombr_onmicrosoft_com/_layouts/15/onedrive.aspx?view=0&id=%2Fpersonal%2Foperacao%5Fmcqcombr%5Fonmicrosoft%5Fcom%2FDocuments%2F01%20%2D%20Opera%C3%A7%C3%A3o%2FUsinas%20SILEA%2FPCH%20Arturo%20Andreoli%2F02%20%2D%20P%C3%B3s%20Opera%C3%A7%C3%A3o%2F01%20%2D%20Planilhas%20Di%C3%A1rias%20de%20Opera%C3%A7%C3%A3o%2F2024" target="_blank">10 PCH Arturo Andreoli</a>
                <a href="https://mcqcombr-my.sharepoint.com/personal/operacao_mcqcombr_onmicrosoft_com/_layouts/15/onedrive.aspx?view=0&id=%2Fpersonal%2Foperacao%5Fmcqcombr%5Fonmicrosoft%5Fcom%2FDocuments%2F01%20%2D%20Opera%C3%A7%C3%A3o%2FUsinas%20IBEMAPAR%2FPCH%20Boa%20Vista%20II%2F02%20%2D%20P%C3%B3s%20Opera%C3%A7%C3%A3o%2F01%20%2D%20Planilhas%20Di%C3%A1rias%20de%20Opera%C3%A7%C3%A3o%2F2024" target="_blank">11 PCH Boa Vista</a>
                <a href="https://mcqcombr-my.sharepoint.com/personal/operacao_mcqcombr_onmicrosoft_com/_layouts/15/onedrive.aspx?view=0&id=%2Fpersonal%2Foperacao%5Fmcqcombr%5Fonmicrosoft%5Fcom%2FDocuments%2F01%20%2D%20Opera%C3%A7%C3%A3o%2FUsinas%20IBEMAPAR%2FCGH%20Cachoeira%2F02%20%2D%20P%C3%B3s%20Opera%C3%A7%C3%A3o%2F01%20%2D%20Planilhas%20Di%C3%A1rias%20de%20Opera%C3%A7%C3%A3o%2F2024" target="_blank">12 CGH Cachoeira</a>
                <a href="https://mcqcombr-my.sharepoint.com/personal/operacao_mcqcombr_onmicrosoft_com/_layouts/15/onedrive.aspx?view=0&id=%2Fpersonal%2Foperacao%5Fmcqcombr%5Fonmicrosoft%5Fcom%2FDocuments%2F01%20%2D%20Opera%C3%A7%C3%A3o%2FUsinas%20Tradener%2FPCH%20S%C3%A3o%20Bartolomeu%2F02%20%2D%20P%C3%B3s%20Opera%C3%A7%C3%A3o%2F01%20%2D%20Planilhas%20Di%C3%A1rias%20de%20Opera%C3%A7%C3%A3o%2F2024" target="_blank">13 PCH São Bartolomeu</a>
                <a href="https://mcqcombr-my.sharepoint.com/my?id=%2Fpersonal%2Foperacao%5Fmcqcombr%5Fonmicrosoft%5Fcom%2FDocuments%2F01%20%2D%20Opera%C3%A7%C3%A3o%2FUsinas%20Tradener%2FPCH%20Gameleira%2F02%20%2D%20P%C3%B3s%20Opera%C3%A7%C3%A3o%2F01%20%2D%20Planilhas%20Di%C3%A1rias%20de%20Opera%C3%A7%C3%A3o%2F2024" target="_blank">14 PCH Gameleira</a>
                <a href="https://mcqcombr-my.sharepoint.com/:x:/r/personal/operacao_mcqcombr_onmicrosoft_com/_layouts/15/Doc.aspx?sourcedoc=%7B44F6C649-C9C3-450A-8103-9F90F1FC5CB0%7D&file=PDO%20-%20PCH%20SBGER%20(Tamboril)%20-%2007-2024.xlsx&action=default&mobileredirect=true&wdsle=0" target="_blank">15 PCH Tamboril</a>

            </div>
        </div>
    </div>
    </div>
   
</body>
</html>

    <style>

body {
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('icons/container.jpg');
    background-repeat: no-repeat; /* Evita repetição da imagem */
    background-size: auto; /* Mantém o tamanho original da imagem */
    background-position: center; /* Centraliza a imagem */
    margin: 0; /* Remove margens padrão */
    height: 100vh; /* Garante que o body tenha a altura total da tela */
}


/* CSS para o menu lateral que aparece ao passar o mouse */

body {
    margin: 0;
    font-family: Arial, sans-serif;
    overflow-x: hidden; /* Evita rolagem horizontal quando o menu estiver visível */
}

aside.sidebar {
    position: fixed;
    top: 0;
    left: -250px; /* Inicialmente escondido à esquerda */
    width: 250px;
    height: 100vh;
    background: rgba(0, 0, 0, 0.7); /* Fundo transparente */
    color: white;
    padding: 20px;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.3);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: left 0.3s ease; /* Suave transição para abrir e fechar o menu */
    backdrop-filter: blur(10px); /* Adiciona efeito de desfoque ao fundo */
}

aside.sidebar:hover {
    left: 0; /* Mostra o menu quando o ponteiro do mouse está sobre ele */
}

aside .logout-button {
    width: 100%;
    padding: 15px;
    font-size: 16px;
    font-weight: bold;
    background-color: #007bff; /* Cor azul */
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    outline: none;
    transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Adiciona sombra ao botão */
}

aside .logout-button:hover {
    background-color: #0056b3; /* Cor azul escuro ao passar o mouse */
    transform: translateY(-3px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3); /* Intensifica a sombra ao passar o mouse */
}

aside .menu {
    margin-top: 20px;
}

aside .menu a {
    display: block;
    color: white;
    text-decoration: none;
    padding: 10px 15px;
    border-radius: 8px;
    transition: background-color 0.3s;
}

aside .menu a:hover {
    background-color: #444;
}

main {
    margin-left: 250px; /* Espaço suficiente para o menu lateral */
    padding: 20px;
}


/* Estilo do cabeçalho */
header {
    display: flex;
    align-items: center;
    justify-content: center; /* Centraliza o título horizontalmente */
    background-color: rgba(0, 0, 0, 0.7);
    color: white;
    padding: 10px 20px;
    position: relative;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    margin-bottom: 20px;
}

header .logo-left {
    position: fixed; /* Fixar a posição na tela */
    bottom: 20px; /* Alinha a imagem a 20px do fundo da tela */
    left: 20px; /* Alinha a imagem a 20px do lado esquerdo da tela */
    width: 120px; /* Ajuste o tamanho conforme necessário */
    height: auto; /* Mantém a proporção da imagem */
    z-index: 1; /* Garante que a imagem não sobreponha outros elementos */
}


header .logo-right

header .logo-left {
    left: 50px;
}

header .logo-right {
    right: 20px;
}

header h1 {
    flex-grow: 1;
    margin: 0;
    font-size: 24px;
    text-align: center;
    z-index: 2; /* Garante que o título fique acima das imagens */
}

.logout-button {
    padding: 10px 20px;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    background-color: #f44336;
    color: white;
    border: none;
    border-radius: 8px;
    outline: none;
    transition: background-color 0.3s, transform 0.3s;
    position: absolute;
    top: 10px;
    right: 120px; /* Posiciona o botão a uma distância da borda direita */
    z-index: 2; /* Garante que o botão fique acima das imagens */
}

.logout-button:hover {
    background-color: #d32f2f;
    transform: translateY(-3px);
}

/* Estilo do painel principal */
#painel {
    padding: 20px;
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    overflow-y: auto;
    background-color: rgba(255, 255, 255, 0.9);
    border-radius: 10px;
    margin: 0 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Estilo dos containers de menu e outros elementos */
.menu-container {
    position: relative;
    width: 220px;
    border: 1px solid #ccc;
    border-radius: 8px;
    overflow: hidden;
    background-color: white;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s;
}

.menu-container:hover {
    transform: translateY(-5px);
}

.menu-container button {
    width: 100%;
    padding: 15px 10px;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    background-color: #4CAF50;
    color: white;
    border: none;
    outline: none;
    transition: background-color 0.3s;
}

.menu-container button:hover {
    background-color: #45a049;
}

.menu-content {
    display: none;
    background-color: #f9f9f9;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    z-index: 1;
}

.menu-content a {
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    color: #333;
    transition: background-color 0.3s;
}

.menu-content a:hover {
    background-color: #ddd;
}

.menu-content a.active {
    background-color: #4CAF50;
    color: white;
}

.button-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
    margin-top: 20px;
}

.button-container .button {
    width: 220px;
    padding: 15px 10px;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 8px;
    outline: none;
    transition: background-color 0.3s, transform 0.3s;
}

.button-container .button:hover {
    background-color: #45a049;
    transform: translateY(-5px);
}

#clientes {
    position: absolute;
    bottom: 20px;
    left: 20px;
    text-align: left;
    width: auto;
}

#clientes h2 {
    font-size: 20px;
    margin-bottom: 10px;
    color: white;
}

.logos-clientes {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.logos-clientes img {
    width: 70px;
    height: auto;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: opacity 0.3s ease-out;
    opacity: 0;
}

.loaded {
    opacity: 1 !important;
}

/* Responsividade */
@media (max-width: 768px) {
    #painel {
        flex-direction: column;
        align-items: center;
    }

    .menu-container {
        width: 100%;
    }

    .button-container .button {
        width: 100%;
    }
}

@media (max-width: 480px) {
    header {
        flex-direction: column;
        align-items: center;
    }

    .logo-left, .logo-right {
        position: relative;
        width: 60px; /* Ajuste conforme necessário */
    }

    header h1 {
        font-size: 20px;
    }

    .logout-button {
        font-size: 14px;
        padding: 8px 16px;
        right: 20px; /* Ajuste para ficar dentro da tela em dispositivos menores */
    }
}

    </style>
        <script>
    document.addEventListener('DOMContentLoaded', () => {
                const buttons = document.querySelectorAll('.button-container .button');
                buttons.forEach(button => {
                    button.addEventListener('click', () => {
                        const menuContent = button.nextElementSibling;
                        menuContent.style.display = menuContent.style.display === 'block' ? 'none' : 'block';
                    });
                });
            });
    
                // Script para abrir e fechar os menus
            document.querySelectorAll('.menu-container button').forEach(button => {
                button.addEventListener('click', function() {
                    this.parentElement.classList.toggle('open');
                });
            });
            
            document.querySelectorAll('.menu-container button').forEach(button => {
                button.addEventListener('click', () => {
                    const menuContent = button.nextElementSibling;
                    if (menuContent.style.display === 'block') {
                        menuContent.style.display = 'none';
                    } else {
                        menuContent.style.display = 'block';
                    }
                });
            });

            document.addEventListener('DOMContentLoaded', () => {
                const images = document.querySelectorAll('.logos-clientes img');
                images.forEach(img => {
                    img.onload = () => img.classList.add('loaded');
                });
            });
            
    </script>
       
