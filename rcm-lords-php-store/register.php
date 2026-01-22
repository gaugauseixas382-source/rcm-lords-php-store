<?php
require 'config.php';
include 'header.php';

$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $u = $_POST['username'];
    $e = $_POST['email'];
    $p = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username,email,password) VALUES (?,?,?)");
    $stmt->bind_param("sss", $u, $e, $p);
    $stmt->execute();

    $msg = "Conta criada com sucesso!";
}
?>

<section class="content-section">
    <div class="section-header">
        <h2>Registo</h2>
        <p>Junta-te à comunidade RCM Lords</p>
    </div>

    <?php if ($msg): ?><p><?php echo $msg; ?></p><?php endif; ?>

    <form method="post">
        <input name="username" placeholder="Username" required>
        <input name="email" type="email" placeholder="Email" required>
        <input name="password" type="password" placeholder="Password" required>
        <button class="btn-primary">Registar</button>
    </form>
</section>

<?php include 'footer.php'; ?>
