<?php

include 'db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $user_cpf = $_POST['cpf'];
    $user_data_nasc = $_POST['data-nasc'];
    $user_cargo = $_POST['cargo'];

    $sql = "UPDATE usuarios SET name ='$name', email ='$email', cpf = '$cpf', data-nasc = '$user_data_nasc', cargo = '$cargo' WHERE id = $id";

    if ($mysqli->query($sql) === true) {
        echo "Registro editado com sucesso.";
    } else {
        echo "Erro" . $sql . "<br>" . $mysqli->error;
    }

    $mysqli->close();
    header("Location: read.php");
    exit();
}

$sql = "SELECT * FROM usuarios WHERE id=$id";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="entrar.css">
    <link rel="stylesheet" href="/src/reset.css">
    <title>Update</title>
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
                <img src="../Mockup/images/add-friend-menor.png" alt="Adicionar Funcionário">
                Adicionar Funcionário
            </a>
        <?php endif; ?>
    </nav>
    <main>
          <form action="update.php?id=<?php echo $row['id']; ?>" method="POST" class="form-adicionar-funcionario">

            <label for="name">Nome:</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
            <br><br>
            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
            <br><br>
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" value="<?php echo htmlspecialchars($row['cpf']); ?>" required>
            <br><br>
            <label for="data-nasc">Data de nascimento:</label>
            <input type="date" name="data-nasc" value="<?php echo htmlspecialchars($row['data-nasc']); ?>" required>
            <br><br>
            <label for="cargo">Cargo:</label>
            <select name="cargo" required>
                <option value="">Selecione</option>
                <option value="adm" <?php if($row['cargo']=='adm') echo 'selected'; ?>>Administrador</option>
                <option value="funcionario" <?php if($row['cargo']=='funcionario') echo 'selected'; ?>>Funcionário</option>
            </select>
            <br><br>
            <a href='read.php' class="botao-listar">Atualizar</a>

        </form>
        

        <a href='read.php' class="voltar-update">Voltar</a>
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

</body>

</html>