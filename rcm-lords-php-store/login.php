<?php
require 'config.php';
include 'header.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        if (password_verify($password, $user['password'])) {

            // Guardar sessão
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // REDIRECIONAMENTO CORRETO
            if ($user['role'] === 'admin') {
                header("Location: admin.php");
            } else {
                header("Location: profile.php");
            }
            exit;

        } else {
            $error = "Password incorreta.";
        }
    } else {
        $error = "Utilizador não encontrado.";
    }
}
?>

<section class="content-section">
    <div class="section-header">
        <h2>Login</h2>
        <p>Acesso à área do fã RCM Lords</p>
    </div>

    <?php if ($error): ?>
        <p style="color:#ff6b6b;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="post">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <button class="btn-primary">Entrar</button>
    </form>

    <p style="margin-top:1rem;">
        Não tens conta? <a href="register.php">Registar</a>
    </p>
</section>

<?php include 'footer.php'; ?>
