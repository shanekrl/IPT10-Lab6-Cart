<?php
session_start();
require "products.php";

// Generate a random order code
$order_code = bin2hex(random_bytes(8));

// Prepare order details
$order_items = $_SESSION["cart"];
$total_price = array_sum(array_column($order_items, "price"));

// Create order content
$order_content = "Order Code: $order_code\n";
$order_content .= "Date and Time Ordered: " . date('Y-m-d H:i:s') . "\n";
$order_content .= "Items:\n";

foreach ($order_items as $item) {
    $order_content .= "Product ID: {$item['id']}\n";
    $order_content .= "Product Name: {$item['name']}\n";
    $order_content .= "Price: {$item['price']} PHP\n";
    $order_content .= "------\n";
}

$order_content .= "Total Price: $total_price PHP\n";

// Save to file
file_put_contents("orders-$order_code.txt", $order_content);

// Clear the cart
$_SESSION['cart'] = [];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
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
            text-align: center;
        }
        .card h2 {
            margin: 0 0 10px;
        }
        .card p {
            margin: 0;
        }
        a {
            background: #007bff;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <h1>Order Confirmation</h1>
    </header>
    <div class="container">
        <div class="card">
            <p>Thank you for your order!</p>
            <p>Your order code is: <?php echo $order_code; ?></p>
            <p>Total Price: <?php echo $total_price; ?> PHP</p>
            <a href="index.php">Back to Products</a>
        </div>
    </div>
</body>
</html>