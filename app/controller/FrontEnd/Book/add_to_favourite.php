<?php
session_start();
require_once __DIR__ . "/../../../models/Wishlist.php";


if (isset($_SESSION['user'])){


    $book_id = $_GET['id'];
    $wishlist = new Wishlist();

    $wishlist->setUserId($_SESSION['user']->id);
    $wishlist->setBookId($book_id);
    $result = $wishlist->read();

 if (!$result) {
    $wishlist->addToWishlist($book_id, $_SESSION['user']->id);
    $_SESSION['wishlist']['add'] = "added to wishlist successfully";
    echo "<script>window.history.back()</script>";
 }else {
    $_SESSION['wishlist']['add'] = "This book is already exists";
    echo "<script>window.history.back()</script>";
 }
   
}else{
    header("Location:../../../../login.php");
}
