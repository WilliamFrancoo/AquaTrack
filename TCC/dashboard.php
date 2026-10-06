<?php
require "includes/auth.php";
exigirLogin();

$titulo = "Dashboard | Aqua Track";
$pagina = "index.php";
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
                    <h1>Dashboard</h1>
                    <p class="muted">Acompanhamento da água em tempo real.</p>
                </div>
                <span class="live">● <span id="conexao">Conectando...</span></span>
            </div>
            <section class="stats">
                <div class="card measure-big">
                    <small>pH atual</small>
                    <div class="value" id="ph">--</div>
                    <span id="statusPh" class="badge">Aguardando</span>
                </div>
                <div class="card measure-big">
                    <small>Temperatura</small>
                    <div class="value" id="temperatura">--</div>
                    <span id="statusTemp" class="badge">Aguardando</span>
                </div>
                <div class="card">
                    <small class="muted">Última leitura</small>
                    <div class="value" id="hora" style="font-size: 22px">--</div>
                    <span class="muted">Firebase Realtime Database</span>
                </div>
                <div class="card">
                    <small class="muted">Status do sensor</small>
                    <div class="value ok" id="sensor" style="font-size: 22px">Aguardando</div>
                    <span class="muted" id="mensagem">--</span>
                </div>
            </section>
            <div class="grid grid-2" style="margin-top: 20px">
                <div class="card">
                    <h3>pH</h3>
                    <p class="muted">Faixa usada no projeto: 7,0 a 7,4.</p>
                    <div class="bar">
                        <span id="barraPh"></span>
                    </div>
                </div>
                <div class="card">
                    <h3>Temperatura</h3>
                    <p class="muted">Faixa usada no projeto: 24 °C a 28 °C.</p>
                    <div class="bar">
                        <span id="barraTemp"></span>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="js/app.js"></script>
    <script>
        iniciarLeituraAtual((d, erro) => {
            const con = document.getElementById("conexao");
            if (erro) {
                con.textContent = "Erro na conexão";
                return;
            }
            if (!d) {
                con.textContent = "Sem leitura";
                return;
            }

            con.textContent = "Sensor conectado";
            document.getElementById("ph").textContent = numero(d.ph, 2);
            document.getElementById("temperatura").textContent = numero(d.temperatura, 1) + " °C";
            document.getElementById("hora").textContent = dataLeitura(d.timestamp);

            const [sp, cp] = statusPH(d.ph);
            const [st, ct] = statusTemperatura(d.temperatura);

            document.getElementById("statusPh").textContent = sp;
            document.getElementById("statusPh").className = "badge " + cp;

            document.getElementById("statusTemp").textContent = st;
            document.getElementById("statusTemp").className = "badge " + ct;

            document.getElementById("sensor").textContent = "Conectado";
            document.getElementById("mensagem").textContent = d.sensor || "ESP32";

            document.getElementById("barraPh").style.width = Math.max(0, Math.min(100, (Number(d.ph) / 14) * 100)) + "%";
            document.getElementById("barraTemp").style.width = Math.max(0, Math.min(100, ((Number(d.temperatura) - 10) / 30) * 100)) + "%";
        });
    </script>
</body>
</html>