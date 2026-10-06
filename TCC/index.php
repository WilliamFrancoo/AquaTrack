<?php $titulo="Aqua Track | Monitoramento da água"; require "includes/header.php"; ?>
<main class="hero">
    <p class="live">● MONITORAMENTO EM TEMPO REAL</p>
    <h1>Conheça a qualidade da água com o <span>Aqua Track</span>.</h1>
    <p>Um sistema desenvolvido para acompanhar pH e temperatura da água, receber dados de sensores e facilitar a identificação de alterações.</p>
    <a class="btn" href="<?= usuarioLogado() ? 'dashboard.php' : 'login.php' ?>">Acessar monitoramento</a>
    <a class="btn-outline" href="sobre.php">Conhecer o projeto</a>
</main>
<section class="public-section">
    <div class="grid grid-3">
        <article class="card"><h3>pH em tempo real</h3><p class="muted">Leitura recebida do sensor e atualizada pelo Firebase.</p></article>
        <article class="card"><h3>Temperatura</h3><p class="muted">Acompanhamento da temperatura da água junto ao pH.</p></article>
        <article class="card"><h3>Histórico</h3><p class="muted">Visualização das medições registradas para acompanhar mudanças.</p></article>
    </div>
</section>
<?php require "includes/footer.php"; ?>