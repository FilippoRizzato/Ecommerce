<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
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

        h1 {
            margin: 0;
            text-align: center;
            padding: 20px;
        }

        .welcome-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .welcome-message {
            text-align: center;
            font-size: 18px;
            margin-bottom: 20px;
        }

        .products-link {
            display: block;
            text-align: center;
            padding: 10px;
            width: 100%;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .products-link:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
<header>
    <h1>ECOMMERCE</h1>
</header>

<div class="welcome-container">
    <div class="welcome-message">
        <?php

        use models\product\Product;

        require_once '../models/user.php';
        require_once '../models/product/product.php';
        $product = Product::getAllProducts();
        //var_dump($products);

            echo '<div class="product-box">';
            echo '<h2>' . $product['nome'] . '</h2>';
            echo '<p>Prezzo: ' . $product['prezzo'] . '</p>';
            echo '<p>Marca: ' . $product['marca'] . '</p>';
            echo '</div>';

        ?>
    </div>
</div>
</body>
</html>

