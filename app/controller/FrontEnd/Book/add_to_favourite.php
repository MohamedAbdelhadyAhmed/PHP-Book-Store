<?php
session_start();

require_once __DIR__ . "/../../../models/Wishlist.php";

$book_id = $_GET['id'];
$wishlist = new Wishlist();
$wishlist->addToWishlist($book_id, ($_SESSION['user_id'] ?? 1));
$_SESSION['wishlist']['add'] = "added to wishlist successfully";
echo "<script>window.history.back()</script>";
