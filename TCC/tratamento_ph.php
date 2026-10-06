<?php
require "includes/auth.php";
exigirLogin();

$titulo = "Tratamento de pH | Aqua Track";
$pagina = "tratamento_ph.php";
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
                    <h1>Tratamento de pH</h1>
                    <p class="muted">Informações úteis para interpretar as medições.</p>
                </div>
            </div>
            <div class="grid grid-2">
                <article class="card">
                    <h2>pH abaixo de 7,0</h2>
                    <p class="muted">A água está mais ácida que a faixa definida pelo projeto. A correção deve ser feita gradualmente e conforme a finalidade da água.</p>
                </article>
                <article class="card">
                    <h2>pH entre 7,0 e 7,4</h2>
                    <p class="muted">Considerado normal para os critérios adotados pelo Aqua Track.</p>
                </article>
                <article class="card">
                    <h2>pH acima de 7,4</h2>
                    <p class="muted">A água está mais alcalina que a faixa definida. Avalie a causa antes de realizar qualquer correção.</p>
                </article>
                <article class="card">
                    <h2>Importante</h2>
                    <p class="muted">Os procedimentos de tratamento variam conforme piscina, aquário, lago ou outra aplicação. O sistema orienta sobre a leitura, mas não substitui avaliação técnica.</p>
                </article>
            </div>
        </main>
    </div>
    <script src="js/app.js"></script>
</body>
</html>