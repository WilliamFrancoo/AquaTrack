<?php
require "includes/auth.php";
exigirLogin();

$titulo = "Histórico | Aqua Track";
$pagina = "historico.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $titulo ?></title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://www.gstatic.com/firebasejs/10.12.2/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.12.2/firebase-database-compat.js"></script>
    <script src="js/firebase-config.js"></script>
    <script src="js/firebase.js"></script>
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
                    <h1>Histórico de medições</h1>
                    <p class="muted">Registros enviados pelo ESP32 ao Firebase.</p>
                </div>
            </div>
            <div class="card">
                <div style="overflow: auto">
                    <table>
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>pH</th>
                                <th>Temperatura</th>
                                <th>Status</th>
                                <th>Sensor</th>
                            </tr>
                        </thead>
                        <tbody id="tabela">
                            <tr>
                                <td colspan="5">Carregando...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <script src="js/app.js"></script>
    <script>
        iniciarHistorico((dados) => {
            const tabela = document.getElementById("tabela");
            if (!dados.length) {
                tabela.innerHTML = "<tr><td colspan='5'>Nenhuma medição encontrada.</td></tr>";
                return;
            }

            tabela.innerHTML = dados.map(d => {
                const [p, pc] = statusPH(d.ph);
                const [t, tc] = statusTemperatura(d.temperatura);
                const status = (pc === "ok" && tc === "ok") 
                    ? "Normal" 
                    : (p !== "Normal" ? "Atenção ao pH" : "Atenção à temperatura");

                return `<tr>
                    <td>${dataLeitura(d.timestamp)}</td>
                    <td>${numero(d.ph, 2)}</td>
                    <td>${numero(d.temperatura, 1)} °C</td>
                    <td class="${status === "Normal" ? "ok" : "alerta"}">${status}</td>
                    <td>${d.sensor || "ESP32"}</td>
                </tr>`;
            }).join("");
        });
    </script>
</body>
</html>