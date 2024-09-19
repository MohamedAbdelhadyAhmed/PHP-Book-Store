<?php
session_start();

require_once __DIR__ . "/../../../models/Cart.php";


$cart = new Cart();

$cart->removeAllFromCart($_SESSION['user']['id'] ?? 1);
$_SESSION['cart']['remove'] = "removed all from cart successfully";
echo "<script>window.history.back()</script>";
