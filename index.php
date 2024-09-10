<?php

ini_set('session.save_path', '/home/storage/0/2a/3a/mcq2/public_html/sessions');
session_start();


// Verificação de autenticação do usuário
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Se não estiver autenticado, redireciona para a página de login
    header('Location: login.php');
    exit();
}

// Mensagem de depuração (remova ou comente após a validação)
// echo '<!-- Sessão está ativa. -->';

// Verifica se o usuário é um administrador (master)
$is_master = isset($_SESSION['is_master']) && $_SESSION['is_master'] == 1;
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css\style.css">

    <title>Painel de Ferramentas</title>
 
</head>
<body>
<header>
    <img src="icons/logo-mcq.png" alt="Logo da Empresa Esquerda" class="logo-left">
    <h1>Centro de Operação Remota - Painel de Ferramentas</h1>

    <?php if ($is_master): ?>
        <a href="admin_panel.php" class="button">Aprovar Usuários</a>
    <?php endif; ?>

    <a href="logout.php" class="button">Sair</a>
    <a href="index.html" class="button">Página MCQ</a>
</header>
    <div class="menu-container">
        <button class="menu-button" onclick="togglePanel('painel-ilha-01')">Ferramentas Ilha 01</button>
        <button class="menu-button" onclick="togglePanel('painel-ilha-02')">Ferramentas Ilha 02</button>
        <button class="menu-button" onclick="togglePanel('ferramentas')">Ferramentas</button>
        <button class="menu-button" onclick="togglePanel('previsao')">Previsão do Tempo</button>


        </div>

    <!-- Painel Ilha 01 -->
    <div id="painel-ilha-01" class="painel-container">
        <div class="menu-buttons">
            <button class="menu-button" onclick="toggleContent('planilhas-ilha1')">PDO - Ilha 1</button>
            <button class="menu-button" onclick="toggleContent('Relatorios-ocorrencias1')">Relatórios Ocorrências</button>
            <button class="menu-button" onclick="toggleContent('Escalas-de-Sobreaviso1')">Escala de Sobreaviso</button>
        </div>
        <div id="planilhas-ilha1" class="menu-content">
            <div class="file-links">
            <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/EqKIFodSIXNBu8kIMWGU2RoBHgRELa9CApFZlORfcagAgA?e=gsWBV2" class="button" target="_blank">01 PCH Carlos Gonzatto</a>
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/EqVPTJ3dBPlDmR7l5dZLFbMB-9V0rN5Tu_8L-1fMrUPFMg?e=ZGfP0R" class="button" target="_blank">02 PCH Marco Baldo</a>
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/EqVPTJ3dBPlDmR7l5dZLFbMB-9V0rN5Tu_8L-1fMrUPFMg?e=ZGfP0R" class="button" target="_blank">02 PCH Marco Baldo</a>
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/Etdh8WWUXhJBnHDuva7SNB8BfJ_yj_L5-oH8uQRVsR1gfw?e=bW4wAS" class="button" target="_blank">03 PCH Rondinha</a>
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/Er1QVPZl6u9Hl8bCP5i02ccBNLfWvBf4nW3_DZpuff0OmA?e=hY9LK1" class="button" target="_blank">04 PCH Alto Sucuriú</a>
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/Eke5TWYa0CJHlvimGvyxqWMBVlZ3rrcwQvn35fLlFOZZYA?e=bnjRrJ" class="button" target="_blank">05 PCH São Francisco</a>
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/EvtfbCIPo3hKlg_JXgHaSEUBy6S9X7NUHVPPqHeP_Fmq6Q?e=RcTjpj" class="button" target="_blank">06 PCH Confluência</a>
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/Em3OQkJote5ItFjoh9XKq3oBemIUE2kmZoxEDJe6vpCrJg?e=FhfCf5" class="button" target="_blank">07 UHE Santa Clara</a>
            
            </div>
        </div>
        <div id="Relatorios-ocorrencias1" class="menu-content">
            <div class="file-links">
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/EQBBXfvsHZRGrsTJc-I_0TwBP0KDLyJitfULlgMqTvxKtA?e=4tL93H" class="button" target="_blank">Alto Sucuriú</a>
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/ERU6KctWCj9KhhqGn7_2DfwB9LfBdcKQdbB0W6TpwBUNdg?e=apnLB7" class="button" target="_blank">São Francisco</a>
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/EVoc3jTmV25GgPG6oWduYGEBCYMs1c5eQOOTsTTuf6fyMw?e=2b3tJ0" class="button" target="_blank">Confluência</a>
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/EZhJeRhQjp9Il1aCuLt-sBcBDLNFViKxwYFavrdLIlcRAg?e=I7dWJk" class="button" target="_blank">Carlos Gonzatto</a>
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/ETR0CRe9nUtFjbxKvGdW7t8BLi4SanuKxWq2NJNDpXfjYg?e=8X2Mab" class="button" target="_blank">Marco Baldo</a>
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/EXYuJNZq2fVKktzlQ-8gCkYBkphDe8cQCVJDHgDYG2i_GQ?e=RFzGm0" class="button" target="_blank">Rondinha</a>
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/ET81e22X-fVPneEVcWAgQWgBBfwCfk7An3_1gDz_PtgHoA?e=TAGQM8" class="button" target="_blank">UHE Santa Clara</a>
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/EbO3_cNOV5hHpHRnwj1rOnMBP1FXzv3pfatTcND1fBq3ag?e=Hv2nzi" class="button" target="_blank">CGH Santa Clara</a>
       
            
            </div>
        </div>
        <div id="Escalas-de-Sobreaviso1" class="menu-content">
            <div class="file-links">
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/EgV33rjaNrdJudlqwyz6WIgBjn6LvrWhDl9WR0t3KoKpCQ?e=9EniCN" class="button" target="_blank">PCH Carlos Gonzatto e Marco Baldo</a>
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/EsXEzmL-3YBBtmLg20kdj6UBBnCvFr8dQWJ4uELQ_rinbw?e=bxE7AD" class="button" target="_blank">ELEJOR</a>
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/ElSpt5ED_U5LnVToaErfxbQBqXalM8kk6gCe8LeIP_Y3qQ?e=VeWUOE" class="button" target="_blank">PCH Alto Sucuriú</a>
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/ErK1ZvrTD11HjmNxy1AWs98Bov5fiMXBOxhI53fSSpgvSQ?e=ppR7vD" class="button" target="_blank">PCH São Francisco</a>
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/Et60KR9DCalNvS4RorN5zK8BR42Z7w3OCMQ9af_bAqloag?e=HPKZvv" class="button" target="_blank">PCH Confluência</a>
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/EhCXSTavXWZBiy_4hvuICXkBprPeMpO9dt4JnN_XX6jVBA?e=QecvQm" class="button" target="_blank">PCH Rondinha</a>          
                </a>
            </div>
        </div>
    </div>

    <!-- Painel Ilha 02 -->
    <div id="painel-ilha-02" class="painel-container">
        <div class="menu-buttons">
            <button class="menu-button" onclick="toggleContent('planilhas-ilha2')">PDO - Ilha 2</button>
            <button class="menu-button" onclick="toggleContent('Relatorios-ocorrencias2')">Relatórios Ocorrências</button>
            <button class="menu-button" onclick="toggleContent('Escalas-de-Sobreaviso2')">Escala de Sobreaviso</button>
        </div>
        <div id="planilhas-ilha2" class="menu-content">
            <div class="file-links">
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/Ek-GY-ZVpwNNn0gjqI7HL2YBXIPkmkXbw5F-7BhI_MMljQ?e=wlheAi" class="button" target="_blank">08 UHE Fundão</a>
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/EpHn5BJMy6NPsqqWLIP_LSgBRV2fvFXvx4w6MxwTScrbXA?e=cqZC1c" class="button" target="_blank">09 PCH Bocaiuva</a>
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/EiG6fVkkysRClVF-6A6FFYQBTjgRDV9vgex4rifjD-Hk8Q?e=2WUe9t" class="button" target="_blank">10 PCH Arturo Andreoli</a>
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/EsRynMde_CVCkhO4uRY2h3kB-KVm1sQ73zTA8GrzXiJb_Q?e=tm29ZH" class="button" target="_blank">11 PCH Boa Vista</a>
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/Ere3haUuS_1FmhS_VoBn6tsBMPtbkWYB-qbjGHls2MszcQ?e=LwpqAS" class="button" target="_blank">12 CGH Cachoeira</a>
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/Eoc_yBJvN6tAtBFhRwoJChIBSYBW2RYxPE5c1rRN3EK1Dg?e=ZQY6ec" class="button" target="_blank">13 PCH São Bartolomeu</a>
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/Ele7aKn6Be5OlyZgxsFJEUMBt6e78K5yMYh_f2oT-QCn9Q?e=wsL46x" class="button" target="_blank">14 PCH Gameleira</a>
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/EvUH-_mKGX9Ns_fMLYjHgHABXbuR8FFRPF38Cec855mwCQ?e=QEZick" class="button" target="_blank">15 PCH Tamboril</a>
           
            </div>
        </div>
        <div id="Relatorios-ocorrencias2" class="menu-content">
            <div class="file-links">
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/Ebs8AA3vvipJjhue7PA26pEBKQfEzmbfpD8GbZ5xSRMUzg?e=ZQqbwb" class="button" target="_blank">Bocaiuva</a>
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/EWBNIUFyBi5Co5QwUPJEmQcB8qtLIxu5xW_0a3YffjCNvg?e=faSci3" class="button" target="_blank">Arturo Andreoli</a>
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/Ec934-16haJBh_xPIHb4MtoBbHIs6d_YboThBIlNznjPlA?e=wCtssn" class="button" target="_blank">Boa Vista</a>
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/EaPbJOGpOn1OlqARh0o3oxgBy72ia0uwvz58ziqBNUFEwQ?e=sK7EcC" class="button" target="_blank">CGH Cachoeira</a>
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/EcY9kc9VzwNFhoq_R2Ga1RIBQL8uOIerBXNAmm4s35gcag?e=d6E4Gd" class="button" target="_blank">Tamboril</a>
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/Ef21SbdL4ORIp2pGyiacAqYBk4mk3PTnAGkJoFBDPl0M0Q?e=WPRa8F" class="button" target="_blank">Gameleira</a>
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/EdQX2oDQOvFPka0ppmq8o5ABcag8d8bstF4WJ3wc3lzw_A?e=mViY8v" class="button" target="_blank">São Bartolomeu</a>
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/EXB6z9_mVTBOqSY3CToqzE4Bb0HmlY4S7JUOtAZZFdTgXg?e=05cPmX" class="button" target="_blank">UHE Fundão</a>
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/EZtq-JtzgVtElCYMFutJAuYBlya7m3_AL9aKm_2KzgyRVw?e=xy6Jh0" class="button" target="_blank">CGH Fundão</a>
        
            </div>
        </div>
        <div id="Escalas-de-Sobreaviso2" class="menu-content">
            <div class="file-links">
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/EsXEzmL-3YBBtmLg20kdj6UBBnCvFr8dQWJ4uELQ_rinbw?e=AKJpik" class="button" target="_blank">ELEJOR</a>
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/EoBDK8kbrW9LjVpkeNTMrUkB4Bt4YeSnaJVMwaPwqq6Q3A?e=3D08dW" class="button" target="_blank">PCH Arturo Andreli</a>
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/ElNJGWx6bQBMrtemkzqq128Bk3Nl6D3_gv4fkPzYKS-prg?e=kvp0Nn" class="button" target="_blank">PCH Bocaiuva</a>
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/ErQTgEf1T3pFk2QnhdkE-uUB-d3ths4oLjcfGZWn5uB-nw?e=PiU39e" class="button" target="_blank">PCH Boa Vista e CGH Cachoeira</a>
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/EpnpB9A8EYVNmlfJPY1RJEABh4V9wcmc3JOI6IVJwhP8jw?e=wZl9eu" class="button" target="_blank">PCH São Bartolomeu</a>
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/Ehuj0OL-V7FCv0AnH06XR2YBe8vtCH81n9DIjlO1KyoMPA?e=qS1ZGr" class="button" target="_blank">PCH Gameleira</a>
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/EtjZBK90jYRIi4O88tcfyy8BWGGoUX_ZpabjrOcIDKwpVA?e=5g9zBL" class="button" target="_blank">PCH Tamboril</a>       
       
            </div>
        </div>
    </div>

    <!-- Painel Ferramentas  -->
    <div id="ferramentas" class="painel-container">
    <div class="menu-buttons">
            <button class="menu-button" onclick="toggleContent('ferramentas-externas')">Ferramentas Externas</button>
            <button class="menu-button" onclick="toggleContent('ferramentas-internas')">Ferramentas Internas</button>
        </div>
        <div id="ferramentas-externas" class="menu-content">
            <div class="file-links">
                <a href="https://sintegre.ons.org.br/paginas/meu-perfil/meus-sistemas.aspx" class="button" target="_blank">01 ONS</a>
                <a href="https://www.ccee.org.br/web/guest/precos/painel-precos" class="button" target="_blank">02 CCEE</a>
                <a href="http://www.simepar.br/prognozweb/sao_francisco/table_data_station_hourly" class="button" target="_blank">03 Simepar</a>
                <a href="https://stats.uptimerobot.com/2963AIKqz6" class="button" target="_blank">04 Status de conexão</a>
                <a href="https://www.copel.com/mhbweb/paginas/bacia-iguacu.jsf" class="button" target="_blank">05 Copel Hidrologias</a>
                <a href="http://servidor.ambitec.eng.br:8080/sistema/index.php?class=MyMessageList" class="button" target="_blank">06 NaturWelt</a>
                <a href="https://hidro.tach.com.br/index.php" class="button" target="_blank">07 Hidro Tach</a>
                <a href="https://10.20.20.110/" class="button" target="_blank">08 IHM CAC</a>
                <a href="https://web.skype.com/" class="button" target="_blank">09 Skype</a>
                <a href="https://webmail-seguro.com.br/" class="button" target="_blank">10 Acesso ao Webmail</a>
                </a>
            </div>
        </div>
        <div id="ferramentas-internas" class="menu-content">
            <div class="file-links">
                 
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/Eh4gSjJjmklJlo3dzvg9x9kBGB99hKivisxhgjeaMPZDgQ?e=nwHgZc" class="button" target="_blank">Diario de Operação</a>
                <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/EQrobaWYzulNjIA9lAehWpIBK_SsufElXWoC9W3bqsf7Eg?e=HahAeB" class="button" target="_blank">Contatos</a>
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/EoN4cbLBq1BCpWYt7e-ftEwBdbuMf__VB8x4Nj3uI9StKA?e=dZgfid" class="button" target="_blank">Escala operadores - COR</a>

            </div>
        </div>
    </div>

<!-- Painel previsão do tempo  -->
<div id="previsao" class="painel-container">
    <div class="menu-buttons">
        <button class="menu-button" onclick="toggleContent('previsao-content1')">Previsão do Tempo Ilha 1</button>
        <button class="menu-button" onclick="toggleContent('previsao-content2')">Previsão do Tempo Ilha 2</button>

    </div>
    <div id="previsao-content1" class="menu-content">
        <div class="file-links">
            <a href="http://www.simepar.br/prognozweb/alto_sucuriu/forecast_by_counties/5002951" class="button" target="_blank">ASU / Chapadão do Sul - MS</a>
            <a href="http://www.simepar.br/prognozweb/sao_francisco/forecast_by_counties/4127700" class="button" target="_blank">SFR / Toledo - PR</a>
            <a href="https://www.climatempo.com.br/previsao-do-tempo/cidade/1329/prudentopolis-pr" class="button" target="_blank">CON / Prudentópolis - PR</a>
            <a href="https://www.climatempo.com.br/previsao-do-tempo/cidade/2947/camponovo-rs" class="button" target="_blank">CGZ / Campo Novo - RS</a>
            <a href="https://www.climatempo.com.br/previsao-do-tempo/cidade/2942/braga-rs" class="button" target="_blank">MBO / Braga - RS</a>
            <a href="https://www.climatempo.com.br/previsao-do-tempo/cidade/2942/braga-rs" class="button" target="_blank">RON / Passos Maia - SC</a>
        </div>
    </div>
</div>
<div id="previsao-content2" class="menu-content">
        <div class="file-links">
            <a href="http://www.simepar.br/prognozweb/bocaiuva/forecast_by_counties/5101902" class="button" target="_blank">BOC / Branorte - MT</a>
            <a href="http://www.simepar.br/prognozweb/fozchopim/forecast_by_counties/4106571" class="button" target="_blank">ART / Cruzeiro do Iguaçu - PR</a>
            <a href="https://www.climatempo.com.br/previsao-do-tempo/cidade/4332/turvo-pr" class="button" target="_blank">BVI & CAC / Turvo - PR</a>
            <a href="https://www.climatempo.com.br/previsao-do-tempo/cidade/2942/braga-rs" class="button" target="_blank">SBO / Luziânia - GO</a>
            <a href="https://www.climatempo.com.br/previsao-do-tempo/cidade/2942/braga-rs" class="button" target="_blank">TBI / Cristalina - GO</a>
            <a href="https://www.climatempo.com.br/previsao-do-tempo/cidade/2942/braga-rs" class="button" target="_blank">GAM / Cristalina - GO</a>
        </div>
    </div>
    <!-- Documentos de apoio a operação -->
    <h3 class="section-title">Documentos de Apoio</h3>

    <div class="menu-wrapper1">
    <div id="documentos-procedimentos1" class="menu-container">
        <button id="btn-documentos-procedimentos1" class="menu-button" onclick="toggleContent('documentos-procedimentos1-content')">MOR - Manual Operação Remota</button>
        <div id="documentos-procedimentos1-content" class="menu-content">
            <div class="nested-menu-container">
                <button id="btn-nested-menu1" class="menu-button" onclick="toggleNestedContent('nested-menu-content1')">GO - Guia de Operação</button>
                <div id="nested-menu-content1" class="nested-menu-content">
                    <a href="https://mcqcombr-my.sharepoint.com/:b:/g/personal/operacao_mcqcombr_onmicrosoft_com/EUeoYqIIoB1KmIyehLLWvYcBeIyXwleE2E5T9a2tgL8Zpw?e=hv6l4T" class="button" target="_blank">MOR-GO-COR-001-R0 - Atribuições de atividades de operadores</a>
                    <a href="https://mcqcombr-my.sharepoint.com/:b:/g/personal/operacao_mcqcombr_onmicrosoft_com/EWJHdaXb6L5LhMrBU0XlUN8B90tfFl18qeU5OCyfHhefuA?e=uRpYCA" class="button" target="_blank">MOR-GO-COR-002-R1 - Comunicação e Fluxo de informação</a>
                    <a href="https://mcqcombr-my.sharepoint.com/:b:/g/personal/operacao_mcqcombr_onmicrosoft_com/EYh8fRrT21hGkY5EgQlxNDUBXkwV4NPbfnxCs3sNOvj5Dg?e=E9vFzZ" class="button" target="_blank">MOR-GO-COR-004-R0 - Checklist de Atividades e Rotina do Turno</a>
                    <a href="https://mcqcombr-my.sharepoint.com/:b:/g/personal/operacao_mcqcombr_onmicrosoft_com/EZLow51F6NtBn9eUE6myGFkBErdEJ4pqK3h8E7VD3gMA2g?e=Jv9KNI" class="button" target="_blank">MOR-GO-COR-005-R0 Comunicação e Informações Troca de Turno</a>
                    <a href="https://mcqcombr-my.sharepoint.com/:b:/g/personal/operacao_mcqcombr_onmicrosoft_com/EWXsLLRpuA5BrDE0dME-RdwBT6mpa4DPTptSV6qEpViI8g?e=vwco8x" class="button" target="_blank">MOR-GO-COR-006-R2 - Identificação e Resolução Falha na Comunicação com Sistemas Supervisórios</a>
                </div>
            </div>
 <!-- 
            <div class="nested-menu-container">
                <button id="btn-nested-menu3" class="menu-button" onclick="toggleNestedContent('nested-menu-content3')">PO - Procedimento Operacional</button>
                <div id="nested-menu-content3" class="nested-menu-content">
                    <a href="https://link_para_procedimento_3" class="button" target="_blank">Procedimento 3</a>
                    <a href="https://link_para_procedimento_4" class="button" target="_blank">Procedimento 4</a>

                    <div class="nested-menu-container">
                        <button id="btn-nested-menu4" class="menu-button" onclick="toggleNestedContent('nested-menu-content4')">IO - Instrução de Operação</button>
                        <div id="nested-menu-content4" class="nested-menu-content">
                            <a href="https://link_para_procedimento_3" class="button" target="_blank">Procedimento 3</a>
                            <a href="https://link_para_procedimento_4" class="button" target="_blank">Procedimento 4</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
-->

</div>  
<h3 class="section-title">Documentos Equipe de  Manutenção Local e COR MCQ</h3>
    <class="menu-wrapper1">
        <div class="menu-container">
            <button id="btn-nested-menu1" class="menu-button" onclick="toggleNestedContent('nested-menu-content1')">Controle de Intervenção Ilha 01</button>
            <button id="btn-nested-menu2" class="menu-button" onclick="toggleNestedContent('nested-menu-content2')">Controle de Intervenção Ilha 02</button>
<!--
            <button id="btn-nested-menu3" class="menu-button" onclick="toggleNestedContent('nested-menu-content3')">Lista de Alarmes Recorrentes Ilha 01</button>
            <button id="btn-nested-menu4" class="menu-button" onclick="toggleNestedContent('nested-menu-content4')">Lista de Alarmes Recorrentes Ilha 02</button>
 -->
        </div>
        
        <!-- Conteúdo do submenu Controle de Intervenção Ilha 01 -->
        <div id="nested-menu-content1" class="nested-menu-content hidden">
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/EXs1TTPIkWZEtEe2hAG-dCMBXQjD8SLTctkXYel4jlimvQ?e=kt8iAm" class="button" target="_blank">Confluência</a>
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/EZsKbUHne2dHkJ3FWY_M10oBoW3ndv8GjvM9oQyKj8aMYg?e=8wdskS" class="button" target="_blank">Carlos Gonzatto</a>
            <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/EqWX_VFUNP1ChR2tyfLh0R4B2bO26HBIvGPgQQPzwyiZ_A?e=8fzuxf" class="button" target="_blank">Marco Baldo</a>
            <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/Ek9cop2KmoRLkLpcg21iiwMBDxEo254DfWiRgx7JTo0XyA?e=gY0bh9" class="button" target="_blank">Alto Sucuriú</a>
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/Ec9J7ZFtsidNh76CrqnnfFoBEzrtrTJkum_W1eM5RYJ-aA?e=anziM5" class="button" target="_blank">São Francisco</a>
        </div>
        
        <!-- Conteúdo do submenu Controle de Intervenção Ilha 02 -->
        <div id="nested-menu-content2" class="nested-menu-content hidden">
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/EX-J1D360pdKsmfb4uzcmfkBwSvIwQ16GModxOaiUmWj8Q?e=jw0JIp" class="button" target="_blank">Cachoeira</a>
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/ERyM59iWe_xJu2h9o9itG8YBxhrYXSx2ghAvVbb148t4NA?e=aXZCOk" class="button" target="_blank">Boa Vista</a>
            <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/EhcnoSUIPrhNgBkeeAsrI5UB_xRYNFyE0t9X6o51oN1Hog?e=YQbn3i" class="button" target="_blank">Arturo Andreoli</a>
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/ERSM6rmgDmVBqa2iBgmRky4B-0cDX6gpJgOW-b0qytfQNQ?e=KwPo18" class="button" target="_blank">Bocaiuva</a>
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/EfKhH2Gt3ixDgI7pd_s5A5cBjDFSzgCFRaTrX2Ynqpobog?e=Axl8Jb" class="button" target="_blank">São Bartolomeu</a>
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/EY3gi1NLTDlLhcFTsQzdDzkBBQ-fxhKDS4TGtZ1f1PwZbQ?e=TUT5IO" class="button" target="_blank">Gameleira</a>
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/ERl_lZO8Kj1FpzoP06gDW6IBG6HOC2cTUAmMhz_SoNtnLw?e=LKQxyU" class="button" target="_blank">Tambori</a>
        </div>

<!-- Botão para exibir a tabela de alarmes da Ilha 01 -->

<!-- Conteúdo dos submenus com tabelas das usinas -->
 <!-- 
<div id="nested-menu-content3" class="nested-menu-content hidden">
<h3>Alto Sucuriú</h3>
    <div class="button-container">
        <button onclick="addRow('tableAltoSucuriu')" class="menu-button">Adicionar Linha</button>
        <button onclick="removeRow('tableAltoSucuriu')" class="menu-button">Remover Linha</button>
        <button onclick="submitData()" class="menu-button">Salvar Dados</button>
    </div>
    <table id="tableAltoSucuriu">
        <thead>
            <tr>
                <th>Data</th>
                <th>Hora</th>
                <th>Alarme</th>
                <th>Ações do Operador</th>
                <th>Comentário da Equipe de Manutenção</th>
            </tr>
        </thead>
        <tbody>

    </tbody>
    </table>
</div>

<div id="nested-menu-content3" class="nested-menu-content hidden">
<h3>São Francisco</h3>
    <div class="button-container">
        <button onclick="addRow('tableAltoSaoFrancisco')" class="menu-button">Adicionar Linha</button>
        <button onclick="removeRow('tableAltoSaoFrancisco')" class="menu-button">Remover Linha</button>
        <button onclick="submitData()" class="menu-button">Salvar Dados</button>
    </div>
    <table id="tableAltoSaoFrancisco">
        <thead>
            <tr>
                <th>Data</th>
                <th>Hora</th>
                <th>Alarme</th>
                <th>Comentário Operação</th>
                <th>Comentário da Equipe de Manutenção</th>
            </tr>
        </thead>
        <tbody>

    </table>
        </div>
        </div>
        <div id="nested-menu-content3" class="nested-menu-content hidden">
<h3>Carlos Gonzatto</h3>
    <div class="button-container">
        <button onclick="addRow('tableGonzatto')" class="menu-button">Adicionar Linha</button>
        <button onclick="removeRow('tableGonzatto')" class="menu-button">Remover Linha</button>
        <button onclick="submitData()" class="menu-button">Salvar Dados</button>
    </div>
    <table id="tableGonzatto">
        <thead>
            <tr>
                <th>Data</th>
                <th>Hora</th>
                <th>Alarme</th>
                <th>Comentário Operação</th>
                <th>Comentário da Equipe de Manutenção</th>
            </tr>
        </thead>
        <tbody>

    </table>
        </div>

        <div id="nested-menu-content3" class="nested-menu-content hidden">
        <h3>Marco Baldo</h3>
    <div class="button-container">
        <button onclick="addRow('tableBaldo')" class="menu-button">Adicionar Linha</button>
        <button onclick="removeRow('tableBaldo')" class="menu-button">Remover Linha</button>
        <button onclick="submitData()" class="menu-button">Salvar Dados</button>
    </div>
    <table id="tableBaldo">
        <thead>
            <tr>
                <th>Data</th>
                <th>Hora</th>
                <th>Alarme</th>
                <th>Comentário Operação</th>
                <th>Comentário da Equipe de Manutenção</th>
            </tr>
        </thead>
        <tbody>

    </table>
        </div>
        <div id="nested-menu-content3" class="nested-menu-content hidden">
            <h3>Rondinha</h3>
            <div class="button-container">
                <button onclick="addRow('tableRondinha')" class="menu-button">Adicionar Linha</button>
                <button onclick="removeRow('tableRondinha')" class="menu-button">Remover Linha</button>
                <button onclick="submitData()" class="menu-button">Salvar Dados</button>
            </div>
            <table id="tableRondinha'">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Alarme</th>
                        <th>Comentario Operação</th>
                        <th>Comentário da Equipe de Manutenção</th>
                    </tr>
                </thead>
                <tbody>

            </tbody>
            </table>
        </div>
        <div id="nested-menu-content3" class="nested-menu-content hidden">
            <h3>Confluência</h3>
            <div class="button-container">
                <button onclick="addRow('tableConfluência')" class="menu-button">Adicionar Linha</button>
                <button onclick="removeRow('tableConfluência')" class="menu-button">Remover Linha</button>
                <button onclick="submitData()" class="menu-button">Salvar Dados</button>
            </div>
            <table id="tableConfluência">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Alarme</th>
                        <th>Comentario Operação</th>
                        <th>Comentário da Equipe de Manutenção</th>
                    </tr>
                </thead>
                <tbody>

            </tbody>
            </table>
        </div>
        <div id="nested-menu-content3" class="nested-menu-content hidden">
            <h3>UHE Santa Clara</h3>
            <div class="button-container">
                <button onclick="addRow('tableUhesantaclara')" class="menu-button">Adicionar Linha</button>
                <button onclick="removeRow('tableUhesantaclara')" class="menu-button">Remover Linha</button>
                <button onclick="submitData()" class="menu-button">Salvar Dados</button>
            </div>
            <table id="tableUhesantaclara">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Alarme</th>
                        <th>Comentario Operação</th>
                        <th>Comentário da Equipe de Manutenção</th>
                    </tr>
                </thead>
                <tbody>

            </tbody>
            </table>
        </div>
        <div id="nested-menu-content3" class="nested-menu-content hidden">
            <h3>CGH Santa Clara</h3>
            <div class="button-container">
                <button onclick="addRow('tableCghsantaclara')" class="menu-button">Adicionar Linha</button>
                <button onclick="removeRow('tableCghsantaclara')" class="menu-button">Remover Linha</button>
                <button onclick="submitData()" class="menu-button">Salvar Dados</button>
            </div>
            <table id="tableCghsantaclara">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Alarme</th>
                        <th>Comentario Operação</th>
                        <th>Comentário da Equipe de Manutenção</th>
                    </tr>
                </thead>
                <tbody>

            </tbody>
                </table>
            <div>
         <div>
    <div>
</div>
-->

<!-- Footer Ajustado -->
<footer>
    <p>&copy; 2024 Tiago Pereira Cordeiro. Todos os direitos reservados.</p>
    <p>Contato: (41) 9194-5426 | Email: tiago.cor@mcq.com.br</p>
    <div class="social-media">
        <a href="https://www.linkedin.com/in/tiago-pereira-745a86191" target="_blank">LinkedIn</a>
        <a href="http://www.mcq.com.br/" target="_blank">Site</a>
        <!-- Adicione mais links de redes sociais conforme necessário -->
    </div>
</footer>


    <script>

 

 // Função para alternar a visibilidade dos conteúdos do menu principal
function toggleContent(contentId) {
    const contents = document.querySelectorAll('.menu-content');
    contents.forEach(content => {
        if (content.id === contentId) {
            content.classList.toggle('show'); // Alterna a classe 'show'
        } else {
            content.classList.remove('show'); // Remove a classe 'show' dos outros conteúdos
        }
    });
}

// Função para alternar a visibilidade dos conteúdos dos menus aninhados
function toggleNestedContent(nestedContentId) {
    const nestedContents = document.querySelectorAll('.nested-menu-content');
    nestedContents.forEach(nestedContent => {
        if (nestedContent.id === nestedContentId) {
            nestedContent.classList.toggle('show'); // Alterna a classe 'show'
        } else {
            nestedContent.classList.remove('show'); // Remove a classe 'show' dos outros conteúdos aninhados
        }
    });
}

// Função para alternar a visibilidade dos painéis principais
function togglePanel(panelId) {
    const panels = document.querySelectorAll('.painel-container');
    panels.forEach(panel => {
        if (panel.id === panelId) {
            panel.classList.toggle('show'); // Alterna a classe 'show'
        } else {
            panel.classList.remove('show'); // Remove a classe 'show' dos outros painéis
        }
    });
}

// Inicializa o painel e o conteúdo ao carregar a página
document.addEventListener('DOMContentLoaded', () => {
    // Configura o botão do menu principal
    const documentosButton = document.getElementById('btn-documentos-procedimentos');
    if (documentosButton) {
        documentosButton.addEventListener('click', () => {
            toggleContent('documentos-procedimentos-content');
        });
    }

    // Configura o botão para o submenu "GO"
    const goButton = document.getElementById('btn-nested-menu');
    if (goButton) {
        goButton.addEventListener('click', () => {
            toggleNestedContent('nested-menu-content');
        });
    }

    // Configura botões adicionais de submenus, caso existam
    toggleNestedContent('btn-nested-menu2', 'nested-menu-content2');
    toggleNestedContent('btn-nested-menu3', 'nested-menu-content3');
    toggleNestedContent('btn-nested-menu4', 'nested-menu-content4');
});

     // Função para adicionar uma linha à tabela especificada
     function addRow(tableId) {
            const table = document.getElementById(tableId);
            if (table) {
                const tbody = table.getElementsByTagName('tbody')[0];
                const newRow = tbody.insertRow();
                for (let i = 0; i < 5; i++) {
                    const newCell = newRow.insertCell();
                    const input = document.createElement('input');
                    input.type = 'text';
                    input.placeholder = getPlaceholder(i);
                    newCell.appendChild(input);
                }
            }
        }

        // Função para remover a última linha da tabela especificada
        function removeRow(tableId) {
            const table = document.getElementById(tableId);
            if (table) {
                const tbody = table.getElementsByTagName('tbody')[0];
                const rows = tbody.getElementsByTagName('tr');
                if (rows.length > 0) {
                    tbody.deleteRow(rows.length - 1);
                }
            }
        }

        // Função para salvar dados (exemplo)
        function submitData() {
            alert('Dados salvos com sucesso!');
        }

        // Função auxiliar para obter o placeholder para as colunas
        function getPlaceholder(index) {
            const placeholders = [
                'DD/MM/AAAA', 'HH:MM', 'Alarme', 'Ações do Operador', 'Comentário da Equipe'
            ];
            return placeholders[index] || '';
        }

        document.addEventListener('DOMContentLoaded', function() {
    const showAlarmesIlha01Button = document.getElementById('showAlarmesIlha01');

    function showTable(id) {
        const allMenus = document.querySelectorAll('.nested-menu-content');
        allMenus.forEach(menu => {
            if (menu.id === id) {
                menu.classList.remove('hidden');
            } else {
                menu.classList.add('hidden');
            }
        });
    }

    showAlarmesIlha01Button.addEventListener('click', function() {
        showTable('nested-menu-content-AltoSucuriu');
    });

    // Inicialmente oculta todas as tabelas
    showTable('nested-menu-content-AltoSucuriu');
});

</script>

</body>
</html>
