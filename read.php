<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="entrar.css">
    <link rel="stylesheet" href="/src/reset.css">
    <title>Lista de Funcionários</title>
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
        <h2 class="titulo-read">Funcionários</h2>
        <div class="table-usuarios">
            <div class="scroll-usuarios">
                <?php
                include 'db.php';

                $sql = "SELECT * FROM usuarios";

                $result = $mysqli->query($sql);

                if ($result->num_rows > 0) {

                    echo "<div>";
                    echo "<table class='tabela-usuarios'>
                    </thead>
                    <tbody>";

                    echo "<tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>";

                    while ($row = $result->fetch_assoc()) {

                        echo "<tr>
                            <td data-label='ID'>{$row['id']}</td>
                            <td data-label='Nome'>{$row['name']}</td>
                            <td class'btns-acao'>
                            <a href='update.php?id=" . urlencode($row['id']) . "' class='btn'>Editar</a>
                            <br><br>
                            <a href='delete.php?id=" . urlencode($row['id']) . "' class='btn-excluir'>Excluir</a>
                            </td>
                        </tr>";
                    }
                    echo "</tbody></table>";
                    echo "</div>";
                } else {
                    echo "Nenhum registro encontrado.";
                }
                $mysqli->close();
                ?>
            </div>
            <a href='adicionar-funcionario.php' class='voltar-fim'>Voltar</a>
        </div>
    </main>

    <footer class="menu-rodape">
        <div class="item-menu casa-icon">
            <a href="entrar.php">
                <img src="images/casa-home.png" alt="Home">
                <p>Principal</p>
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