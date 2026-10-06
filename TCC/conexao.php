<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "aquatrack";

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

if (!$conexao) {
    die("Erro na conexão com o banco de dados.");
}

mysqli_set_charset($conexao, "utf8mb4");
?>