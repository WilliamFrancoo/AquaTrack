<?php
require "includes/auth.php";
exigirLogin();

$titulo = "Tratamento de temperatura | Aqua Track";
$pagina = "tratamento_temperatura.php";
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
                    <h1>Tratamento de temperatura</h1>
                    <p class="muted">Informações úteis para interpretar as medições.</p>
                </div>
            </div>
            <div class="grid grid-2">
                <article class="card">
                    <h2>Abaixo de 24 °C</h2>
                    <p class="muted">A temperatura está abaixo da faixa configurada. Verifique o ambiente, o equipamento e a aplicação da água.</p>
                </article>
                <article class="card">
                    <h2>24 °C a 28 °C</h2>
                    <p class="muted">Considerado normal pelos parâmetros definidos no projeto.</p>
                </article>
                <article class="card">
                    <h2>Acima de 28 °C</h2>
                    <p class="muted">A temperatura está acima da faixa. Verifique exposição ao calor, circulação e condições do reservatório.</p>
                </article>
                <article class="card">
                    <h2>Importante</h2>
                    <p class="muted">A faixa adequada depende do uso da água e do organismo ou ambiente monitorado.</p>
                </article>
            </div>
        </main>
    </div>
    <script src="js/app.js"></script>
</body>
</html>