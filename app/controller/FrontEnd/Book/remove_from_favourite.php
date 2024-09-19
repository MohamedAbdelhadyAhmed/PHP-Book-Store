<?php
session_start();

require_once __DIR__ . "/../../../models/Wishlist.php";

if (isset($_GET['id']) && isset($_GET['page'])) {
    $id = $_GET['id'];
    $page = $_GET['page'];
    $wishlist = new Wishlist();
    $wishlist->removeFromWishlist($id, ($_SESSION['user']['id'] ?? 1));
    $_SESSION['wishlist']['remove'] = "removed from wishlist successfully";
    if ($page == 'single-product') {
        header("location:../../../../" . $page . ".php?id=" . $id);
    } else {
        header("location:../../../../" . $page . ".php");
    }
} else {
    header("location:../../../../index.php");
}
