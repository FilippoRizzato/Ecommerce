<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
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

        .cart-container {
    max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .cart-item {
    border-bottom: 1px solid #ddd;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .cart-item img {
    max-width: 100px;
            max-height: 100px;
            margin-right: 10px;
        }

        .total-price {
    text-align: right;
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }

        .checkout-btn {
    display: block;
    margin-top: 20px;
            padding: 10px;
            width: 100%;
            background-color: #333;
            color: #fff;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .checkout-btn:hover {
    background-color: #555;
        }
    </style>
</head>
<body>
    <header>
        <h1>ECOMMERCE</h1>
    </header>

    <div class="cart-container">
        <div class="cart-item">
            <img src="product1.jpg" alt="Product 1">
            <div>

            </div>
            <button>Remove</button>
        </div>

        <div class="cart-item">
            <img src="product2.jpg" alt="Product 2">
            <div>
                <h2>getNome</h2>>
            </div>
            <button>Remove</button>
        </div>

        <div class="total-price">
Total: $70.00
</div>

        <a href="#" class="checkout-btn">Proceed to Checkout</a>
    </div>
</body>
</html>
