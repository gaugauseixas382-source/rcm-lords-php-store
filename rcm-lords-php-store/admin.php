<?php
require 'config.php';
include 'header.php';

// Só admins
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: profile.php");
    exit;
}

// Marcar encomenda como concluída
if (isset($_GET['complete'])) {
    $id = (int)$_GET['complete'];
    $stmt = $conn->prepare("UPDATE orders SET status = 'completed' WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

// Buscar encomendas
$result = $conn->query("
    SELECT orders.id, users.username, orders.order_date, orders.status
    FROM orders
    JOIN users ON orders.user_id = users.id
    ORDER BY orders.id DESC
");
?>

<section class="content-section">
    <div class="section-header">
        <h2>Área de Administração</h2>
        <p>Gestão de encomendas</p>
    </div>

    <div class="cart-summary">
        <table style="width:100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="text-align:left;">ID</th>
                    <th style="text-align:left;">Utilizador</th>
                    <th style="text-align:left;">Data</th>
                    <th style="text-align:left;">Estado</th>
                    <th style="text-align:left;">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($o = $result->fetch_assoc()): ?>
                    <tr style="border-top:1px solid #333;">
                        <td><?php echo $o['id']; ?></td>
                        <td><?php echo htmlspecialchars($o['username']); ?></td>
                        <td><?php echo $o['order_date']; ?></td>
                        <td><?php echo $o['status']; ?></td>
                        <td>
                            <?php if ($o['status'] === 'pending'): ?>
                                <a class="btn-secondary" href="admin.php?complete=<?php echo $o['id']; ?>">
                                    Marcar como concluída
                                </a>
                            <?php else: ?>
                                ✔
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <div style="margin-top:1rem;">
            <a href="profile.php" class="btn-secondary">Voltar ao perfil</a>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
