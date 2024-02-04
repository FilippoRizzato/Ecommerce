<?php

use models\product\Product;

require_once '../models/user.php';
require_once '../models/product/product.php';

$allProducts = Product::getAllProducts();


//$product_id = isset($_GET['product_id']) ? $_GET['product_id'] : null;
//$product = Product::getProductById($product_id);
//var_dump($product);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Product</title>
</head>

<body>
<h1>modifica Prodotti</h1>

<h2>Modifica i prodotti</h2>
<?php
foreach ($allProducts as $singleProduct) {
    echo '<div class="product-edit-form">';
    echo '<form method="post" action="../actions/edit_product.php">';
    echo '<label for="name">nome:</label>';
    echo '<input type="text" name="name[' . $singleProduct['id'] . ']" value="' . $singleProduct['nome'] . '" required>';
    echo '<label for="price">prezzo:</label>';
    echo '<input type="text" name="price[' . $singleProduct['id'] . ']" value="' . $singleProduct['prezzo'] . '" required>';
    echo '<label for="brand">marca:</label>';
    echo '<input type="text" name="brand[' . $singleProduct['id'] . ']" value="' . $singleProduct['marca'] . '" required>';
    echo '<input type="hidden" name="product_id" value="' . $singleProduct['id'] . '">';
    echo '<button type="submit">Salva</button>';
    echo '</form>';
    echo '</div>';
}
?>
</body>

</html>
