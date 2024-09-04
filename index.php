<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Painel de Ferramentas</title>
    <style>

/* Estilização do Título h2 */
h2 {
    font-size: 26px; /* Tamanho da fonte */
    font-weight: bold; /* Peso da fonte */
    color: #3a6186; /* Cor do texto */
    text-align: left; /* Alinhamento à esquerda */
    margin-bottom: 20px; /* Espaçamento inferior */
    padding-bottom: 10px; /* Espaçamento interno inferior */
    border-bottom: 2px solid #89253e; /* Linha inferior */
    letter-spacing: 1px; /* Espaçamento entre letras */
    text-transform: uppercase; /* Transformar o texto em maiúsculas */
}

/* Reset básico */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html, body {
    height: 100%;
    font-family: Arial, sans-serif;
    overflow: hidden; /* Evita barras de rolagem */
}

.wrapper {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    overflow: hidden; /* Evita barras de rolagem mesmo quando o conteúdo é pequeno */
}

.content {
    flex: 1;
    padding: 20px;
    background-color: #f4f4f4; /* Cor de fundo para destacar a área de conteúdo */
    overflow: hidden; /* Garante que o conteúdo não force barras de rolagem */
}

/* Estilo do Footer */
.footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 15px 0; /* Ajusta o padding vertical, remove o padding lateral */
    width: 100%; /* Garante que o footer ocupe toda a largura da tela */
    position: fixed; /* Garante que o footer fique fixo na parte inferior */
    bottom: 0; /* Alinha o footer ao fundo da tela */
    left: 0; /* Garante que o footer comece da borda esquerda da tela */
    box-shadow: 0 -4px 15px rgba(0, 0, 0, 0.2); /* Adiciona uma sombra sutil na parte superior do footer */
    background: linear-gradient(135deg, #3a6186, #89253e); /* Adiciona um gradiente de fundo */
    font-size: 1rem; /* Ajusta o tamanho da fonte */
    font-weight: 300; /* Ajusta o peso da fonte */
}

/* Estilo Geral */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f4f7fa;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    min-height: 100vh; /* Garante que o conteúdo preencha a altura da tela */
    padding-bottom: 60px; /* Ajusta o padding inferior para acomodar a altura do footer */
}

/* Estilo do Conteúdo Principal */
.content {
    flex: 1; /* Faz o conteúdo principal crescer para preencher o espaço disponível */
    width: 100%; /* Garante que o conteúdo ocupe toda a largura disponível */
}

  /* Cabeçalho */
header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100vw; /* Usa a largura total da viewport */
    background: linear-gradient(135deg, #3a6186, #89253e);
    padding: 15px 30px;
    border-radius: 0; /* Remove o arredondamento dos cantos */
    color: white;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    box-sizing: border-box; /* Inclui o padding e border na largura total */
    position: relative;
    margin: 0; /* Remove a margem */
}

/* Estilo da Imagem no Cabeçalho */
header .logo-left {
    height: 80px; /* Ajuste a altura para aumentar o tamanho da imagem */
    width: auto; /* Mantém a proporção original */
    border-radius: 50%; /* Adiciona bordas arredondadas, se desejado */
    border: 2px solid white; /* Adiciona uma borda branca ao redor da imagem */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); /* Adiciona uma sombra sutil */
    object-fit: contain; /* Garante que a imagem se ajuste sem distorcer */
}


/* Estilo do Título */
header h1 {
    flex-grow: 1;
    text-align: center;
    font-size: 2rem;
    margin: 0;
    font-weight: 300;
    letter-spacing: 1.5px;
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
}

/* Estilo do Botão */
header .button {
    background: linear-gradient(135deg, #ff416c, #ff4b2b);
    color: white;
    padding: 12px 25px;
    text-decoration: none;
    border-radius: 50px;
    font-weight: 600;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
    display: inline-block; /* Garante que o botão não quebre a linha */
}

/* Efeito de Hover */
header .button:hover {
    background: linear-gradient(135deg, #ff4b2b, #ff416c);
    transform: translateY(-3px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
}

/* Animação de Brilho */
header .button::before {
    content: '';
    position: absolute;
    top: 50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: rgba(255, 255, 255, 0.2);
    transform: translateY(-50%) rotate(45deg);
    transition: all 0.4s ease;
}

header .button:hover::before {
    left: 100%;
}


/* Contêiner para alinhar os botões horizontalmente */
.menu-container {
    display: flex;
    justify-content: flex-start; /* Alinha os botões à esquerda */
    gap: 10px; /* Espaçamento entre os botões */
    flex-wrap: wrap; /* Permite que os botões se movam para a próxima linha, se necessário */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    border-radius: 8px;
    padding: 10px;
    margin-bottom: 20px;
}

        /* Estilo para o contêiner de botões */
.menu-buttons-container {
    display: flex;
    flex-wrap: wrap; /* Permite quebra de linha se houver muitos botões */
    gap: 10px; /* Espaçamento entre os botões */
    justify-content: flex-start; /* Alinha os botões à esquerda */
}
/* Estilização do contêiner para alinhar botões horizontalmente */
.menu-buttons {
    display: flex;
    justify-content: flex-start;
    gap: 10px;
    flex-wrap: wrap;
    margin-bottom: 20px; /* Espaçamento inferior entre menus */
}
/* Estilo para os botões do menu */
.menu-button {
    background: linear-gradient(135deg, #3a6186, #89253e);
    color: white;
    border: none;
    padding: 12px 20px;
    text-align: left;
    text-decoration: none;
    display: flex;
    align-items: center;
    margin: 8px 0;
    cursor: pointer;
    border-radius: 8px;
    font-size: 16px;
    transition: background 0.3s ease;
}

.menu-button:hover {
    background: linear-gradient(135deg, #4b79a1, #bc4e64);
}

/* Adicionar ícones aos botões */
.menu-button i {
    margin-right: 10px; /* Espaçamento entre o ícone e o texto */
    font-size: 18px;
}

/* Estilo para o conteúdo dos menus */
.menu-content {
    background-color: #f3f3f3;
    border-radius: 8px;
    padding: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-top: 10px;
}

.menu-content a {
    color: #333;
    text-decoration: none;
    padding: 10px;
    display: block;
    border-radius: 5px;
    margin-bottom: 8px;
    transition: background 0.3s ease, color 0.3s ease;
}

.menu-content a:hover {
    background-color: #ececec;
    color: #000;
}

/* Estilo para o menu aninhado */
.nested-menu-container {
    margin-top: 10px;
}

.nested-menu-content {
    margin-left: 20px;
    padding: 10px;
    border-left: 2px solid #3a6186;
    background-color: #f9f9f9;
    border-radius: 5px;
}

        footer {
            margin-top: 20px;
            padding: 20px;
            background: linear-gradient(135deg, #3a6186, #89253e);
            color: white;
            text-align: center;
            width: 100%;
            max-width: 1200px;
            border-radius: 10px;
        }

        footer p {
            margin: 5px 0;
        }

        @media (max-width: 768px) {
            .menu-content {
                font-size: 0.9rem;
            }

            header h1 {
                font-size: 1.5rem;
            }

            .button-container {
                flex-direction: column;
                align-items: center;
            }

            .menu-button {
                width: 100%;
            }
        }
        .menu-content {
    display: none; /* Oculta o menu por padrão */
}


    </style>
</head>
<body>
    <header>
        <img src="icons/logo-mcq.png" alt="Logo da Empresa Esquerda" class="logo-left">
        <h1>Centro de Operação Remota - Painel de Ferramentas</h1>
        <a href="index.html" class="button">Página MCQ</a>
    </header>
  <!-- Botões do Menu Principal -->
<div class="menu-container">
    <button class="menu-button" onclick="togglePanel('painel-ilha-01')">Ferramentas Ilha 01</button>
    <button class="menu-button" onclick="togglePanel('painel-ilha-02')">Ferramentas Ilha 02</button>
    <button class="menu-button" onclick="togglePanel('ferramentas-internas')">Ferramentas Internas</button>
</div>
       
 <!-- Painel Ilha 01 -->
<div id="painel-ilha-01" class="painel-container">
    <div class="menu-buttons">
        <button class="menu-button" onclick="toggleContent('planilhas-ilha1')">PDO - Ilha 1</button>
        <button class="menu-button" onclick="toggleContent('Relatorios-ocorrencias1')">Relatórios Ocorrências</button>
        <button class="menu-button" onclick="toggleContent('Escalas-de-Sobreaviso1')">Escala de Sobreaviso</button>
    </div>
</div>
    <div id="planilhas-ilha1" class="menu-content">
            <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/EqKIFodSIXNBu8kIMWGU2RoBHgRELa9CApFZlORfcagAgA?e=gsWBV2" target="_blank">01 PCH Carlos Gonzatto</a>
            <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/EqVPTJ3dBPlDmR7l5dZLFbMB-9V0rN5Tu_8L-1fMrUPFMg?e=ZGfP0R" target="_blank">02 PCH Marco Baldo</a>
            <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/Etdh8WWUXhJBnHDuva7SNB8BfJ_yj_L5-oH8uQRVsR1gfw?e=bW4wAS" target="_blank">03 PCH Rondinha</a>
            <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/Er1QVPZl6u9Hl8bCP5i02ccBNLfWvBf4nW3_DZpuff0OmA?e=hY9LK1" target="_blank">04 PCH Alto Sucuriú</a>
            <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/Eke5TWYa0CJHlvimGvyxqWMBVlZ3rrcwQvn35fLlFOZZYA?e=bnjRrJ" target="_blank">05 PCH São Francisco</a>
            <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/EvtfbCIPo3hKlg_JXgHaSEUBy6S9X7NUHVPPqHeP_Fmq6Q?e=RcTjpj" target="_blank">06 PCH Confluência</a>
            <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/Em3OQkJote5ItFjoh9XKq3oBemIUE2kmZoxEDJe6vpCrJg?e=FhfCf5" target="_blank">07 UHE Santa Clara</a>
        </div>
        <div id="Relatorios-ocorrencias1" class="menu-content">
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/EQBBXfvsHZRGrsTJc-I_0TwBP0KDLyJitfULlgMqTvxKtA?e=4tL93H" class="button" target="_blank">Alto Sucuriú</a>
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/ERU6KctWCj9KhhqGn7_2DfwB9LfBdcKQdbB0W6TpwBUNdg?e=apnLB7" class="button" target="_blank">São Francisco</a>
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/EVoc3jTmV25GgPG6oWduYGEBCYMs1c5eQOOTsTTuf6fyMw?e=2b3tJ0" class="button" target="_blank">Confluência</a>
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/EZhJeRhQjp9Il1aCuLt-sBcBDLNFViKxwYFavrdLIlcRAg?e=I7dWJk" class="button" target="_blank">Carlos Gonzatto</a>
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/ETR0CRe9nUtFjbxKvGdW7t8BLi4SanuKxWq2NJNDpXfjYg?e=8X2Mab" class="button" target="_blank">Marco Baldo</a>
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/EXYuJNZq2fVKktzlQ-8gCkYBkphDe8cQCVJDHgDYG2i_GQ?e=RFzGm0" class="button" target="_blank">Rondinha</a>
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/ET81e22X-fVPneEVcWAgQWgBBfwCfk7An3_1gDz_PtgHoA?e=TAGQM8" class="button" target="_blank">UHE Santa Clara</a>
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/EbO3_cNOV5hHpHRnwj1rOnMBP1FXzv3pfatTcND1fBq3ag?e=Hv2nzi" class="button" target="_blank">CGH Santa Clara</a>
        </div>
        <div id="Escalas-de-Sobreaviso1" class="menu-content">
            <!-- Adicione o conteúdo da Escala de Sobreaviso aqui -->
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/EgV33rjaNrdJudlqwyz6WIgBjn6LvrWhDl9WR0t3KoKpCQ?e=9EniCN" class="button" target="_blank">PCH Carlos Gonzatto e Marco Baldo</a>
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/EsXEzmL-3YBBtmLg20kdj6UBBnCvFr8dQWJ4uELQ_rinbw?e=bxE7AD" class="button" target="_blank">ELEJOR</a>
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/ElSpt5ED_U5LnVToaErfxbQBqXalM8kk6gCe8LeIP_Y3qQ?e=VeWUOE" class="button" target="_blank">PCH Alto Sucuriú</a>
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/ErK1ZvrTD11HjmNxy1AWs98Bov5fiMXBOxhI53fSSpgvSQ?e=ppR7vD" class="button" target="_blank">PCH São Francisco</a>
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/Et60KR9DCalNvS4RorN5zK8BR42Z7w3OCMQ9af_bAqloag?e=HPKZvv" class="button" target="_blank">PCH Confluência</a>
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/EhCXSTavXWZBiy_4hvuICXkBprPeMpO9dt4JnN_XX6jVBA?e=QecvQm" class="button" target="_blank">PCH Rondinha</a>  
        </div>
    </div>
 <!-- Painel Ilha 02 -->
<div id="painel-ilha-02" class="painel-container">
    <div class="menu-buttons">
        <button class="menu-button" onclick="toggleContent('planilhas-ilha2')">PDO - Ilha 2</button>
        <button class="menu-button" onclick="toggleContent('Relatorios-ocorrencias2')">Relatórios Ocorrências</button>
        <button class="menu-button" onclick="toggleContent('Escalas-de-Sobreaviso2')">Escala de Sobreaviso</button>
    </div>
</div>
        <div id="planilhas-ilha2" class="menu-content">
            <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/EqKIFodSIXNBu8kIMWGU2RoBHgRELa9CApFZlORfcagAgA?e=gsWBV2" target="_blank">01 PCH Carlos Gonzatto</a>
            <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/EqVPTJ3dBPlDmR7l5dZLFbMB-9V0rN5Tu_8L-1fMrUPFMg?e=ZGfP0R" target="_blank">02 PCH Marco Baldo</a>
            <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/Etdh8WWUXhJBnHDuva7SNB8BfJ_yj_L5-oH8uQRVsR1gfw?e=bW4wAS" target="_blank">03 PCH Rondinha</a>
            <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/Er1QVPZl6u9Hl8bCP5i02ccBNLfWvBf4nW3_DZpuff0OmA?e=hY9LK1" target="_blank">04 PCH Alto Sucuriú</a>
            <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/Eke5TWYa0CJHlvimGvyxqWMBVlZ3rrcwQvn35fLlFOZZYA?e=bnjRrJ" target="_blank">05 PCH São Francisco</a>
            <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/EvtfbCIPo3hKlg_JXgHaSEUBy6S9X7NUHVPPqHeP_Fmq6Q?e=RcTjpj" target="_blank">06 PCH Confluência</a>
            <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/Em3OQkJote5ItFjoh9XKq3oBemIUE2kmZoxEDJe6vpCrJg?e=FhfCf5" target="_blank">07 UHE Santa Clara</a>
        </div>
        <div id="Relatorios-ocorrencias2" class="menu-content">
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/EQBBXfvsHZRGrsTJc-I_0TwBP0KDLyJitfULlgMqTvxKtA?e=4tL93H" class="button" target="_blank">Alto Sucuriú</a>
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/ERU6KctWCj9KhhqGn7_2DfwB9LfBdcKQdbB0W6TpwBUNdg?e=apnLB7" class="button" target="_blank">São Francisco</a>
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/EVoc3jTmV25GgPG6oWduYGEBCYMs1c5eQOOTsTTuf6fyMw?e=2b3tJ0" class="button" target="_blank">Confluência</a>
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/EZhJeRhQjp9Il1aCuLt-sBcBDLNFViKxwYFavrdLIlcRAg?e=I7dWJk" class="button" target="_blank">Carlos Gonzatto</a>
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/ETR0CRe9nUtFjbxKvGdW7t8BLi4SanuKxWq2NJNDpXfjYg?e=8X2Mab" class="button" target="_blank">Marco Baldo</a>
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/EXYuJNZq2fVKktzlQ-8gCkYBkphDe8cQCVJDHgDYG2i_GQ?e=RFzGm0" class="button" target="_blank">Rondinha</a>
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/ET81e22X-fVPneEVcWAgQWgBBfwCfk7An3_1gDz_PtgHoA?e=TAGQM8" class="button" target="_blank">UHE Santa Clara</a>
            <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/EbO3_cNOV5hHpHRnwj1rOnMBP1FXzv3pfatTcND1fBq3ag?e=Hv2nzi" class="button" target="_blank">CGH Santa Clara</a>
        </div>
        <div id="Escalas-de-Sobreaviso2" class="menu-content">
            <!-- Adicione o conteúdo da Escala de Sobreaviso aqui -->
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/EgV33rjaNrdJudlqwyz6WIgBjn6LvrWhDl9WR0t3KoKpCQ?e=9EniCN" class="button" target="_blank">PCH Carlos Gonzatto e Marco Baldo</a>
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/EsXEzmL-3YBBtmLg20kdj6UBBnCvFr8dQWJ4uELQ_rinbw?e=bxE7AD" class="button" target="_blank">ELEJOR</a>
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/ElSpt5ED_U5LnVToaErfxbQBqXalM8kk6gCe8LeIP_Y3qQ?e=VeWUOE" class="button" target="_blank">PCH Alto Sucuriú</a>
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/ErK1ZvrTD11HjmNxy1AWs98Bov5fiMXBOxhI53fSSpgvSQ?e=ppR7vD" class="button" target="_blank">PCH São Francisco</a>
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/Et60KR9DCalNvS4RorN5zK8BR42Z7w3OCMQ9af_bAqloag?e=HPKZvv" class="button" target="_blank">PCH Confluência</a>
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/EhCXSTavXWZBiy_4hvuICXkBprPeMpO9dt4JnN_XX6jVBA?e=QecvQm" class="button" target="_blank">PCH Rondinha</a>  
        </div>
    </div>
<!-- Ferramentas Internas -->
<div id="ferramentas-internas" class="painel-container">
    <div class="menu-buttons">
        <button class="menu-button" onclick="toggleContent('ferramentas-internas-links')">Ferramentas Internas</button>
        <button class="menu-button" onclick="toggleContent('ferramentas-externas-links')">Ferramentas Externas</button>
    </div>
</div>
    <div id="ferramentas-internas-links" class="menu-content">
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/Eh4gSjJjmklJlo3dzvg9x9kBGB99hKivisxhgjeaMPZDgQ?e=nwHgZc" class="button" target="_blank">Diario de Operação</a>
                <a href="https://mcqcombr-my.sharepoint.com/:x:/g/personal/operacao_mcqcombr_onmicrosoft_com/EQrobaWYzulNjIA9lAehWpIBK_SsufElXWoC9W3bqsf7Eg?e=HahAeB" class="button" target="_blank">Contatos</a>
                <a href="https://mcqcombr-my.sharepoint.com/:f:/g/personal/operacao_mcqcombr_onmicrosoft_com/EoN4cbLBq1BCpWYt7e-ftEwBdbuMf__VB8x4Nj3uI9StKA?e=dZgfid" class="button" target="_blank">Escala operadores - COR</a>
    </div>
    <div id="ferramentas-externas-links" class="menu-content" style="display:none;">
        <a href="https://sintegre.ons.org.br/paginas/meu-perfil/meus-sistemas.aspx" target="_blank">01 ONS</a>
        <a href="https://www.ccee.org.br/web/guest/precos/painel-precos" target="_blank">02 CCEE</a>
        <a href="http://www.simepar.br/prognozweb/sao_francisco/table_data_station_hourly" target="_blank">03 Simepar</a>
        <a href="https://stats.uptimerobot.com/2963AIKqz6" target="_blank">04 Status de conexão</a>
        <a href="https://www.copel.com/mhbweb/paginas/bacia-iguacu.jsf" target="_blank">05 Copel Hidrologias</a>
        <a href="http://servidor.ambitec.eng.br:8080/sistema/index.php?class=MyMessageList" target="_blank">06 NaturWelt</a>
        <a href="https://hidro.tach.com.br/index.php" target="_blank">07 Hidro Tach</a>
        <a href="https://10.20.20.110/" target="_blank">08 IHM CAC</a>
        <a href="https://web.skype.com/" target="_blank">09 Skype</a>
        <a href="https://webmail-seguro.com.br/" target="_blank">10 Acesso ao Webmail</a>
    </div>
</div>
<br>
<h2>Documentos de Apoio à Operação</h2>

<button class="menu-button" onclick="toggleContent('documentos-procedimentos')"><i class="fas fa-book"></i>MOR - Manuais Operação Remota</button>
<div id="documentos-procedimentos" class="menu-content" style="display:none;">
<div class="nested-menu-container">   
        <div class="nested-menu-container">
        <button class="menu-button" onclick="toggleContent('nested-menu')"><i class="fas fa-list"></i>GO - Guia de Operação</button>
        <div id="nested-menu" class="nested-menu-content" style="display:none;">
                <a href="https://mcqcombr-my.sharepoint.com/:b:/g/personal/operacao_mcqcombr_onmicrosoft_com/EUeoYqIIoB1KmIyehLLWvYcBeIyXwleE2E5T9a2tgL8Zpw?e=hv6l4T" class="button" target="_blank">MOR-GO-COR-001-R0 - Atribuições de atividades de operadores</a>
                <a href="https://mcqcombr-my.sharepoint.com/:b:/g/personal/operacao_mcqcombr_onmicrosoft_com/EWJHdaXb6L5LhMrBU0XlUN8B90tfFl18qeU5OCyfHhefuA?e=uRpYCA" class="button" target="_blank">MOR-GO-COR-002-R1 - Comunicação e Fluxo de informação</a>
                <a href="https://mcqcombr-my.sharepoint.com/:b:/g/personal/operacao_mcqcombr_onmicrosoft_com/EYh8fRrT21hGkY5EgQlxNDUBXkwV4NPbfnxCs3sNOvj5Dg?e=E9vFzZ" class="button" target="_blank">MOR-GO-COR-004-R0 - Checklist de Atividades e Rotina do Turno</a>
                <a href="https://mcqcombr-my.sharepoint.com/:b:/g/personal/operacao_mcqcombr_onmicrosoft_com/EZLow51F6NtBn9eUE6myGFkBErdEJ4pqK3h8E7VD3gMA2g?e=Jv9KNI" class="button" target="_blank">MOR-GO-COR-005-R0 - Comunicação e Informações Troca de Turno</a>
                <a href="https://mcqcombr-my.sharepoint.com/:b:/g/personal/operacao_mcqcombr_onmicrosoft_com/EWXsLLRpuA5BrDE0dME-RdwBT6mpa4DPTptSV6qEpViI8g?e=vwco8x" class="button" target="_blank">MOR-GO-COR-006-R2 - Identificação e Resolução Falha na Comunicação com Sistemas Supervisórios</a>
            <!-- Outros links seguem o mesmo padrão -->
        </div>
    </div>
</div>

<!--
    <div id="documentos-procedimentos" class="menu-container">
        <button id="btn-documentos-procedimentos">MPU - Manuais Procedimentos Usina</button>
        <div class="menu-content">
            <div class="nested-menu-container2">
                <button id="btn-nested-menu">GO - Guia de Operação</button>
                <div class="nested-menu-content">
                    <a href="https://link_para_procedimento_4" class="button" target="_blank">Procedimento 4</a>
                </div>

                <div class="nested-menu-container2">
                    <button id="btn-nested-menu">PO - Procedimento Operacional</button>
                    <div class="nested-menu-content">
                        <a href="https://link_para_procedimento_3" class="button" target="_blank">Procedimento 3</a>
                        <a href="https://link_para_procedimento_4" class="button" target="_blank">Procedimento 4</a>

                        <div class="nested-menu-container2">
                            <button id="btn-nested-menu">IO - Instrução de Operação</button>
                            <div class="nested-menu-content">
                                <a href="https://link_para_procedimento_3" class="button" target="_blank">Procedimento 3</a>
                                <a href="https://link_para_procedimento_4" class="button" target="_blank">Procedimento 4</a>
-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
</body>
</html>

<body>
        <footer class="footer">
        <p>&copy; 2024 Sua Empresa. Todos os direitos reservados.</p>
        </footer>
</body>

    <script>
 
 document.addEventListener("DOMContentLoaded", function () {
    // Função para alternar a visibilidade do conteúdo
    function toggleContent(contentId) {
        var element = document.getElementById(contentId);
        if (element) {
            element.style.display = (element.style.display === "block") ? "none" : "block";
        }
    }

    // Função para alternar a visibilidade de um painel
    function togglePanel(panelId) {
        const panels = document.querySelectorAll('.painel-container');
        panels.forEach(panel => {
            if (panel.id === panelId) {
                panel.style.display = (panel.style.display === 'none' || panel.style.display === '') ? 'block' : 'none';
            } else {
                panel.style.display = 'none';
            }
        });
    }

    // Configurar botões do painel
    const menuButtons = document.querySelectorAll('.menu-button');
    menuButtons.forEach(button => {
        button.addEventListener('click', function () {
            const contentId = this.getAttribute('onclick').match(/'([^']+)'/)[1];
            toggleContent(contentId);
        });
    });

    // Configurar os botões do painel principal
    const painelButtons = document.querySelectorAll('.painel-button');
    painelButtons.forEach(button => {
        button.addEventListener('click', function () {
            const panelId = this.getAttribute('onclick').match(/'([^']+)'/)[1];
            togglePanel(panelId);
        });
    });

    // Configuração inicial para garantir que os conteúdos estejam ocultos
    document.querySelectorAll('.menu-content').forEach(content => {
        content.style.display = 'none';
    });
});


    </script>


</body>

</html>
