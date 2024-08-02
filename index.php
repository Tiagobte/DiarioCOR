<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Ferramentas</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-image: url('icons/container.jpg');
            background-size: 130%;
            background-position: top;
            background-repeat: no-repeat;
            background-attachment: fixed;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        header {
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            margin: 0;
            font-size: 24px;
        }

        .user-info {
            font-size: 16px;
            font-weight: bold;
            margin-right: 20px;
        }

        .user-info a {
            color: white;
            text-decoration: none;
            transition: opacity 0.3s;
        }

        .user-info a:hover {
            opacity: 0.8;
        }

        #painel {
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            overflow-y: auto;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            margin: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

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
    </style>
</head>
<body>
    <header>
        <h1>Painel de Ferramentas</h1>
        <div class="user-info">
            <?php if (!empty($username)) : ?>
                Usuário: <strong><?php echo $username; ?></strong>
            <?php endif; ?>
        </div>
        <button class="button" onclick="window.location.href='logout.php'">Logout</button>
    </header>
    <div id="painel">
        <div id="ferramentas-internas" class="menu-container">
            <button id="btn-ferramentas-internas">Ferramentas Internas</button>
            <div class="menu-content">
                <a href="diario_operacao_ilha1.php">Diário de Operação - Ilha 01</a>
                <a href="diario_operacao_ilha2.php">Diário de Operação - Ilha 02</a>
                <a href="EscalaSobreaviso.php">Escala de Sobreaviso</a>
                <a href="agenda_mcq.php" class="button">Agenda</a>
                <a href="escala_sobreaviso.php"><button>Escala de Sobreaviso</button></a>
                <a href="configuracoes.php">Configurações</a>
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

    <div id="clientes">
        <h2>Clientes</h2>
        <div class="logos-clientes">
            <img src="icons\clientes\BrascanEnergética.jpg" alt="BrascanEnergética">
            <img src="icons\clientes\CESA-no-bg.png" alt="CER">
            <img src="icons\clientes\ELEJOR.jpg" alt="ELEJOR">
            <img src="icons\clientes\ESCOELETRIC.jpg" alt="ESCOELETRI">
            <img src="icons\clientes\ETec.jpg" alt="ETec">
            <img src="icons\clientes\grupoPetrópolis.jpg" alt="grupoPetrópolis">
            <img src="icons\clientes\JMalucelli.jpg" alt="JMalucelli">
            <img src="icons\clientes\logo-tradener-comerc-azul.jpg" alt="Tradenner">

    </div>

    <script>
        document.getElementById('btn-ferramentas-internas').addEventListener('click', function () {
            var menu = document.getElementById('ferramentas-internas').querySelector('.menu-content');
            menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
        });

        document.getElementById('btn-ferramentas-externas').addEventListener('click', function () {
            var menu = document.getElementById('ferramentas-externas').querySelector('.menu-content');
            menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
        });

        document.getElementById('btn-planilhas-ilha1').addEventListener('click', function () {
            var menu = document.getElementById('planilhas-ilha1').querySelector('.menu-content');
            menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
        });

        document.getElementById('btn-planilhas-ilha2').addEventListener('click', function () {
            var menu = document.getElementById('planilhas-ilha2').querySelector('.menu-content');
            menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
        });

        window.addEventListener('load', function () {
            const logos = document.querySelectorAll('.logos-clientes img');
            logos.forEach(logo => {
                logo.onload = () => {
                    logo.classList.add('loaded');
                };
                // Check if the image is already loaded (for cached images)
                if (logo.complete) {
                    logo.classList.add('loaded');
                }
            });
        });
    </script>
</body>
</html>
