AQUA TRACK — VERSÃO OTIMIZADA

1. Coloque a pasta em C:\xampp\htdocs\AquaTrack.
2. Inicie Apache e MySQL no XAMPP.
3. Importe sql/aquatrack.sql no phpMyAdmin.
4. Abra js/firebase-config.js e coloque os dados do seu projeto Firebase.
5. No Firebase Realtime Database, use a estrutura:

leituras
  atual
    ph: 7.2
    temperatura: 26.4
    timestamp: 1760000000000
    sensor: "ESP32"
    id: "leitura-001"
  historico
    leitura-001
      ph: 7.2
      temperatura: 26.4
      timestamp: 1760000000000
      sensor: "ESP32"

6. O ESP32 deve atualizar "leituras/atual" e criar registros em "leituras/historico".
7. O site apenas lê os dados do Firebase. Isso evita que visitantes alterem as medições pelo navegador.

PÁGINAS:
index.php
sobre.php
login.php
cadastro.php
dashboard.php
medicoes.php
historico.php
tratamento_ph.php
tratamento_temperatura.php
alertas.php
contato.php

A antiga estrutura tinha vários links para páginas inexistentes, CSS duplicados e arquivos de teste. Eles foram removidos nesta versão.

SEGURANÇA:
Não coloque senha ou chave privada do Firebase no JavaScript. A configuração Web do Firebase pode aparecer no front-end; a proteção real deve estar nas regras do Realtime Database e na autenticação usada pelo ESP32.

PARÂMETROS DO PROJETO:
pH normal: 7,0–7,4
Temperatura normal: 24–28 °C
