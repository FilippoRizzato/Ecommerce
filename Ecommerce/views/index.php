<?php

use models\product\Product;

session_start();
require_once "../models/product/product.php";

$products = Product::getAllProducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Store</title>
</head>
<body>
<header>
    <form action="login.php">
        <input type="submit" value="Login"/>
    </form>
    <form action="signup.php">
        <input type="submit" value="Signup"/>
    </form>
    <form action="logout.php">
        <input type="submit" value="logout"/>
    </form>
</header>
<div class="title">Index</div>
<div class="products-container">
    <?php foreach ($products as $product): ?>
        <div class="product">
            <div>
                <label>Nome:</label>
                <div><?php echo $product['nome']; ?></div>
            </div>
            <div>
                <label>Prezzo:</label>
                <div><?php echo $product['prezzo']; ?></div>
            </div>
            <div>
                <label>Marca:</label>
                <div><?php echo $product['marca']; ?></div>
            </div>
            <form action="../actions/add_cart.php" method="POST">
                <input type="text" name="quantita" value="1">
                <input type="hidden" name="product_id" value=<?php echo $product["id"] ?>>
                <input type="submit" name="submit" value="Aggiungi al carrello">
            </form>
        </div>
    <?php endforeach; ?>
</div>

<hr>


</body>
</html>





