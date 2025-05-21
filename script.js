function abrirMenu() {
    document.querySelector("nav").classList.add("ativo");
}

function fecharMenu() {
    document.querySelector("nav").classList.remove("ativo");
}

function mostrarAba(abaId) {
    const abas = document.querySelectorAll('.conteudo-aba');
    abas.forEach(div => div.style.display = 'none');
  
    const botoes = document.querySelectorAll('.aba');
    botoes.forEach(botao => botao.classList.remove('ativa'));
  
    document.getElementById(abaId).style.display = 'block';
  
    event.target.classList.add('ativa');
  }

  function mostrarAba(abaId) {
    const abas = document.querySelectorAll('.conteudo-aba-relatorio');
    abas.forEach(div => div.style.display = 'none');
  
    const botoes = document.querySelectorAll('.aba');
    botoes.forEach(botao => botao.classList.remove('ativa'));
  
    document.getElementById(abaId).style.display = 'block';
  
    event.target.classList.add('ativa');
  }