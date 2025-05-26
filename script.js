function mostrarAba(abaId, botaoClicado) {
  const abas = document.querySelectorAll('.conteudo-aba');
  abas.forEach(div => div.style.display = 'none');

  const botoes = document.querySelectorAll('.aba');
  botoes.forEach(botao => botao.classList.remove('ativa'));

  document.getElementById(abaId).style.display = 'block';
  botaoClicado.classList.add('ativa');
}

document.addEventListener('DOMContentLoaded', function () {
  const btnMarcarComoLido = document.querySelectorAll('.btn-alertas')[0];
  const btnDesativarNotificacoes = document.querySelectorAll('.btn-alertas')[1];
  let notificacoesAtivas = true;

  btnMarcarComoLido.addEventListener('click', function () {
    const notificacoesImportantes = document.querySelectorAll('.com-noti');
    notificacoesImportantes.forEach(function (noti) {
      noti.classList.remove('com-noti');
      noti.classList.add('sem-noti');

      const img = noti.querySelector('img');
      if (img) {
        img.src = 'images/sino-sem-not.png';
        img.classList.remove('img-alertas-noti');
        img.classList.add('img-alertas');
      }
    });
  });

  btnDesativarNotificacoes.addEventListener('click', function () {
    const todasNotificacoes = document.querySelectorAll('.notificacoes > div');

    if (notificacoesAtivas) {
      todasNotificacoes.forEach(noti => {
        noti.style.display = 'none';
      });
      btnDesativarNotificacoes.innerHTML = 'Ativar notificações <img src="images/sino-sem-not.png">';
    } else {
      todasNotificacoes.forEach(noti => {
        noti.style.display = 'flex';
      });
      btnDesativarNotificacoes.innerHTML = 'Desativar notificações <img src="images/desativar-noti.png">';
    }

    notificacoesAtivas = !notificacoesAtivas;
  });
});