<?php

use models\product\Product;

require_once '../../models/user.php';
require_once '../../models/product/product.php';

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
<h1>Modifica Prodotti</h1>

<h2>Modifica i prodotti</h2>

<?php foreach ($allProducts as $singleProduct): ?>
    <div class="product-edit-form">
        <form method="post" action="../../actions/edit_product.php">
            <label for="name">nome:</label>
            <input type="text" name="nome" value="<?php echo $singleProduct['nome'] ?>" required>
            <label for="name">marca:</label>
            <input type="text" name="marca" value="<?php echo $singleProduct['marca'] ?>" required>
            <label for="price">prezzo:</label>
            <input type="number" name="prezzo" value="<?php echo $singleProduct['prezzo'] ?>" required>
            <input type="hidden" name="id" value="<?php echo $singleProduct['id'] ?>">
            <button type="submit" name="conferma" value="salva">Salva</button>
            <button type="submit" name="conferma" value="elimina">Elimina</button>
        </form>
    </div>
<?php endforeach; ?>

<br>
<br>
<br>
<h2>Crea</h2>
<div class="product-create-form">
    <form method="post" action="../../actions/edit_product.php">
        <label for="name">nome:</label>
        <input type="text" name="nome" value="" required>
        <label for="name">marca:</label>
        <input type="text" name="marca" value="" required>
        <label for="price">prezzo:</label>
        <input type="number" name="prezzo" value="" required>
        <button type="submit" name="conferma" value="crea">Crea</button>
    </form>
</div>

</body>

</html>