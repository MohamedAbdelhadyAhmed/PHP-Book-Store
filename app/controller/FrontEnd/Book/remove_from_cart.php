<?php
session_start();

require_once __DIR__ . "/../../../models/Cart.php";

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $cart = new Cart();
    $cart->removeFromCart($id, ($_SESSION['user']->id));
    $_SESSION['cart']['remove'] = "removed from cart successfully";
}

echo "<script>window.history.back()</script>";
