<?php

class Auth
{
    public function isLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }
    public function loginUser($user)
    {
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["user_name"] = $user["name"];
        $_SESSION["user_cargo"] = $user["cargo"];
        $_SESSION["user_cpf"] = $user["cpf"];
        $_SESSION["user_data_nasc"] = $user["data_nasc"];
        $_SESSION["user_email"] = $user["email"];
    }
}
