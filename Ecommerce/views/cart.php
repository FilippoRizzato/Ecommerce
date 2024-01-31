<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shopping Cart</title>
    <style>
        /* Your styles here */
    </style>
</head>

<body>
<header>
    <h1>Shopping Cart</h1>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
        </ul>
    </nav>
</header>

<div class="cart-container">
    <h2>Your Shopping Cart</h2>
    <?php
    use models\product\Product;
    require_once '../models/product/product.php';

    // Check if a product ID is provided
    if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];

        // You might want to validate the product ID here

        // Fetch the product details based on the product ID
        $product = Product::getProductById($product_id);

        if ($product) {
            echo '<div class="product-details">';
            echo '<h3>' . $product->getNome() . '</h3>';
            //var_dump($product);
            echo '<p>Prezzo: ' . $product->getPrezzo() . '</p>';
            echo '<p>Marca: ' . $product->getMarca() . '</p>';
            echo '</div>';
        } else {
            echo '<p>Product not found.</p>';
        }
    } else {
        echo '<p>No product selected. Please go back to the <a href="index.php">homepage</a>.</p>';
    }

    ?>
</div>
</body>

</html>





