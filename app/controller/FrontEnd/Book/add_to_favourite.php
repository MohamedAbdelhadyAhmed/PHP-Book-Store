<?php
session_start();

require_once __DIR__ . "/../../../models/Wishlist.php";

if (isset($_GET['id']) && isset($_GET['page'])) {
    $book_id = $_GET['id'];
    $page = $_GET['page'];
    $wishlist = new Wishlist();
    $wishlist->addToWishlist($book_id, ($_SESSION['user_id'] ?? 1));
    $_SESSION['wishlist']['add'] = "added to wishlist successfully";
    if ($page == 'single-product') {
        header("location:../../../../" . $page . ".php?id=" . $book_id);
    } else {
        header("location:../../../../" . $page . ".php");
    }
} else {
    header("location:../../../../index.php");
}
