<?php
require "includes/auth.php";
exigirLogin();

$titulo = "Medições | Aqua Track";
$pagina = "medicoes.php";
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
                    <h1>Medições</h1>
                    <p class="muted">Leitura atual recebida do Firebase.</p>
                </div>
                <span class="live">● Tempo real</span>
            </div>
            <div class="grid grid-2">
                <div class="card measure-big">
                    <small>pH</small>
                    <div id="ph" class="value">--</div>
                    <span id="statusPh" class="badge">--</span>
                </div>
                <div class="card measure-big">
                    <small>Temperatura</small>
                    <div id="temp" class="value">--</div>
                    <span id="statusTemp" class="badge">--</span>
                </div>
            </div>
            <div class="card" style="margin-top: 20px">
                <h3>Dados recebidos</h3>
                <table>
                    <tbody>
                        <tr>
                            <th>Sensor</th>
                            <td id="sensor">--</td>
                        </tr>
                        <tr>
                            <th>Data e hora</th>
                            <td id="data">--</td>
                        </tr>
                        <tr>
                            <th>Identificação da leitura</th>
                            <td id="id">--</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <script src="js/app.js"></script>
    <script>
        iniciarLeituraAtual((d) => {
            if (!d) return;

            document.getElementById("ph").textContent = numero(d.ph, 2);
            document.getElementById("temp").textContent = numero(d.temperatura, 1) + " °C";
            document.getElementById("sensor").textContent = d.sensor || "ESP32";
            document.getElementById("data").textContent = dataLeitura(d.timestamp);
            document.getElementById("id").textContent = d.id || "--";

            const [p, pc] = statusPH(d.ph);
            const [t, tc] = statusTemperatura(d.temperatura);

            document.getElementById("statusPh").textContent = p;
            document.getElementById("statusPh").className = "badge " + pc;

            document.getElementById("statusTemp").textContent = t;
            document.getElementById("statusTemp").className = "badge " + tc;
        });
    </script>
</body>
</html>