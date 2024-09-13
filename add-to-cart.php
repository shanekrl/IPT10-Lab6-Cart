<?php
session_start();
require "products.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    $product = array_filter($products, function($p) use ($product_id) {
        return $p['id'] == $product_id;
    });

    if (!empty($product)) {
        $product = array_values($product)[0];
        $_SESSION['cart'][] = $product;
    }
}

header("Location: cart.php");
exit;