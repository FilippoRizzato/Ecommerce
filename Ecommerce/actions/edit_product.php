<?php

include_once dirname(__FILE__) . '/../models/product/product.php';
include_once dirname(__FILE__) . '/../models/product/cart_product.php';
include_once dirname(__FILE__) . '/../models/product/product.php';

$scelta = $_POST['conferma'];
$id = $_POST['id'];
$nome = $_POST['nome'];
$marca = $_POST['marca'];
$prezzo = (float)$_POST['prezzo'];

$product = models\product\Product::getProductById($id);

if ($scelta == "salva") {
    $product = $product->update($id, $nome, $marca, $prezzo);
} else if ($scelta == "elimina") {
    $product = $product->delete($id);
} else if ($scelta == "crea") {
    models\product\Product::create($nome, $marca, $prezzo);
}

header('Location: ../views/admin/admin.php');






