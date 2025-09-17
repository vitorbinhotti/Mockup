<?php
include 'db.php';
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="entrar.css">
    <link rel="shortcut icon" type="image/ico" href="images/casa-home.png">
    <script src="script.js"></script>
    <title>Mockup - Stop&Go</title>
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
    </nav>

    <main>

    </main>
    <div class="container">
        <h2>Bem-vindo, <?= $_SESSION["user_name"] ?>!</h2>

        <h2 id="nomeUsuarioExibicao"></h2>

        <div class="botoes">
            <div class="botao">
                <a href="alertas.php">
                    <img src="images/notificacao.png" alt="Alertas">
                    <h3>Alertas</h3>
                </a>
            </div>

            <div class="botao">
                <a href="gestao.php">
                    <img src="images/rotas icon.png" alt="Gestão de Rotas">
                    <h3>Gestão de Rotas</h3>
                </a>
            </div>

            <div class="botao">
                <a href="quadro.php">
                    <img src="images/horarios icon.png" alt="Quadro de Horários">
                    <h3>Quadro de Horários</h3>
                </a>
            </div>

            <div class="botao">
                <a href="relatorio.php">
                    <img src="images/relatorios icon.png" alt="Relatórios">
                    <h3>Relatório e Análise</h3>
                </a>
            </div>

            <div class="botao">
                <a href="informacoes.php">
                    <img src="images/informacoes icon.png" alt="Informações Pessoais">
                    <h3>Informações Pessoais</h3>
                </a>
            </div>

            <?php if (isset($_SESSION["user_cargo"]) && $_SESSION["user_cargo"] === 'adm'): ?>
                <div class="botao adicionar-funcionario">
                    <a href="adicionar-funcionario.php">
                        <img src="../Mockup/images/add-friend.png" alt="Adicionar Funcionário">
                        <h3>Adicionar Funcionário</h3>
                    </a>
                </div>
            <?php endif; ?>

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
    </div>
</body>

</html>