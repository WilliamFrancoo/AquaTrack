# Aqua Track - Monitoramento Inteligente de pH e Temperatura da Água

Sistema IoT em tempo real para monitoramento, análise de qualidade e controle de parâmetros de pH e temperatura em reservatórios e piscinas, desenvolvido como Trabalho de Conclusão de Curso (TCC).

## 🚀 Arquitetura do Sistema
1. **Hardware (IoT / Firmware):**
   - **ESP32** (Wi-Fi + processamento)
   - Sensor de pH analógico (E-201-C / pH-4502C)
   - Sensor de temperatura impermeável (DS18B20 OneWire)
   - Código localizado em `firmware/esp32_aquatrack/`
2. **Nuvem & Banco em Tempo Real:**
   - **Firebase Realtime Database** para sincronização instantânea
   - **Firebase Authentication** para controle de acesso de usuários
3. **Frontend (Dashboard & Web):**
   - HTML5, CSS3, JavaScript modular (sem PHP, 100% compatível com GitHub Pages)
   - Gráficos SVG interativos e em tempo real
   - Alertas com popup dinâmico quando o pH sai do padrão recomendado (7,0 a 7,4)
   - Gerador de relatórios em PDF com histórico completo

## 📁 Estrutura do Projeto
- `css/style.css`: Estilização unificada do portal e dashboard
- `js/`: Lógica de autenticação, conexão Firebase e controle do dashboard
- `firmware/`: Sketches para Arduino Uno e ESP32
- `dashboard.html`: Painel principal de medições em tempo real
- `tratamento_ph.html`: Guia técnico de correção de pH alto e baixo
- `historico.html`: Histórico detalhado de leituras

