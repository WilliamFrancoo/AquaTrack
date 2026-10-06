<?php
require_once __DIR__ . "/auth.php";
$pagina = basename($_SERVER["PHP_SELF"]);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($titulo ?? "Aqua Track") ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header class="topbar">
    <a class="logo" href="index.php"><span>💧</span> Aqua <b>Track</b></a>
    <nav>
        <a class="<?= $pagina === 'index.php' ? 'ativo' : '' ?>" href="index.php">Início</a>
        <a class="<?= $pagina === 'sobre.php' ? 'ativo' : '' ?>" href="sobre.php">Sobre</a>
        <a class="<?= $pagina === 'contato.php' ? 'ativo' : '' ?>" href="contato.php">Contato</a>
        <?php if (usuarioLogado()): ?>
            <a class="btn" href="dashboard.php">Dashboard</a>
        <?php else: ?>
            <a class="btn" href="login.php">Entrar</a>
        <?php endif; ?>
    </nav>
</header>
