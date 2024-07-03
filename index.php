<?php
// Inicia a sessão
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    // Se não estiver logado, redireciona para a página de login
    header('Location: login.html');
    exit;
}

// Obtém o nome do usuário da sessão
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Página Inicial</title>
</head>
</html>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Página Inicial</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .welcome-message {
            margin-bottom: 30px;
            text-align: center;
        }

        .panel {
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        .panel h3 {
            margin-bottom: 10px;
            color: #333;
            text-align: center;
        }

        .button-group {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start; /* Alinha os botões à esquerda */
            gap: 10px;
            margin-top: 10px;
        }

        .ilhas-container .panel .button-group a {
    display: inline-block;
    padding: 8px 12px; /* Ajuste o padding dos botões */
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    text-align: center;
    transition: background-color 0.3s;
    white-space: normal; /* Permite que o texto quebre linha */
    margin-bottom: 10px;
    width: calc(33.33% - 10px); /* Largura dos botões */
    box-sizing: border-box; /* Garante que o padding não aumente a largura */
    font-size: 14px; /* Tamanho da fonte */
    font-weight: bold; /* Fonte em negrito */
    font-family: Arial, sans-serif; /* Fonte Arial */
}


        .button-group a:hover {
            background-color: #0056b3;
        }

        .btn-logout {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #dc3545;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            text-align: center;
            transition: background-color 0.3s;
            display: inline-block;
        }

        .btn-logout:hover {
            background-color: #c82333;
        }

        .panels-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }

        .ilhas-container {
            flex: 1 1 65%; /* Ajuste o tamanho para ocupar 65% do espaço */
            max-width: 65%;
            display: flex;
            gap: 20px;
        }

        .panel {
            flex: 1 1 calc(50% - 10px);
            max-width: calc(50% - 10px);
        }

        .tools-panel {
            flex: 1 1 30%;
            max-width: 30%;
            margin-right: 20px;
        }

        .external-tools {
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        .external-tools h3 {
            margin-bottom: 10px;
            color: #333;
            text-align: center;
        }

        .external-tools .button-group {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            gap: 10px;
            margin-top: 10px;
        }

                .external-tools .button-group a {
            display: inline-block;
            padding: 8px 12px; /* Ajuste o padding dos botões */
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            text-align: center;
            transition: background-color 0.3s;
            white-space: normal; /* Permite que o texto quebre linha */
            margin-bottom: 10px;
            width: calc(34.70% - 12px); /* Largura dos botões */
            box-sizing: border-box; /* Garante que o padding não aumente a largura */
            font-size: 14px; /* Tamanho da fonte */
            font-weight: bold; /* Fonte em negrito */
            font-family: Arial, sans-serif; /* Fonte Arial */
        }


        .external-tools .button-group a:hover {
            background-color: #0056b3;
        }

        footer {
            margin-top: 20px;
            text-align: center;
            color: #666;
        }
    </style>
</head>
<body>
</head>
<body>
    <div class="container">
        <div class="welcome-message">
            <h2>Bem-vindo à Página De Controle do Centro de Operação Remota MCQ</h2>
            <p><strong>Usuário logado:</strong> <?php echo $username; ?></p>
     </body>
</html>
        </div>
        <div class="panels-container">
            <div class="tools-panel">
                <div class="external-tools">
                    <h3>Ferramentas Externas</h3>
                    <div class="button-group">
                    <a href="https://sintegre.ons.org.br/paginas/meu-perfil/meus-sistemas.aspx" target="_blank">01 ONS</a>
                    <a href="https://www.ccee.org.br/web/guest/precos/painel-precos" target="_blank">02 CCEE</a>
                        <a href="http://simepar.br/prognozweb/bocaiuva"target="_blank">03 Simepar</a>
                        <a href="https://stats.uptimerobot.com/2963AIKqz6"target="_blank">04 Stus de conexão</a>
                        <a href="https://www.copel.com/mhbweb/paginas/bacia-iguacu.jsf"target="_blank">06 Copel Hidrologias</a>
                        <a href="http://servidor.ambitec.eng.br:8080/sistema/index.php?class=MyMessageList&method=onReload&order=send_date&direction=asc"target="_blank">07 NaturWelt</a>
                        <a href="https://hidro.tach.com.br/relatorios.php"target="_blank">08 Hidro Tach</a>
                        <a href="https://10.20.20.110/home.sel"target="_blank">09 IHM CAC.</a>
                        <a href="https://web.skype.com/"target="_blank">12 Skype</a>
                        <a href="https://webmail-seguro.com.br/?_task=mail&_mbox=INBOX"target="_blank">10 Acesso ao Webmail</a>
                    </div>
                </div>
            </div>

            <div class="ilhas-container">
                <div class="panel">
                    <h3>Diários de Operação - ILHA 01</h3>
                    <div class="button-group">
                        <a href="https://mcqcombr-my.sharepoint.com/:x:/r/personal/operacao_mcqcombr_onmicrosoft_com/_layouts/15/Doc.aspx?sourcedoc=%7B59C43082-82E8-4883-8A9E-67D54036848A%7D&file=PDO%20-%20PCH%20Carlos%20Gonzatto%20-%2007%20-%202024.xlsx&action=default&mobileredirect=true&wdsle=0"target="_blank">01 PCH CGZ</a>
                        <a href="https://mcqcombr-my.sharepoint.com/:x:/r/personal/operacao_mcqcombr_onmicrosoft_com/_layouts/15/Doc.aspx?sourcedoc=%7B6792BFC7-772C-4A28-B70D-D3A4E02B44FF%7D&file=PDO%20-%20PCH%20Marco%20Baldo%20-%2007%20-%202024.xlsx&action=default&mobileredirect=true&wdsle=0"target="_blank">02 PCH MBO</a>
                        <a href="https://mcqcombr-my.sharepoint.com/:x:/r/personal/operacao_mcqcombr_onmicrosoft_com/_layouts/15/Doc.aspx?sourcedoc=%7B0E325D5D-14B5-4B83-8697-588139946679%7D&file=PDO%20-%20PCH%20Rondinha%20-%2007-2024.xlsx&action=default&mobileredirect=true&wdsle=0"target="_blank">03 PCH RON</a>
                        <a href="https://mcqcombr-my.sharepoint.com/:x:/r/personal/operacao_mcqcombr_onmicrosoft_com/_layouts/15/Doc.aspx?sourcedoc=%7BFC07B9F3-A402-449C-B562-12B07CCC7EB7%7D&file=PDO%20-%20PCH%20Alto%20Sucuri%C3%BA%20-%2007-2024.xlsx&action=default&mobileredirect=true&wdsle=0"target="_blank">04 PCH ASU</a>
                        <a href="https://mcqcombr-my.sharepoint.com/:x:/r/personal/operacao_mcqcombr_onmicrosoft_com/_layouts/15/Doc.aspx?sourcedoc=%7B350414A3-4094-41D2-BF5E-6A877B5B5296%7D&file=PDO%20-%20PCH%20S%C3%A3o%20Francisco%20-%2007-2024.xlsx&action=default&mobileredirect=true&wdsle=0"target="_blank">05 PCH SFR</a>
                        <a href="https://mcqcombr-my.sharepoint.com/:x:/r/personal/operacao_mcqcombr_onmicrosoft_com/_layouts/15/Doc.aspx?sourcedoc=%7B510D5BA7-9FBC-40C6-B911-B44A44EEA5B7%7D&file=PDO%20-%20UHE%20e%20CGH%20Santa%20Clara%20-%2007-2024.xlsx&action=default&mobileredirect=true&wdsle=0"target="_blank">06 UHE SCL</a>
                        <a href="https://mcqcombr-my.sharepoint.com/:x:/r/personal/operacao_mcqcombr_onmicrosoft_com/_layouts/15/Doc.aspx?sourcedoc=%7BBD525556-1405-4B5F-B883-000E8BC7B322%7D&file=PDO%20-%20PCH%20Conflu%C3%AAncia%20-%2007%20-%202024.xlsx&action=default&mobileredirect=true&wdsle=0"target="_blank">07 PCH CON</a>
                    </div>
                </div>

                <div class="panel">
                    <h3>Diários de Operação - ILHA 02</h3>
                    <div class="button-group">
                        <a href="https://mcqcombr-my.sharepoint.com/:x:/r/personal/operacao_mcqcombr_onmicrosoft_com/_layouts/15/Doc.aspx?sourcedoc=%7BA9C9511C-7A90-4B9D-8B5B-F9220CA32E13%7D&file=PDO%20-%20PCH%20Bocai%C3%BAva%20-%2007-2024.xlsx&action=default&mobileredirect=true&wdsle=0"target="_blank">08 PCH BOC</a>
                        <a href="https://mcqcombr-my.sharepoint.com/:x:/r/personal/operacao_mcqcombr_onmicrosoft_com/_layouts/15/Doc.aspx?sourcedoc=%7BB11F4912-C58D-484A-9D62-39C8F1D76F38%7D&file=PDO%20-%20PCH%20Arturo%20Andreoli%20-%2007-2024.xlsx&action=default&mobileredirect=true&wdsle=0"target="_blank">09 PCH ART</a>
                        <a href="https://mcqcombr-my.sharepoint.com/:x:/r/personal/operacao_mcqcombr_onmicrosoft_com/_layouts/15/Doc.aspx?sourcedoc=%7BA50DBB5D-06BF-4D34-959F-6D86454225F6%7D&file=PDO%20-%20PCH%20S%C3%A3o%20Bartolomeu%20-%2007-2024.xlsx&action=default&mobileredirect=true&wdsle=0"target="_blank">10 PCH SBO</a>
                        <a href="https://mcqcombr-my.sharepoint.com/:x:/r/personal/operacao_mcqcombr_onmicrosoft_com/_layouts/15/Doc.aspx?sourcedoc=%7B8C9E8381-28B2-4F5F-99CC-3F1C45E3D22B%7D&file=PDO%20-%20PCH%20Gameleira%20-%2007-2024.xlsx&action=default&mobileredirect=true&wdsle=0"target="_blank">11 PCH GAM</a>
                        <a href="https://mcqcombr-my.sharepoint.com/:x:/r/personal/operacao_mcqcombr_onmicrosoft_com/_layouts/15/Doc.aspx?sourcedoc=%7B44F6C649-C9C3-450A-8103-9F90F1FC5CB0%7D&file=PDO%20-%20PCH%20SBGER%20(Tamboril)%20-%2007-2024.xlsx&action=default&mobileredirect=true&wdsle=0"target="_blank">12 PCH TBI</a>
                        <a href="https://mcqcombr-my.sharepoint.com/:x:/r/personal/operacao_mcqcombr_onmicrosoft_com/_layouts/15/Doc.aspx?sourcedoc=%7BC6E9755D-CF13-469A-946A-81455CCC3C83%7D&file=PDO%20-%20PCH%20Boa%20Vista%20II%20-%2007%20-%202024.xlsx&action=default&mobileredirect=true&wdsle=0"target="_blank">13 PCH BVI</a>
                        <a href="https://mcqcombr-my.sharepoint.com/:x:/r/personal/operacao_mcqcombr_onmicrosoft_com/_layouts/15/Doc.aspx?sourcedoc=%7B59BD0B3C-8E9A-4622-BC00-BB332D05EF92%7D&file=PDO%20-%20CGH%20Cachoeira%20-%2007%20-%202024.xlsx&action=default&mobileredirect=true&wdsle=0"target="_blank">14 CGH CAC</a>
                        <a href="https://mcqcombr-my.sharepoint.com/:x:/r/personal/operacao_mcqcombr_onmicrosoft_com/_layouts/15/Doc.aspx?sourcedoc=%7B45A118F8-EBAC-44D7-B567-C434C8E954A6%7D&file=PDO%20-%20UHE%20e%20CGH%20Fund%C3%A3o%20-%2007-2024.xlsx&action=default&mobileredirect=true&wdsle=0"target="_blank">15 UHE FND</a>
                    </div>
                </div>
            </div>
        </div>

        <div style="text-align: center;">
            <a href="diario_operacao.php" class="btn-logout">Diário de Operação</a>
            <a href="EscalaSobreaviso.php" class="btn-logout">Escala de Sobreaviso</a>
            <a href="logout.php" class="btn-logout">Sair</a>
        </div>

        <footer>
            <p>&copy; <?php echo date('Y'); ?> SeuSite. Todos os direitos reservados.</p>
        </footer>
    </div>
</body>
</html>

