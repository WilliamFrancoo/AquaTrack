<?php
require "includes/auth.php";
exigirLogin();

$titulo = "Alertas | Aqua Track";
$pagina = "alertas.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $titulo ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="app">
        <?php require "includes/sidebar.php"; ?>
        <main class="main">
            <div class="mobile-head">
                <strong>Aqua Track</strong>
                <button class="menu-toggle">☰</button>
            </div>
            <div class="topline">
                <div>
                    <h1>Alertas</h1>
                    <p class="muted">Informações úteis para interpretar as medições.</p>
                </div>
            </div>
            <div class="card">
                <h2>Regras atuais</h2>
                <ul class="list">
                    <li><b>pH normal:</b> 7,0 a 7,4.</li>
                    <li><b>Temperatura normal:</b> 24 °C a 28 °C.</li>
                    <li>Fora dessas faixas, o dashboard sinaliza a leitura para atenção.</li>
                    <li>Os alertas são calculados no navegador a partir da leitura recebida do Firebase.</li>
                </ul>
            </div>
        </main>
    </div>
    <script src="js/app.js"></script>
</body>
</html>