<?php
session_start();

require_once __DIR__ . "/../../../models/Cart.php";

$bookId = ($_POST['book-id'] ?? $_GET['id']);
$quantity = ($_POST['quantity'] ?? 1);
$cart = new Cart();

$cartId = $cart->checkofCart($bookId, ($_SESSION['user']->id), $quantity);

$_SESSION['cart']['add'] = "added to cart successfully";
echo "<script>window.history.back()</script>";
