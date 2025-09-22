<?php
include 'db.php';
session_start();

if (isset($_SESSION["user_id"])) {
  header("Location: entrar.php");
  exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $password = $_POST['password'];
    $data_nasc = $_POST['data_nasc'];
    $cargo = $_POST['cargo'];

    $sql = "INSERT INTO usuarios (name,email, cpf, password, data_nasc, cargo) VALUES ('$name','$email', '$cpf', '$password', '$data_nasc', '$cargo')";

    if ($mysqli->query($sql) === true) {
        echo "Novo registro criado com sucesso.";
    } else {
        echo "Erro" . $sql . "<br>" . $conn->error;
    }
    header("Location: entrar.php");
    $conn->close();
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="entrar.css">
    <link rel="stylesheet" href="src/reset.css">
    <title>Administração de Funcionários</title>
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
    <main>

        <form method="POST">
            <div class="form-adicionar-funcionario">
                <label for="name">Nome:</label>
                <input type="text" name="name" required>
                <br><br>
                <label for="email">Email:</label>
                <input type="email" name="email" required>
                <br><br>
                <label for="cpf">CPF:</label>
                <input type="text" name="cpf" required>
                <br><br>
                <label for="password">Senha:</label>
                <input type="password" name="password" required>
                <br><br>
                <label for="data_nasc">Data de Nascimento:</label>
                <input type="date" name="data_nasc" required>
                <br><br>
                <label for="cargo">Cargo:</label>
                <select name="cargo" required>
                    <option selected></option>
                    <option value="adm">Administrador</option>
                    <option value="funcionario">Funcionário</option>
                </select>
                <br><br>
                <div class="botao-adicionar">
                    <input type="submit" value="Adicionar">
                </div>
                <br><br>
                <a href="read.php" class="botao-listar">Listar Funcionários</a>
            </div>
        </form>
    </main>
    
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

    <script src="script.js"></script>


</body>

</html>