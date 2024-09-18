<?php
session_start();
include_once __DIR__ . "/../../../models/Category.php";

if (isset($_GET['id'])) {
    $CategoriesObject = new Category;
    $CategoriesObject->setId($_GET['id']);
    $result = $CategoriesObject->delete();
    if ($result) {
        $_SESSION["delete"] = "Category Deleted Successfully";
        header("Location:../../../../admin/all_categories.php");
    }else {
        $_SESSION["delete"] = "Somthing Went Wrong Please Try Again";
        header("Location:../../../../admin/all_categories.php");
    }
 }

?>
 

 