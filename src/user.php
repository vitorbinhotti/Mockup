<?php

class User
{
    private $mysqli;

    public function __construct($db)
    {
        $this->mysqli = $db;
    }
public function register($name, $email, $senha, $cargo, $cpf, $data_nasc)
{
    $hash = password_hash($senha, PASSWORD_DEFAULT);
    $sql = "INSERT INTO usuarios (name, email, password, cpf, data_nasc, cargo) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $this->mysqli->prepare($sql);
    $stmt->bind_param("ssssss", $name, $email, $hash, $cpf, $data_nasc, $cargo);
    return $stmt->execute();
}

    public function login($name, $password)
    {
        $sql = "SELECT * FROM usuarios WHERE name = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
    public function getUserById($user_id)
    {
        $sql = "SELECT * FROM usuarios WHERE user_id= :id";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bindParam(":id", $user_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updateProfilePic($user_id, $profilePic)
    {
        $sql = "UPDATE usuarios SET foto_perfil = :profile_pic WHERE user_id = :id";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bindParam(':profile_pic', $profilePic);
        $stmt->bindParam(':id', $user_id);
        return $stmt->execute();
    }
}
