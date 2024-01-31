<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home Page</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 15px;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline-block;
            margin-right: 20px;
        }

        nav a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            font-size: 16px;
            transition: color 0.3s;
        }

        nav a:hover {
            color: #ffd700;
        }

        h1 {
            margin: 0;
            text-align: center;
            padding: 20px;
        }

        .product-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            padding: 20px;
        }

        .product-box {
            width: 200px;
            border: 1px solid #ddd;
            margin: 10px;
            padding: 15px;
            text-align: center;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
<header>
    <h1>ECOMMERCE</h1>
    <nav>
        <ul>
            <li><a href="login.php">Log In</a></li>
            <li><a href="signup.php">Sign Up</a></li>
            <li><a href="logout.php">Log Out</a></li>
            <li><a href="edit_product.php">Modifica Prodotti</a></li>
        </ul>
    </nav>
</header>

<div class="product-container">
    <?php

    use models\product\Product;

    require_once '../models/user.php';
    require_once '../models/product/product.php';
    $products = Product::getAllProducts();
    //var_dump($products);
    foreach ($products as $product) {
        echo '<div class="product-box">';
        echo '<h2>' . $product['nome'] . '</h2>';
        echo '<p>Prezzo: ' . $product['prezzo'] . '</p>';
        echo '<p>Marca: ' . $product['marca'] . '</p>';
        echo '<a href="http://localhost:8000/views/cart.php?product_id=' . $product['id'] . '"><button>Aggiungi al carrello</button></a>';
        echo '</div>';
    }
    ?>
</div>
</body>
</html>




