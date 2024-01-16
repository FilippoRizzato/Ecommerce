<?php
require_once '../models/user.php';
require_once '../models/product/product.php';
session_start();

$role_id = $_SESSION['role_id'];
if ($role_id != 2) {
    header('Location: login.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $prezzo = $_POST['prezzo'];
    $marca = $_POST['marca'];

    $product = new \models\product\Product($id, $nome, $prezzo, $marca);
    $product->update();

    header('Location: index.php');
    exit;
}

$id = $_GET['id'];
$product = \models\product\Product::getProductById($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Product</title>
</head>
<body>
<header>
    <h1>Modifica Prodotto</h1>
</header>

<form method="post" action="edit_product.php">
    <input type="hidden" name="id" value="<?php echo $product->getId(); ?>">
    <label for="nome">Nome:</label><br>
    <input type="text" id="nome" name="nome" value="<?php echo $product->getNome(); ?>"><br>
    <label for="prezzo">Prezzo:</label><br>
    <input type="number" id="prezzo" name="prezzo" value="<?php echo $product->getPrezzo(); ?>"><br>
    <label for="marca">Marca:</label><br>
    <input type="text" id="marca" name="marca" value="<?php echo $product->getMarca(); ?>"><br>
    <input type="submit" value="Salva">
</form>

</body>
</html>
