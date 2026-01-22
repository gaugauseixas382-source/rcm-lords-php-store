<?php
require 'config.php';
include 'header.php';

if (empty($_SESSION['cart'])) {
    echo '<section class="content-section"><p>O carrinho está vazio.</p></section>';
    include 'footer.php';
    exit;
}
?>

<section class="content-section">
    <div class="section-header">
        <h2>Carrinho de Compras</h2>
    </div>

    <div class="cart-summary">
        <ul id="cart-items">
            <?php
            $total = 0;
            foreach ($_SESSION['cart'] as $item):
                $subtotal = $item['price'] * $item['quantity'];
                $total += $subtotal;
            ?>
                <li>
                    <?php echo htmlspecialchars($item['name']); ?>
                    | Quantidade: <?php echo $item['quantity']; ?>
                    | Subtotal: €<?php echo number_format($subtotal, 2); ?>
                </li>
            <?php endforeach; ?>
        </ul>

        <p id="cart-total">Total: €<?php echo number_format($total, 2); ?></p>

        <a href="checkout.php" class="btn-primary">Finalizar compra</a>
    </div>
</section>

<?php include 'footer.php'; ?>
