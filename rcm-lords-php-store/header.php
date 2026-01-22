<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>RCM Lords</title>

    <!-- CSS -->
    <link rel="stylesheet" href="/rcm_lords/styles.css">
</head>
<body>

<header class="main-header">
    <div class="logo-area">
        <div class="logo-mark">RCM</div>
        <div class="logo-text">
            <span class="band-name">RCM Lords</span>
            <span class="tagline">Loja Oficial</span>
        </div>
    </div>

    <nav class="main-nav">
        <ul>
            <li><a href="shop.php">Loja</a></li>
            <li><a href="profile.php">Perfil</a></li>
            <li><a href="cart.php">Carrinho</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</header>

<main>
