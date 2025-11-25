<?php
include 'db.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="entrar.css">
    <link rel="shortcut icon" type="image/ico" href="images/report.png">
    <script src="script.js"></script>
    <title>Relatórios e Análise</title>
</head>

<body>
    <header class="topo">
        <a href="#" class="btn-abrir" onclick="abrirMenu()">&#9776;</a>
        <img class="logo"
            src="images/[ SA Parte I ] Smart Cities e a Transformação Digital no Transporte - Mateus Cesar, Vitor Binhotti, Felipe Pivatto e Eduardo Felipe (1080 x 1500 px).png"
            alt="Logo Stop and GO">


        <img class="logo-trem" src="images/images-removebg-preview.png" alt="Ícone Trem">
    </header>

    <div class="tab-relatorio">
        <button onclick="mostrarAbaRelatorio('problemas', this)" class="aba ativa"> Problemas</button>
        <button onclick="mostrarAbaRelatorio('gastos', this)" class="aba">Gastos</button>
        <button onclick="mostrarAbaRelatorio('hive', this)" class="aba">HiveMQ</button>
    </div>

    <div id="problemas" class="conteudo-aba-relatorio">
        <h2 class="txt-relatorio1">Problemas reportados hoje</h2>
        <img class="imagem-relatorio" src="images/relatorio-analises.png" alt="">
    </div>

    <div id="gastos" class="conteudo-aba-relatorio" style="display: none;">
        <h2 class="txt-relatorio2">Distribuição de Gastos</h2>
        <img class="grafico" src="images/grafico.png" alt="">
    </div>

    <div id="hive" class="conteudo-aba-relatorio" style="display: none;">
        <h2 class="txt-relatorio2">Teste de Conexão MQTT</h2>
        <div class="botao-hive">
            <button id="btn">Enviar mensagem MQTT</button>

            <script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>

            <script type="module" src="mqtt.js"></script>

            <script type="module">
                import {
                    enviarMensagem
                } from "./mqtt.js";

                document.getElementById("btn").addEventListener("click", () => {
                    enviarMensagem();
                });
            </script>
        </div>
    </div>


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
                <img src="../Mockup/images/add-friend-menor.png" alt="Adicionar Funcionário">
                Adicionar Funcionário
            </a>
        <?php endif; ?>

    </nav>

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