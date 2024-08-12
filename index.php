<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Ferramentas</title>
    <style>
        /* Mantém o estilo original */
        .header {
            display: flex;
            justify-content: space-between; /* Espaça as imagens nos extremos */
            align-items: center;
            padding: 0 20px; /* Adiciona algum espaçamento lateral */
        }
        .header img {
            width: 45px;
            height: 30px;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            margin: 0;
            font-size: 26px;
        }

        .user-info {
            font-size: 18px;
            font-weight: bold;
        }

        .user-info a {
            color: #fff;
            text-decoration: none;
            transition: opacity 0.3s;
        }

        .user-info a:hover {
            opacity: 0.8;
        }

        /* Estilo para o botão de logout */
        .logout-button {
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }

        .logout-button:hover {
            background-color: #0056b3;
            transform: translateY(-3px);
        }

        .logout-button:active {
            transform: translateY(0);
        }

        #painel {
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            background-color: #fff;
            border-radius: 10px;
            margin: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .menu-container {
            position: relative;
            width: 220px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .menu-container:hover {
            transform: translateY(-5px);
        }

        .menu-content {
            display: none;
            background-color: #f8f9fa;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            border-radius: 0 0 8px 8px;
            z-index: 1;
        }

        .menu-content a {
            padding: 12px 20px;
            text-decoration: none;
            display: block;
            color: #333;
            transition: background-color 0.3s;
        }

        .menu-content a:hover {
            background-color: #e9ecef;
        }

        .menu-content a.active {
            color: #fff;
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
            padding: 15px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            border: none;
            border-radius: 8px;
            outline: none;
            transition: background-color 0.3s, transform 0.3s;
        }

        .button-container .button:hover {
            background-color: #0056b3;
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
    <div class="header">
        <!-- Imagem à esquerda -->
        <img src="icons/logo-mcq.png" alt="Logo da Empresa Esquerda">
        
        <!-- Título centralizado -->
        <h1>Painel de Ferramentas</h1>
        
        <!-- Botão de logout à direita -->
        <button class="logout-button">Logout</button>
    </div>
    <header>
    
        <div class="user-info">
            <?php if (!empty($username)) : ?>
                Usuário: <strong><?php echo $username; ?></strong>
            <?php endif; ?>
        </div>
       
    </header>
    <div id="painel">
        <div id="ferramentas-internas" class="menu-container">
            <button id="btn-ferramentas-internas">Ferramentas Internas</button>
            <div class="menu-content">
                <a href="agenda_mcq.php" class="button">Agenda</a>
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/EnYHmPa5YMNFgdi2VrVovzMB_XoXLS1_aE0G2w2LWIvaCQ?e=GopbiT" class="button" target="_blank">Relatorios de Ocorrências</a>
            </div>
        </div>
     
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

 
        <script>
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
</body>
</html>
