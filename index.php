<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Ferramentas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #4CAF50;
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
        }

        .user-info a {
            color: white;
            margin-left: 10px;
            text-decoration: none;
        }

        .user-info a:hover {
            text-decoration: underline;
        }

        #painel {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
            justify-content: center;
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
            color: black;
        }

        .menu-content a:hover {
            background-color: #ddd;
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
    </style>
</head>
<body>
    <header>
        <h1>Painel de Ferramentas</h1>
        <div class="user-info">
            Usuário: <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>
            <a href="logout.php">Sair</a>
        </div>
    </header>
    <div id="painel">
        <div id="ferramentas-internas" class="menu-container">
            <button id="btn-ferramentas-internas">Ferramentas Internas</button>
            <div class="menu-content">
                <a href="diario_operacao_ilha1.php">Diário de Operação - Ilha 01</a>
                <a href="diario_operacao_ilha2.php">Diário de Operação - Ilha 02</a>
                <a href="EscalaSobreaviso.php">Escala de Sobreaviso</a>
                <a href="relatorios.php">Relatórios</a>
                <a href="configuracoes.php">Configurações</a>
            </div>
        </div>

        <div id="ferramentas-externas" class="menu-container">
            <button id="btn-ferramentas-externas">Ferramentas Externas</button>
            <div class="menu-content">
                <a href="#">01 ONS</a>
                <a href="#">02 CCEE</a>
                <a href="#">03 Simepar</a>
                <a href="#">04 Status de conexão</a>
                <a href="#">06 Copel Hidrologias</a>
                <a href="#">07 NaturWelt</a>
                <a href="#">08 Hidro Tach</a>
                <a href="#">09 IHM CAC</a>
                <a href="#">12 Skype</a>
                <a href="#">10 Acesso ao Webmail</a>
            </div>
        </div>

        <div id="planilhas-ilha1" class="menu-container">
            <button id="btn-planilhas-ilha1">Planilhas Diárias de Operação - Ilha 01</button>
            <div class="menu-content">
                <a href="#">01 PCH CGZ</a>
                <a href="#">02 PCH MBO</a>
                <a href="#">03 PCH RON</a>
                <a href="#">04 PCH ASU</a>
                <a href="#">05 PCH SFC</a>
                <a href="#">06 PCH RIC</a>
                <a href="#">07 PCH FES</a>
                <a href="#">08 PCH PSS</a>
                <a href="#">09 PCH MCL</a>
            </div>
        </div>

        <div id="planilhas-ilha2" class="menu-container">
            <button id="btn-planilhas-ilha2">Planilhas Diárias de Operação - Ilha 02</button>
            <div class="menu-content">
                <a href="#">Link Planilha 1 - Ilha 02</a>
                <a href="#">Link Planilha 2 - Ilha 02</a>
                <a href="#">Link Planilha 3 - Ilha 02</a>
                <a href="#">Link Planilha 4 - Ilha 02</a>
                <a href="#">Link Planilha 5 - Ilha 02</a>
            </div>
        </div>
        
        <div class="button-container">
            <button class="button" onclick="window.location.href='diario_operacao_ilha1.php'">Diário de Operação - Ilha 01</button>
            <button class="button" onclick="window.location.href='diario_operacao_ilha2.php'">Diário de Operação - Ilha 02</button>
            <button class="button" onclick="window.location.href='EscalaSobreaviso.php'">Escala de Sobreaviso</button>
            <button class="button" onclick="window.location.href='logout.php'">Logout</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const menuContainers = document.querySelectorAll('.menu-container');

            menuContainers.forEach(container => {
                const button = container.querySelector('button');
                const menuContent = container.querySelector('.menu-content');

                button.addEventListener('click', () => {
                    const isVisible = menuContent.style.display === 'block';
                    hideAllMenus();
                    if (!isVisible) {
                        menuContent.style.display = 'block';
                    }
                });
            });

            function hideAllMenus() {
                document.querySelectorAll('.menu-content').forEach(menu => {
                    menu.style.display = 'none';
                });
            }

            document.addEventListener('click', function (event) {
                if (!event.target.closest('.menu-container')) {
                    hideAllMenus();
                }
            });
        });
    </script>
</body>
</html>

