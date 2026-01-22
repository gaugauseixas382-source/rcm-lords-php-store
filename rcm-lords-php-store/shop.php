<?php
require 'config.php';
include 'header.php';

// Adicionar ao carrinho
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $id = (int)$_POST['product_id'];

    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $product = $stmt->get_result()->fetch_assoc();

    if ($product) {
        if (!isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id] = [
                'id' => $product['id'],
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => 1
            ];
        } else {
            $_SESSION['cart'][$id]['quantity']++;
        }
    }

    header("Location: cart.php");
    exit;
}

// Buscar produtos
$result = $conn->query("SELECT * FROM products");
?>

<section class="content-section">
    <div class="section-header">
        <h2>Loja Online</h2>
        <p>Merchandising oficial RCM Lords</p>
    </div>

    <div class="product-list">
        <?php while ($p = $result->fetch_assoc()): ?>
            <div class="product-card">

                <div class="product-image-wrapper">
                    <img src="<?php echo htmlspecialchars($p['image']); ?>">
                </div>

                <div class="product-info">
                    <h3 class="product-title"><?php echo htmlspecialchars($p['name']); ?></h3>
                    <p class="product-description"><?php echo htmlspecialchars($p['description']); ?></p>
                    <p class="product-price">€<?php echo number_format($p['price'], 2); ?></p>
                </div>

                <form method="post">
                    <input type="hidden" name="product_id" value="<?php echo $p['id']; ?>">
                    <button class="btn-primary">Adicionar ao carrinho</button>
                </form>

            </div>
        <?php endwhile; ?>
    </div>
</section>

<?php include 'footer.php'; ?>

