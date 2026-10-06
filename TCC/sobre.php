<?php
$titulo = "Sobre | Aqua Track";
require "includes/header.php";
?>
<main class="public-section">
    <div class="section-title">
        <h1>Sobre o Aqua Track</h1>
        <p>Monitoramento simples e acessível da qualidade da água.</p>
    </div>
    <div class="grid grid-2">
        <article class="card">
            <h2>O projeto</h2>
            <p class="muted">O Aqua Track utiliza sensores para coletar dados da água e apresentar as informações de forma clara em um painel web.</p>
        </article>
        <article class="card">
            <h2>Tecnologias</h2>
            <p class="muted">Arduino UNO, ESP32, sensor de pH, sensor de temperatura, Firebase Realtime Database, PHP, MySQL, HTML, CSS e JavaScript.</p>
        </article>
        <article class="card">
            <h2>Objetivo</h2>
            <p class="muted">Facilitar o acompanhamento dos parâmetros da água e indicar quando uma leitura merece atenção.</p>
        </article>
        <article class="card">
            <h2>Como funciona</h2>
            <p class="muted">O Arduino realiza a leitura, o ESP32 envia os dados ao Firebase e o site escuta as alterações em tempo real.</p>
        </article>
    </div>
</main>
<?php require "includes/footer.php"; ?>