<?php
$titulo = "Contato | Aqua Track";
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST["nome"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $assunto = trim($_POST["assunto"] ?? "");
    $texto = trim($_POST["mensagem"] ?? "");

    if ($nome === "" || $email === "" || $assunto === "" || $texto === "") {
        $mensagem = "Preencha todos os campos.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mensagem = "Digite um e-mail válido.";
    } else {
        $mensagem = "Mensagem recebida. No ambiente local do TCC, o envio por e-mail depende da configuração do servidor.";
    }
}

require "includes/header.php";
?>
<main class="public-section">
    <div class="section-title">
        <h1>Contato</h1>
        <p>Envie uma mensagem para a equipe do projeto.</p>
    </div>

    <form class="card form" method="POST">
        <?php if ($mensagem): ?>
            <div class="message"><?= htmlspecialchars($mensagem) ?></div>
        <?php endif; ?>

        <div class="field">
            <label>Nome</label>
            <input name="nome" required>
        </div>

        <div class="field">
            <label>E-mail</label>
            <input type="email" name="email" required>
        </div>

        <div class="field">
            <label>Assunto</label>
            <input name="assunto" required>
        </div>

        <div class="field">
            <label>Mensagem</label>
            <textarea name="mensagem" required></textarea>
        </div>

        <button class="btn" type="submit">Enviar mensagem</button>
    </form>
</main>
<?php require "includes/footer.php"; ?>