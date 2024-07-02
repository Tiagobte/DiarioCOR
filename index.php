<!DOCTYPE html>
<html lang="pt-BR">
<head>
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

        .button-group a {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            text-align: center;
            transition: background-color 0.3s;
            white-space: nowrap;
            margin-bottom: 10px;
            display: inline-block;
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

        footer {
            margin-top: 20px;
            text-align: center;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="welcome-message">
            <h2>Bem-vindo à Página Inicial</h2>
            <p><strong>Usuário logado:</strong> <?php echo htmlspecialchars($username); ?></p>
        </div>

        <div class="panels-container">
            <div class="tools-panel">
                <h3>Ferramentas Externas</h3>
                <div class="button-group">
                    <a href="#">01 ONS</a>
                    <a href="#">02 CCEE</a>
                    <a href="#">03 Simepar</a>
                    <a href="#">04 Uptime Robot</a>
                    <a href="#">05 PIM Way2</a>
                    <a href="#">06 Copel</a>
                    <a href="#">07 Ambitec</a>
                    <a href="#">08 Hidro Tach</a>
                    <a href="#">09 SEL Inc.</a>
                    <a href="#">10 Acesso ao Webmail</a>
                    <a href="#">11 Acesso ao navegador</a>
                    <a href="#">12 Skype</a>
                    <a href="#">13 IHM CAC</a>
                    <a href="#">14 COPEL Hidrologia</a>
                    <a href="#">15 INTELBRAS</a>
                </div>
            </div>

            <div class="ilhas-container">
                <div class="panel">
                    <h3>Diários de Operação - ILHA 01</h3>
                    <div class="button-group">
                        <a href="#">01 PCH Carlos Gonzatto</a>
                        <a href="#">02 PCH Marco Baldo</a>
                        <a href="#">03 PCH Rondinha</a>
                        <a href="#">04 PCH Alto Sucuriú</a>
                        <a href="#">05 PCH São Francisco</a>
                        <a href="#">06 UHE Santa Clara</a>
                        <a href="#">07 Confluência</a>
                    </div>
                </div>

                <div class="panel">
                    <h3>Diários de Operação - ILHA 02</h3>
                    <div class="button-group">
                        <a href="#">08 PCH Bocaiuva</a>
                        <a href="#">09 PCH Arturo Andreoli</a>
                        <a href="#">10 PCH São Bartolomeu</a>
                        <a href="#">11 PCH Gameleira</a>
                        <a href="#">12 PCH Tamboril</a>
                        <a href="#">13 PCH Boa Vista</a>
                        <a href="#">14 CGH Cachoeira</a>
                        <a href="#">15 UHE Fundão</a>
                    </div>
                </div>
            </div>
        </div>

        <div style="text-align: center;">
            <a href="DiarioCor/diario_operacao.php" class="btn-logout">Diário de Operação</a>
            <a href="DiarioCor/EscalaSobreaviso.php" class="btn-logout">Escala de Sobreaviso</a>
        </div>

        <footer>
            <p>&copy; <?php echo date('Y'); ?> SeuSite. Todos os direitos reservados.</p>
        </footer>
    </div>
</body>
</html>
