<?php
    include 'db.php';
    $id = $_GET['id'];
    $sql ="DELETE FROM usuarios WHERE id=$id";
    if($mysqli ->query($sql) === true){
        echo "Registro excluído com sucesso.";
    }else{
        echo "Erro" . $sql . "<br>" . $conn->error;
    }
    $mysqli -> close();
    header("Location: read.php");
    exit();
?>