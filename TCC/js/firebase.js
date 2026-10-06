const firebaseApp = firebase.initializeApp(firebaseConfig);
const banco = firebase.database();

const CAMINHO_ATUAL = "leituras/atual";
const CAMINHO_HISTORICO = "leituras/historico";

function iniciarLeituraAtual(callback) {
    banco.ref(CAMINHO_ATUAL).on("value", snapshot => {
        callback(snapshot.exists() ? snapshot.val() : null);
    }, erro => {
        console.error("Firebase:", erro);
        callback(null, erro);
    });
}

function iniciarHistorico(callback) {
    banco.ref(CAMINHO_HISTORICO)
        .orderByChild("timestamp")
        .on("value", snapshot => {
            const dados = [];
            snapshot.forEach(item => dados.push({ id: item.key, ...item.val() }));
            dados.reverse();
            callback(dados);
        }, erro => {
            console.error("Firebase:", erro);
            callback([], erro);
        });
}

function statusPH(ph) {
    ph = Number(ph);
    if (ph >= 7 && ph <= 7.4) return ["Normal", "ok"];
    if (ph < 7) return ["Abaixo do esperado", "alerta"];
    return ["Acima do esperado", "perigo"];
}

function statusTemperatura(temp) {
    temp = Number(temp);
    if (temp >= 24 && temp <= 28) return ["Normal", "ok"];
    if (temp < 24) return ["Abaixo do esperado", "alerta"];
    return ["Acima do esperado", "perigo"];
}

function numero(valor, casas = 1) {
    const n = Number(valor);
    return Number.isFinite(n) ? n.toFixed(casas).replace(".", ",") : "--";
}

function dataLeitura(valor) {
    if (!valor) return "--";
    const data = new Date(Number(valor));
    if (Number.isNaN(data.getTime())) return "--";
    return data.toLocaleString("pt-BR");
}
