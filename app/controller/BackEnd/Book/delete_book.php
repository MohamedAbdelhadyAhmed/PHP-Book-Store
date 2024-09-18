<?php
session_start();
include_once __DIR__ . "/../../../models/Book.php";

if (isset($_GET['id'])) {
    $bookObject = new Book;
    $bookObject->setId($_GET['id']);
    $result =  $bookObject->delete();
    if ($result) {
        $_SESSION["book_deleted"] = "Book Deleted Successfully";
        header("Location:../../../../admin/all_books.php");
    } else {
        $_SESSION["book_deleted"] = "Somthing Went Wrong Please Try Again";
        header("Location:../../../../admin/all_books.php");
    }
}
