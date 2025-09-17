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
        <img
          src="images/[ SA Parte I ] Smart Cities e a Transformação Digital no Transporte - Mateus Cesar, Vitor Binhotti, Felipe Pivatto e Eduardo Felipe (1080 x 1500 px).png"
          alt="Logo Stop and Go">
      </div>
      <div class="logo-trem">
        <img src="images/images-removebg-preview.png" alt="Ícone trem">
      </div>
    </div>

    <div class="avatar">
      <img src="images/avatar-icon-2048x2048-ilrgk6vk.png" alt="Avatar Icon">
    </div>
    <p class="login-titulo">Login</p>

    <form class="login1" id="loginForm">
      <input type="text" id="nomeUsuario" placeholder="Insira seu nome completo">

      <div class="cont_senha">
        <input type="password" id="senha" placeholder="Insira sua senha">
        <i class="bi bi-eye-fill toggle-senha" id="btn-senha" onclick="mostrarSenha()"></i>
      </div>

      <span id="mensagemSenha" style="color: red; font-size: 16px;"></span>
      <button type="submit">Entrar</button>
    </form>
  </div>

  <script src="script.js"></script>

</body>

</html>