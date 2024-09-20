<?php
session_start();

require_once __DIR__ . "/../../../models/Wishlist.php";

$wishlist = new Wishlist();
$wishlist->removeAllFromWishlist($_SESSION['user']->id);
$_SESSION['wishlist']['remove'] = "removed all from wishlist successfully";
echo "<script>window.history.back()</script>";
