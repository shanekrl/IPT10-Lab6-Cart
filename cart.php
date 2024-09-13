<?php
session_start();
require "products.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        .card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin: 10px 0;
            padding: 20px;
        }
        .card h2 {
            margin: 0 0 10px;
        }
        .card p {
            margin: 0;
        }
        .card button, .card a {
            background: #28a745;
            border: none;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 10px 0;
            cursor: pointer;
            border-radius: 5px;
            margin-right: 10px;
        }
        a {
            background: #007bff;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <h1>Your Cart</h1>
    </header>
    <div class="container">
        <?php if (!empty($_SESSION['cart'])): ?>
            <?php foreach ($_SESSION['cart'] as $item): ?>
                <div class="card">
                    <h2><?php echo $item['name']; ?></h2>
                    <p>Price: <?php echo $item['price']; ?> PHP</p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="card">
                <p>Your cart is empty.</p>
            </div>
        <?php endif; ?>
        <a href="reset-cart.php">Clear my cart</a>
        <a href="place_order.php">Place the order</a>
    </div>
</body>
</html>