<?php


require_once "../DB/database.php";
require_once "../models/product/product.php";
require_once "../models/user.php";
require_once "../models/cart.php";
require_once "../models/product/cart_product.php";

session_start();

if (!isset($_SESSION["current_user"])) {
    header('Location: login.php');
}

$conn = database::getConnection();

$current_user = $_SESSION['current_user'];

$stmt = $conn->prepare("SELECT * FROM carts WHERE user_id = :user_id");
$user_id = $current_user->getId();
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$cart = $stmt->fetchObject('models\cart');

if (!$cart) {
    $stm = $conn->prepare("insert into carts (user_id) VALUES (:user_id)");
    $stm->bindParam(":user_id", $user_id);
    $stm->execute();
    $stmt = $conn->prepare("SELECT * FROM carts WHERE user_id = :user_id");
    $user_id = $current_user->getId();
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $cart = $stmt->fetchObject('models\carts');
}

$query = "
        SELECT *
        FROM products
        INNER JOIN cart_products ON products.id  = cart_products.product_id 
        where cart_id = :cart_id
    ";

$cart_id = $cart->getId();

$stmt = $conn->prepare($query);
$stmt->bindParam(':cart_id', $cart_id);
$stmt->execute();

$cart_products = $stmt->fetchAll(PDO::FETCH_CLASS, 'models\cart_product');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Store</title>
</head>
<body>
<header>
    <form action="../views/logout.php">
        <input type="submit" value="Logout"/>
    </form>
    <form action="../views/index.php">
        <input type="submit" value="Products"/>
    </form>
</header>
<div class="title">Carrello</div>
<div class="products-container">
    <?php foreach ($cart_products as $cart_product): ?>
        <div class="product">
            <div class="product-details">
                <label>ID:</label>
                <div><?php echo $cart_product->getProduct_id(); ?></div>
                <label>Nome:</label>
                <div><?php echo $cart_product->getNome(); ?></div>
                <label>Prezzo:</label>
                <div><?php echo $cart_product->getPrezzo(); ?></div>
                <label>Marca:</label>
                <div><?php echo $cart_product->getMarca(); ?></div>
                <label>Quantità:</label>
                <div><?php echo $cart_product->getQuantita(); ?></div>
                <label>totale:</label>
                <div><?php echo $cart_product->getQuantita() * $cart_product->getPrezzo(); ?></div>
            </div>
            <form action="../actions/remove.php" method="POST">
                <input type="hidden" name="cart_products_id" value="<?php echo $cart_product->getId() ?>">
            </form>
        </div>
    <?php endforeach; ?>
</div>

<hr>


</body>
</html>