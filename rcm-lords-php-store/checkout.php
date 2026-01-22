<?php
require 'config.php';
include 'header.php';

// Só utilizadores logados
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Carrinho tem de existir
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo '<section class="content-section"><p>Carrinho vazio.</p></section>';
    include 'footer.php';
    exit;
}

$user_id = $_SESSION['user_id'];
$total = 0;

// Finalizar compra
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Criar encomenda
    $stmt = $conn->prepare("INSERT INTO orders (user_id) VALUES (?)");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $order_id = $stmt->insert_id;

    // Inserir produtos da encomenda
    $stmt_item = $conn->prepare(
        "INSERT INTO order_items (order_id, product_id, quantity) VALUES (?, ?, ?)"
    );

    foreach ($_SESSION['cart'] as $item) {
        $stmt_item->bind_param(
            "iii",
            $order_id,
            $item['id'],
            $item['quantity']
        );
        $stmt_item->execute();
    }

    // Limpar carrinho
    unset($_SESSION['cart']);

    ?>
    <section class="content-section">
        <div class="section-header">
            <h2>Compra finalizada ✅</h2>
            <p>A tua encomenda foi registada com sucesso.</p>
        </div>

        <p><strong>Número da encomenda:</strong> <?php echo $order_id; ?></p>

        <a href="shop.php" class="btn-primary">Voltar à loja</a>
    </section>
    <?php

    include 'footer.php';
    exit;
}
?>

<section class="content-section">
    <div class="section-header">
        <h2>Checkout</h2>
        <p>Confirma os dados da tua encomenda</p>
    </div>

    <div class="cart-summary">
        <ul id="cart-items">
            <?php foreach ($_SESSION['cart'] as $item):
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

        <p id="cart-total">
            Total: €<?php echo number_format($total, 2); ?>
        </p>

        <form method="post">
            <button class="btn-primary">Confirmar compra</button>
        </form>
    </div>
</section>

<?php include 'footer.php'; ?>

