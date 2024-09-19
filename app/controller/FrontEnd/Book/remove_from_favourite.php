<?php
session_start();

require_once __DIR__ . "/../../../models/Wishlist.php";

$id = $_GET['id'];
$wishlist = new Wishlist();
$wishlist->removeFromWishlist($id, ($_SESSION['user']['id'] ?? 1));
$_SESSION['wishlist']['remove'] = "removed from wishlist successfully";
echo "<script>window.history.back()</script>";
