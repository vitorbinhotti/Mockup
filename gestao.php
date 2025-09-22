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
    <link rel="shortcut icon" type="image/ico" href="images/map-with-a-pin-small-symbol-inside-a-circle.png">
    <script src="script.js"></script>
    <title>Gestão de Rotas</title>
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

    <div class="rotas">
        <h1>
            <img src="images/destination.png" alt="Rotas Icon">
            Gestão de Rotas
        </h1>
    </div>

    <img class="ferrovia" src="images/ferrovia.png" alt="Ferrovia">

    <div class="container-azul">
        <div class="placa-stop">
            <p>
                <img src="images/stop.png" alt="Stop Icon">
                Ponto de Parada
            </p>
        </div>
        <div>
            <p>
                <img src="images/rotatoria.png" alt="Interseção Icon">
                Ponto de Desvio
            </p>
        </div>

        <div class="exclamação">
            <p>
                <img src="images/exclamation-amarelo.png" alt="Exclamação Icon">
                Trêm A está atrasado!
            </p>
        </div>

        <div class="exclamação">
            <p>
                <img src="images/exclamation-laranja.png" alt="Exclamação Icon">
                Trêm B está atrasado!
            </p>
        </div>

        <div class="exclamação">
            <p>
                <img src="images/exclamation-vermelho.png" alt="Exclamação Icon">
                Trêm C está atrasado!
            </p>
        </div>
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