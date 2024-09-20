<?php
session_start();

require_once __DIR__ . "/../../../models/Cart.php";


$cart = new Cart();

$result = $cart->removeAllFromCart($_SESSION['user']->id);
if ($result) {
    $_SESSION['cart']['remove'] = "removed all from cart successfully";
    echo "<script>window.history.back()</script>";
} else {
    $_SESSION['cart']['remove'] = "Somthing Went Wrong Please Try Again";
    echo "<script>window.history.back()</script>";
}
