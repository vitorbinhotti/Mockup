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

function mostrarAbaRelatorio(abaId, botaoClicado) {
  const abas = document.querySelectorAll('.conteudo-aba-relatorio');
  abas.forEach(div => div.style.display = 'none');

  const botoes = document.querySelectorAll('.tab-relatorio .aba');
  botoes.forEach(botao => botao.classList.remove('ativa'));

  document.getElementById(abaId).style.display = 'block';
  botaoClicado.classList.add('ativa');
}

document.addEventListener('DOMContentLoaded', function () {
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

  const selectEstacao = document.querySelector('.select');
  const containerHorarios = document.querySelector('.informacao3');
  const dateInput = document.querySelector('input[type="date"]');

  function criarElementosHorario(horarios) {
    const container = document.createElement('div');
    container.className = 'horarios-container';

    const dataElement = document.createElement('div');
    dataElement.className = 'data-horario';
    dataElement.textContent = dateInput.value || 'Horários Disponíveis';
    container.appendChild(dataElement);

    horarios.forEach((horario, index) => {
      const div = document.createElement('div');
      div.className = `fundo${index % 2 === 0 ? '1' : '2'}`;
      div.textContent = horario;
      container.appendChild(div);
    });

    return container;
  }



  document.getElementById("loginForm").addEventListener("submit", function (e) {
    e.preventDefault();

    const senha = document.getElementById("senha").value;
    const mensagem = document.getElementById("mensagemSenha");

    const senhaForte = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&+=!]).{8,}$/;

    if (!senhaForte.test(senha)) {
      mensagem.textContent = "A senha deve ter no mínimo 8 caracteres, incluindo maiúsculas, minúsculas, número e caractere especial.";
    } else {
      mensagem.style.color = "green";
      mensagem.textContent = "Senha forte!";
      windows.location.href = " entrar.html";

    }
  });

  function atualizarHorarios() {
    const estacaoId = selectEstacao.value;
    const estacao = horariosEstacoes[estacaoId];

    const containerAntigo = document.querySelector('.horarios-container');
    if (containerAntigo) containerAntigo.remove();

    const novosHorarios = criarElementosHorario(estacao.horarios);
    containerHorarios.appendChild(novosHorarios);
  }

  selectEstacao.addEventListener('change', atualizarHorarios);
  dateInput.addEventListener('change', atualizarHorarios);

  atualizarHorarios();
});

document.getElementById('uploadFotoPerfil').addEventListener('change', function (e) {
  const file = e.target.files[0];
  if (file && file.type.startsWith('image/')) {
    const reader = new FileReader();

    reader.onload = function (e) {
      const img = document.getElementById('fotoPerfil');
      img.src = e.target.result;

      img.onload = function () {
        URL.revokeObjectURL(img.src);
      }
    }

    reader.readAsDataURL(file);
  }
});

function fazerLogout() {
  localStorage.removeItem('nomeUsuario');
  window.location.href = 'login.html';
}