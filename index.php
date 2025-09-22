<?php

include 'db.php';
session_start();

$msg = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = $_POST["nomeUsuario"] ?? "";
  $password = $_POST["senha"] ?? "";

  $stmt = $mysqli->prepare("SELECT id, name, cargo, cpf, data_nasc, email, password FROM usuarios WHERE name=? AND password=?");
  $stmt->bind_param("ss", $name, $password);
  $stmt->execute();
  $result = $stmt->get_result();
  $dados = $result->fetch_assoc();
  $stmt->close();

  if ($dados) {
    $_SESSION["user_id"] = $dados["id"];
    $_SESSION["user_name"] = $dados["name"];
    $_SESSION["user_cargo"] = $dados["cargo"];
    $_SESSION["user_cpf"] = $dados["cpf"];
    $_SESSION["user_data_nasc"] = $dados["data_nasc"];
    $_SESSION["user_email"] = $dados["email"];

    header("Location: entrar.php");
    exit;
  } else {
    $msg = "Usuário ou senha incorretos!";
  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="src/reset.css">
  <link rel="stylesheet" href="src/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="shortcut icon" type="image/ico" href="images/avatar-icon-2048x2048-ilrgk6vk.png">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <title>Login</title>
</head>

<body>
  <div class="container">

    <div class="top-background"></div>

    <div class="topo">
      <div class="logo">
        <img src="images/[ SA Parte I ] Smart Cities e a Transformação Digital no Transporte - Mateus Cesar, Vitor Binhotti, Felipe Pivatto e Eduardo Felipe (1080 x 1500 px).png" alt="Logo Stop and Go">
      </div>
      <div class="logo-trem">
        <img src="images/images-removebg-preview.png" alt="Ícone trem">
      </div>
    </div>

    <div class="avatar">
      <img src="images/avatar-icon-2048x2048-ilrgk6vk.png" alt="Avatar Icon">
    </div>
    <p class="login-titulo">Login</p>

    <form class="login1" id="loginForm" method="POST">
      <input type="text" id="nomeUsuario" name="nomeUsuario" placeholder="Insira seu nome completo">

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
      <div class="cont_senha">
        <input type="password" id="senha" name="senha" placeholder="Insira sua senha">
        <span id="toggleSenha" class="toggle-senha" onclick="mostrarSenha()"><i class="bi bi-eye-fill"></i></span>
      </div>
      <script>
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
      </script>
      <?php if ($msg): ?><p class="msg"><?= $msg ?></p><?php endif; ?>

      <button type="submit">Entrar</button>
    </form>



  </div>
</body>

</html>