<?php

include 'db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $user_cpf = $_POST['cpf'];
    $user_cargo = $_POST['cargo'];

    $sql = "UPDATE usuarios SET name ='$name', email ='$email', cpf = '$cpf', cargo = '$cargo' WHERE id = $id";

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
    <title>Update</title>
</head>

<body>
    <form action="update.php?id=<?php echo $row['id']; ?>" method="POST">

        <label for="name">Nome:</label>
        <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
        <br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
        <br><br>
        <label for="cpf">CPF:</label>
        <input type="number" name="cpf" value="<?php echo $row['cpf']; ?>">
        <br><br>
        <label for="cargo">Cargo:</label>
        <select name="cargo" required>
            <option selected></option>
            <option value="adm">Administrador</option>
            <option value="funcionario">Funcionário</option>
        </select>
        <br><br>
        <input type="submit" value="Atualizar">

    </form>

</body>

</html>