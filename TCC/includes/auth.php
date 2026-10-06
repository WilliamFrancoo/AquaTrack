<?php
session_start();

function exigirLogin() {
    if (empty($_SESSION["usuario_id"])) {
        header("Location: login.php");
        exit;
    }
}

function usuarioLogado() {
    return !empty($_SESSION["usuario_id"]);
}

function nomeUsuario() {
    return $_SESSION["usuario_nome"] ?? "Usuário";
}
?>