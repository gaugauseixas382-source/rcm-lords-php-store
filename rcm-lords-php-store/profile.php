<?php
require 'config.php';
include 'header.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<section class="content-section">
    <div class="section-header">
        <h2>Bem-vindo, <?php echo htmlspecialchars($_SESSION['username']); ?> 👋</h2>
        <p>Área pessoal do fã</p>
    </div>

    <div style="display:flex; gap:1rem; flex-wrap:wrap;">
        <a href="shop.php" class="btn-primary">Ir à Loja</a>

        <?php if ($_SESSION['role'] === 'admin'): ?>
            <a href="admin.php" class="btn-secondary">Área de Administração</a>
        <?php endif; ?>

        <a href="logout.php" class="btn-secondary">Logout</a>
    </div>
</section>

<?php include 'footer.php'; ?>
