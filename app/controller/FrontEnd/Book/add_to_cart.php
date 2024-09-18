<?php
session_start();

require_once __DIR__ . "/../../../models/Cart.php";



$bookId = ($_POST['book-id'] ?? $_GET['id']);
$quantity = ($_POST['quantity'] ?? 1);
$page = $_POST['page'];
$cart = new Cart();
$cartId = $cart->checkofCart($bookId, ($_SESSION['user']['id'] ?? 1), $quantity);
$_SESSION['cart']['add'] = "added to cart successfully";
if ($page == 'single-product') {
    header("location:../../../../" . $page . ".php?id=$bookId");
} else {
    header("location:../../../../" . $page . ".php");
}
