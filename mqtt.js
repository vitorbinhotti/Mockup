import { MQTT_CONFIG } from "./.env/secrets.js";

const client = mqtt.connect(MQTT_CONFIG.host, {
  username: MQTT_CONFIG.username,
  password: MQTT_CONFIG.password,
  clean: true,
  connectTimeout: 4000,
  reconnectPeriod: 1000
});

const conexao = document.getElementById("statusConexao");
const inscricao = document.getElementById("statusInscricao");
const msgRecebida = document.getElementById("mensagemRecebida");
const msgEnviada = document.getElementById("mensagemEnviada");
const botao = document.getElementById("btn");

function setStatus(element, texto, classe) {
  element.innerText = texto;
  element.className = "status " + classe;
}

client.on("connect", () => {
  console.log("🔗 Conectado ao HiveMQ!");

  setStatus(conexao, "Conectado ao HiveMQ!", "ok");

  client.subscribe("stopgo/alertas", (err) => {
    if (err) {
      setStatus(inscricao, "Erro ao se inscrever no tópico", "erro");
      console.error("Erro ao inscrever:", err);
    } else {
      setStatus(inscricao, "Inscrito no tópico stopgo/alertas", "ok");
      console.log("📡 Inscrito em stopgo/alertas");
    }
  });
});

client.on("message", (topic, message) => {
  console.log(`📩 Mensagem recebida (${topic}):`, message.toString());
  setStatus(msgRecebida, message.toString(), "recebido");
});

export function enviarMensagem() {
  const btn = document.getElementById("btn");
  if (btn) {
    btn.classList.add("carregando");
    btn.disabled = true;
    btn.textContent = "Enviando...";
  }
  client.publish("stopgo/alertas", "Mensagem enviada do site!", {}, () => {
    if (btn) {
      setTimeout(() => {
        btn.classList.remove("carregando");
        btn.disabled = false;
        btn.textContent = "Enviar mensagem MQTT";
      }, 1200);
    }
  });

  setStatus(msgEnviada, "Mensagem enviada do site!", "enviado");

  console.log("📤 Mensagem enviada!");
}
