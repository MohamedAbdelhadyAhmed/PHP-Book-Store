<?php
session_start();
include_once __DIR__ . "/../../../models/Author.php";

if (isset($_GET['id'])) {
    $authorObject = new Author;
    $authorObject->setId($_GET['id']);
    $result = $authorObject->delete();
    if ($result) {
        $_SESSION["delete"] = "Author Deleted Successfully";
        header("Location:../../../../admin/all_authors.php");
    }else {
        $_SESSION["delete"] = "Somthing Went Wrong Please Try Again";
        header("Location:../../../../admin/all_authors.php");
    }
 }

?>
 

 