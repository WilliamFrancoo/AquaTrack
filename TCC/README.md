# Aqua Track — GitHub Pages + Firebase

Esta versão é **100% estática no GitHub Pages**. Não usa PHP, MySQL, XAMPP ou localhost.

## Arquitetura

Arduino UNO → ESP32 → Firebase Realtime Database → GitHub Pages

- HTML/CSS: interface
- JavaScript: lógica do site
- Firebase Authentication: cadastro/login
- Firebase Realtime Database: medições em tempo real e histórico
- GitHub Pages: hospedagem pública do site

## Publicação

1. Crie um repositório no GitHub.
2. Envie todo o conteúdo desta pasta para o repositório.
3. Em Settings → Pages, escolha `Deploy from a branch`, branch `main` e pasta `/ (root)`.
4. Abra a URL gerada pelo GitHub Pages.

## Firebase

Edite `js/firebase-config.js` com a configuração do seu aplicativo Web Firebase.

No Firebase Authentication, habilite **Email/Password**.
No Realtime Database, aplique as regras de `firebase.rules.json`.

O ESP32 deve enviar:

`leituras/atual` com `ph`, `temperatura`, `timestamp`, `sensor` e opcionalmente `id`.

E os registros históricos em:

`leituras/historico/<id>`

## Observação importante

A configuração Web do Firebase pode aparecer no JavaScript do site. A proteção real é feita pelas **Security Rules** do Firebase. Não coloque chaves privadas ou service accounts no repositório.
