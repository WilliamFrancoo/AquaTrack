<?php
session_start();
require "conexao.php";

$erro = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"] ?? "");
    $senha = $_POST["senha"] ?? "";

    if ($email === "" || $senha === "") {
        $erro = "Preencha todos os campos.";
    } else {
        $stmt = mysqli_prepare($conexao, "SELECT id, nome, email, senha FROM usuarios WHERE email = ?");
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $r = mysqli_stmt_get_result($stmt);
        $u = mysqli_fetch_assoc($r);

        if ($u && password_verify($senha, $u["senha"])) {
            $_SESSION["usuario_id"] = $u["id"];
            $_SESSION["usuario_nome"] = $u["nome"];
            $_SESSION["usuario_email"] = $u["email"];
            header("Location: dashboard.php");
            exit;
        }

        $erro = "E-mail ou senha incorretos.";
    }
}

$titulo = "Entrar | Aqua Track";
require "includes/header.php";
?>
<main class="public-section">
    <form class="card form" method="POST">
        <div class="section-title">
            <h1>Entrar</h1>
            <p>Acesse o monitoramento.</p>
        </div>

        <?php if ($erro): ?>
            <div class="message"><?= htmlspecialchars($erro) ?></div>
        <?php endif; ?>

        <div class="field">
            <label>E-mail</label>
            <input type="email" name="email" required>
        </div>

        <div class="field">
            <label>Senha</label>
            <input type="password" name="senha" required>
        </div>

        <button class="btn" type="submit">Entrar</button>
        <p class="muted" style="margin-top: 15px">
            Ainda não possui conta? <a href="cadastro.php" class="ok">Cadastre-se</a>
        </p>
    </form>
</main>
<?php require "includes/footer.php"; ?>