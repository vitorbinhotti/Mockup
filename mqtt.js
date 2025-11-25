import { MQTT_CONFIG } from "./.env/secrets.js";

// Client MQTT WebSocket
const client = mqtt.connect(MQTT_CONFIG.host, {
  username: MQTT_CONFIG.username,
  password: MQTT_CONFIG.password,
  clean: true,
  connectTimeout: 4000,
  reconnectPeriod: 1000
});

client.on("connect", () => {
  console.log("🔗 Conectado ao HiveMQ!");

  // Se inscreve no tópico
  client.subscribe("stopgo/alertas", (err) => {
    if (err) console.error("Erro ao inscrever:", err);
    else console.log("📡 Inscrito em stopgo/alertas");
  });
});

client.on("message", (topic, message) => {
  console.log(`📩 Mensagem recebida (${topic}):`, message.toString());
});

// Função para publicar mensagem
export function enviarMensagem() {
  client.publish("stopgo/alertas", "Mensagem enviada do site!");
  console.log("📤 Mensagem enviada!");
}
