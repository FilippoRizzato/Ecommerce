<?php
require_once "../models/user.php";

$current_user = $_SESSION;
if ($current_user->getRole_id() == 2){
    header('Location: http://localhost:8000/views/admin/admin.php');
}
use models\cart;
use models\cart_product;

require_once "../models/user.php";
require_once "../models/cart.php";
require_once "../models/product/cart_product.php";
session_start();


$product_id = $_POST['product_id'];
$quantita = $_POST['quantita'];
$current_user = $_SESSION['current_user'];

$cart = cart::find($current_user->getId());

if (!$cart) {
    cart::create_cart($current_user->getId());
    $cart = cart::find($current_user->getId());
}

cart_product::create($cart, $product_id, $quantita);
header('Location: ../views/cart.php');
