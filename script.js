function abrirMenu() {
    document.querySelector("nav").classList.add("ativo");
}

function fecharMenu() {
    document.querySelector("nav").classList.remove("ativo");
}

function mostrarAba(abaId) {
    // Oculta todas as abas
    const abas = document.querySelectorAll('.conteudo-aba');
    abas.forEach(div => div.style.display = 'none');
  
    // Remove a classe 'ativa' de todos os botões
    const botoes = document.querySelectorAll('.aba');
    botoes.forEach(botao => botao.classList.remove('ativa'));
  
    // Mostra a aba clicada
    document.getElementById(abaId).style.display = 'block';
  
    // Adiciona a classe 'ativa' ao botão clicado
    event.target.classList.add('ativa');
  }