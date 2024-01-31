<?php

use models\product\Product;

require_once '../models/user.php';
require_once '../models/product/product.php';

$allProducts = Product::getAllProducts(); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'];
        $product = Product::getProductById($product_id);

        if ($product) {
            $product->setNome($_POST['name']);
            $product->setPrezzo($_POST['price']);
            $product->setMarca($_POST['brand']);

            $product->update();
            header('Location: index.php');
            exit();
        } else {
            echo "Product not found!";
            exit();
        }
    } else {
        foreach ($allProducts as $singleProduct) {
            $product_id = $singleProduct['id'];

            $product = Product::getProductById($product_id);

            if ($product) {
                $product->setNome($_POST['name'][$product_id]);
                $product->setPrezzo($_POST['price'][$product_id]);
                $product->setMarca($_POST['brand'][$product_id]);
                $product->update();
            }
        }

        header('Location: index.php');
        exit();
    }
}
$product_id = isset($_GET['product_id']) ? $_GET['product_id'] : null;
$product = Product::getProductById($product_id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Product</title>
</head>

<body>
<h1>Edit Product</h1>
<?php if ($product): ?>
    <form method="post" action="edit_product.php">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $product->getNome(); ?>" required>
        <label for="price">Price:</label>
        <input type="text" name="price" value="<?php echo $product->getPrezzo(); ?>" required>
        <label for="brand">Brand:</label>
        <input type="text" name="brand" value="<?php echo $product->getMarca(); ?>" required>
        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
        <button type="submit">Save Changes</button>
    </form>
<?php else: ?>
    <p>Product not found!</p>
<?php endif; ?>
<h2>Edit All Products</h2>
<?php
foreach ($allProducts as $singleProduct) {
    echo '<div class="product-edit-form">';
    echo '<form method="post" action="edit_product.php">';
    echo '<label for="name">Name:</label>';
    echo '<input type="text" name="name[' . $singleProduct['id'] . ']" value="' . $singleProduct['nome'] . '" required>';
    echo '<label for="price">Price:</label>';
    echo '<input type="text" name="price[' . $singleProduct['id'] . ']" value="' . $singleProduct['prezzo'] . '" required>';
    echo '<label for="brand">Brand:</label>';
    echo '<input type="text" name="brand[' . $singleProduct['id'] . ']" value="' . $singleProduct['marca'] . '" required>';
    echo '<input type="hidden" name="product_id" value="' . $singleProduct['id'] . '">';
    echo '<button type="submit">Save Changes</button>';
    echo '</form>';
    echo '</div>';
}
?>
</body>

</html>
