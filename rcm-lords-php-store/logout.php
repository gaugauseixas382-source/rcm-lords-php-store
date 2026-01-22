<?php
require 'config.php';

// Apaga todas as variáveis de sessão
$_SESSION = [];

// Apaga o cookie da sessão (ISTO É O QUE FALTAVA)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Destroi a sessão
session_destroy();

// Redireciona para o login
header("Location: login.php");
exit;
