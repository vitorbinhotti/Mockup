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
    <link rel="shortcut icon" type="image/ico" href="images/edit-info.png">
    <script src="script.js"></script>
    <title>Informações Pessoais</title>
</head>

<body>

    <header class="topo">
        <a href="#" class="btn-abrir" onclick="abrirMenu()">&#9776;</a>
        <img class="logo"
            src="images/[ SA Parte I ] Smart Cities e a Transformação Digital no Transporte - Mateus Cesar, Vitor Binhotti, Felipe Pivatto e Eduardo Felipe (1080 x 1500 px).png"
            alt="Logo Stop and GO">
        <img class="logo-trem" src="images/images-removebg-preview.png" alt="Ícone Trem">
    </header>

    <div class="tabs">
        <button onclick="mostrarAba('geral')" class="aba ativa">Informações Gerais</button>
        <button onclick="mostrarAba('contato')" class="aba">Contato</button>
    </div>

    <div id="geral" class="conteudo-aba">
        <p><strong>Nome:</strong> <?= $_SESSION["user_name"] ?></p>
        <p><strong>CPF:</strong> <?= $_SESSION["user_cpf"] ?></p>
        <p><strong>Data de Nascimento:</strong> <?= $_SESSION["user_data_nasc"] ?></p>
    </div>


    <div id="contato" class="conteudo-aba" style="display: none;">
        <p><strong>Email:</strong> <?= $_SESSION["user_email"] ?></p>
        <p><strong>Cargo:</strong> <?= $_SESSION["user_cargo"] ?></p>
    </div>

    <?php
    if (isset($_GET['btn-sair'])) {
        session_destroy();
        header("Location: index.php");
        exit;
    }
    echo '
    <div class="btn-sair" id="btn-sair">
        <a href="index.php">
            <img src="images/exit.png" alt="Sair Icon">
            Sair
        </a>
    </div>
    ';


    ?>

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