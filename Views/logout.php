<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]==true)
{
     var_dump($_SESSION);
    $ck = new CookieGenerator();
    $ck->deleteToken($_SESSION["user_id"]);
    session_destroy();

    if (isset($_COOKIE['remember_me'])) {
        unset($_COOKIE['remember_me']);
        setcookie('remember_me', null, -1);
    }

}
header("Location:/login");
