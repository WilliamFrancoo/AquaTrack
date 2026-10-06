<aside class="sidebar">
    <a class="side-logo" href="index.php">💧 Aqua <b>Track</b></a>
    <div class="side-user">Olá, <?= htmlspecialchars(nomeUsuario()) ?></div>
    <nav class="side-nav">
        <a class="<?= $pagina === 'dashboard.php' ? 'ativo' : '' ?>" href="dashboard.php">Dashboard</a>
        <a class="<?= $pagina === 'medicoes.php' ? 'ativo' : '' ?>" href="medicoes.php">Medições</a>
        <a class="<?= $pagina === 'historico.php' ? 'ativo' : '' ?>" href="historico.php">Histórico</a>
        <a class="<?= $pagina === 'tratamento_ph.php' ? 'ativo' : '' ?>" href="tratamento_ph.php">Tratamento de pH</a>
        <a class="<?= $pagina === 'tratamento_temperatura.php' ? 'ativo' : '' ?>" href="tratamento_temperatura.php">Tratamento de temperatura</a>
        <a class="<?= $pagina === 'alertas.php' ? 'ativo' : '' ?>" href="alertas.php">Alertas</a>
        <a href="contato.php">Contato</a>
    </nav>
    <a class="logout" href="logout.php">Sair</a>
</aside>
