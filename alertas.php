<?php
include 'db.php';
session_start();


if (isset($_SESSION["user_id"])) {
  header("Location: entrar.php");
  exit;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="entrar.css">
    <link rel="shortcut icon" type="image/ico" href="images/bell.png">
    <script src="script.js"></script>
    <title>Alertas</title>
</head>

<body>
    <header class="topo">
        <a href="#" class="btn-abrir" onclick="abrirMenu()">&#9776;</a>
        <img class="logo"
            src="images/[ SA Parte I ] Smart Cities e a Transformação Digital no Transporte - Mateus Cesar, Vitor Binhotti, Felipe Pivatto e Eduardo Felipe (1080 x 1500 px).png"
            alt="Logo Stop and GO">
        <img class="logo-trem" src="images/images-removebg-preview.png" alt="Ícone Trem">
    </header>

    <nav class="icon-menu-lateral">
        <div class="icone-fechar">
            <a href="#" onclick="fecharMenu()">
                <img src="images/perto.png" alt="Fechar Icon">
                Fechar
            </a>
        </div>
        <hr>
        <a href="entrar.php">
            <img src="images/casa-menu-lateral.png" alt="Casa Icon">
            Principal
        </a>
        <a href="alertas.php">
            <img src="images/sino.png" alt="Sino Icon">
            Alertas
        </a>
        <a href="gestao.php">
            <img src="images/pin-de-localizacao.png" alt="Localização Icon">
            Gestão de Rotas
        </a>
        <a href="quadro.php">
            <img src="images/relogio.png" alt="Relógio Icon">
            Quadro de Horário
        </a>
        <a href="relatorio.php">
            <img src="images/relatorio.png" alt="Relatório Icon">
            Relatório e Análise
        </a>
        <a href="informacoes.php">
            <img src="images/do-utilizador.png" alt="User Icon">
            Informações Pessoais
        </a>

        <?php if (isset($_SESSION["user_cargo"]) && $_SESSION["user_cargo"] === 'adm'): ?>
            <a href="adicionar-funcionario.php">
                <img src="../Mockup/images/add-friend-menor.png" alt="Administração de Funcionários">
                Administração de Funcionários
            </a>
        <?php endif; ?>

    </nav>

    <div class="notificacoes">

        <div class="com-noti">
            <img class="img-alertas-noti" src="images/alerta icon.png">
            <h3>Falta de trens na ferrovia sul! </h3>
        </div>

        <div class="com-noti">
            <img class="img-alertas-noti" src="images/alerta icon.png">
            <h3>Trem falhou em rota! </h3>
        </div>

        <div class="sem-noti">
            <img class="img-alertas" src="images/sino-sem-not.png">
            <h3>Trem saiu da estação norte. </h3>
        </div>

        <div class="sem-noti">
            <img class="img-alertas" src="images/sino-sem-not.png">
            <h3>Manifestação referente o valor da passagem!</h3>
        </div>

        <div class="sem-noti">
            <img class="img-alertas" src="images/sino-sem-not.png">
            <h3>Climatização precária!</h3>
        </div>

        <div class="sem-noti">
            <img class="img-alertas" src="images/sino-sem-not.png">
            <h3>Segurança atualizada com sucesso!</h3>
        </div>

        <div class="sem-noti">
            <img class="img-alertas" src="images/sino-sem-not.png">
            <h3>Atraso na saída do trem leste!</h3>
        </div>

    </div>

    <div>

        <button class="btn-alertas" type="button">Marcar como lido <img src="images/noti-lido.png"></button>
        <button class="btn-alertas" type="button">Desativar notificações <img src="images/desativar-noti.png"></button>

    </div>


    <footer class="menu-rodape">
        <div class="item-menu casa-icon">
            <a href="entrar.php">
                <img src="images/casa-home.png" alt="Home">
                <p>Home</p>
            </a>
        </div>
        <div class="item-menu">
            <a href="informacoes.php">
                <img src="images/usuario-home.png" alt="Perfil">
                <p>Perfil</p>
            </a>
        </div>
    </footer>
</body>

</html>