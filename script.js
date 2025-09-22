function abrirMenu() {
  const nav = document.querySelector("nav");
  if (nav) nav.classList.add("ativo");
}

function fecharMenu() {
  const nav = document.querySelector("nav");
  if (nav) nav.classList.remove("ativo");
}

function mostrarAba(abaId) {
  const abas = document.querySelectorAll('.conteudo-aba');
  abas.forEach(div => div.style.display = 'none');

  const botoes = document.querySelectorAll('.aba');
  botoes.forEach(botao => botao.classList.remove('ativa'));

  const aba = document.getElementById(abaId);
  if (aba) aba.style.display = 'block';

  if (event && event.target) {
    event.target.classList.add('ativa');
  }
}

function mostrarAbaRelatorio(abaId, botaoClicado) {
  const abas = document.querySelectorAll('.conteudo-aba-relatorio');
  abas.forEach(div => div.style.display = 'none');

  const botoes = document.querySelectorAll('.tab-relatorio .aba');
  botoes.forEach(botao => botao.classList.remove('ativa'));

  const aba = document.getElementById(abaId);
  if (aba) aba.style.display = 'block';

  if (botaoClicado) botaoClicado.classList.add('ativa');
}

function mostrarSenha() {
  const inputPass = document.getElementById('senha');
  const btnShowPass = document.getElementById('toggleSenha');
  const icon = btnShowPass.querySelector('i');

  if (inputPass && btnShowPass && icon) {
    if (inputPass.type === 'password') {
      inputPass.type = 'text';
      icon.classList.remove('bi-eye-fill');
      icon.classList.add('bi-eye-slash');
    } else {
      inputPass.type = 'password';
      icon.classList.remove('bi-eye-slash');
      icon.classList.add('bi-eye-fill');
    }
  }
}

document.addEventListener('DOMContentLoaded', function () {
  const nomeArmazenado = localStorage.getItem('nomeUsuario');
  const nomeUsuarioElement = document.getElementById('nomeUsuario');
  if (nomeUsuarioElement && nomeArmazenado) {
    nomeUsuarioElement.textContent = nomeArmazenado;
  }

  const btnMarcarComoLido = document.querySelector('.btn-alertas');
  const btnDesativarNotificacoes = document.querySelectorAll('.btn-alertas')[1];
  let notificacoesAtivas = true;

  if (btnMarcarComoLido) {
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
  }

  if (btnDesativarNotificacoes) {
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
  }

  const horariosEstacoes = {
    '1': {
      nome: "Estação A",
      horarios: [
        "07:10", "07:14", "07:20", "08:30", "08:37",
        "08:44", "09:33", "09:45", "09:54", "10:11",
        "10:30", "10:53", "11:13", "11:24", "11:40",
        "12:03", "12:23", "12:43", "13:07", "13:30",
        "13:47", "14:10", "14:27", "14:40", "15:05",
        "15:25", "15:46", "16:03", "16:36", "16:50",
        "17:12", "17:32", "17:43"
      ]
    },
    '2': {
      nome: "Estação B",
      horarios: [
        "06:30", "07:00", "07:30", "08:00", "08:30",
        "09:00", "09:30", "10:00", "10:30", "11:00",
        "11:30", "12:00", "12:30", "13:00", "13:30",
        "14:00", "14:30", "15:00", "15:30", "16:00",
        "16:30", "17:00", "17:30", "18:00"
      ]
    },
    '3': {
      nome: "Estação C",
      horarios: [
        "05:45", "06:15", "06:45", "07:15", "07:45",
        "08:15", "08:45", "09:15", "09:45", "10:15",
        "10:45", "11:15", "11:45", "12:15", "12:45",
        "13:15", "13:45", "14:15", "14:45", "15:15",
        "15:45", "16:15", "16:45", "17:15"
      ]
    }
  };

  const selectEstacao = document.getElementById('stationSelect');
  const dateInput = document.getElementById('datePicker');
  const horariosContainer = document.getElementById('horariosContainer');

  function criarElementosHorario(horarios) {
    const container = document.createElement('div');
    container.className = 'horarios-container';

    const dataElement = document.createElement('div');
    dataElement.className = 'data-horario';
    dataElement.textContent = dateInput?.value || 'Horários Disponíveis';
    container.appendChild(dataElement);

    horarios.forEach((horario, index) => {
      const div = document.createElement('div');
      div.className = `fundo${index % 2 === 0 ? '1' : '2'}`;
      div.textContent = horario;
      container.appendChild(div);
    });

    return container;
  }

  function atualizarHorarios() {
    if (!selectEstacao || !horariosContainer) return;

    const estacaoId = selectEstacao.value;
    if (!estacaoId) return;

    const estacao = horariosEstacoes[estacaoId];
    if (!estacao) return;

    horariosContainer.innerHTML = '';
    horariosContainer.appendChild(criarElementosHorario(estacao.horarios));
  }

  if (selectEstacao && dateInput && horariosContainer) {
    selectEstacao.addEventListener('change', atualizarHorarios);
    dateInput.addEventListener('change', atualizarHorarios);
    atualizarHorarios();
  }
});