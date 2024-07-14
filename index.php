<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
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
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        #painel {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }

        .menu-container {
            position: relative;
            width: 250px;
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .menu-container button {
            width: 100%;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            background: none;
            border: none;
            color: #007BFF;
            padding: 10px;
            text-transform: uppercase;
        }

        .menu-content {
            display: none;
            position: absolute;
            top: 60px;
            left: 0;
            width: 100%;
            background: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 10;
        }

        .menu-content a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: #333;
        }

        .menu-content a:hover {
            background: #f0f0f0;
        }

        #header {
            display: flex;
            justify-content: space-between;
            width: 80%;
            max-width: 800px;
            margin-top: 20px;
            background-color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #header div {
            font-size: 16px;
        }

        #header a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }

        #main-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }

        #main-buttons a {
            text-decoration: none;
        }

        #main-buttons button {
            width: 250px;
            padding: 15px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }

        #main-buttons button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div id="header">
        <div>Usuário logado: <?php echo $_SESSION['username']; ?></div>
        <div><a href="logout.php">Logout</a></div>
    </div>

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
    </div>

    <div id="main-buttons">
        <a href="EscalaSobreaviso.php">
            <button>Escala de Sobreaviso</button>
        </a>
        <a href="diario_operacao_ilha1.php">
            <button>Diário de Operação - Ilha 01</button>
        </a>
        <a href="diario_operacao_ilha2.php">
            <button>Diário de Operação - Ilha 02</button>
        </a>
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
