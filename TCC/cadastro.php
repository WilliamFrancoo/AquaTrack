<?php
require "conexao.php";

$erro = "";
$ok = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST["nome"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $senha = $_POST["senha"] ?? "";
    $conf = $_POST["confirmar"] ?? "";

    if ($nome === "" || $email === "" || $senha === "" || $conf === "") {
        $erro = "Preencha todos os campos.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = "Digite um e-mail válido.";
    } elseif ($senha !== $conf) {
        $erro = "As senhas não são iguais.";
    } elseif (strlen($senha) < 6) {
        $erro = "A senha deve ter pelo menos 6 caracteres.";
    } else {
        $stmt = mysqli_prepare($conexao, "SELECT id FROM usuarios WHERE email = ?");
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        if (mysqli_num_rows(mysqli_stmt_get_result($stmt))) {
            $erro = "Este e-mail já está cadastrado.";
        } else {
            $hash = password_hash($senha, PASSWORD_DEFAULT);
            $stmt = mysqli_prepare($conexao, "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "sss", $nome, $email, $hash);
            mysqli_stmt_execute($stmt);
            $ok = "Cadastro realizado. Agora faça login.";
        }
    }
}

$titulo = "Cadastro | Aqua Track";
require "includes/header.php";
?>
<main class="public-section">
    <form class="card form" method="POST">
        <div class="section-title">
            <h1>Criar conta</h1>
            <p>Cadastre-se para acessar o sistema.</p>
        </div>

        <?php if ($erro): ?>
            <div class="message"><?= htmlspecialchars($erro) ?></div>
        <?php endif; ?>

        <?php if ($ok): ?>
            <div class="message"><?= htmlspecialchars($ok) ?></div>
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
            <label>Senha</label>
            <input type="password" name="senha" minlength="6" required>
        </div>

        <div class="field">
            <label>Confirmar senha</label>
            <input type="password" name="confirmar" minlength="6" required>
        </div>

        <button class="btn" type="submit">Cadastrar</button>
    </form>
</main>
<?php require "includes/footer.php"; ?>