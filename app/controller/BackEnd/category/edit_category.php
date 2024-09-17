<?php
session_start();
include_once __DIR__ . "/../../../models/Category.php";
include_once __DIR__ . "/../../../requests/Validation.php";
// print_r($_GET);
// die;
if (isset($_GET['id'])) {
    $CategoriesObject = new Category;
    $CategoriesObject->setId($_GET['id']);
    $CategoriesObject->setName($_POST['name']);
    $result = $CategoriesObject->update();
    if ($result) {
        $_SESSION["category_updated"] = "Category Updated Successfully";
        header("Location:../../../../admin/edit_category.php?id=".$_GET['id']);
    }else {
        $_SESSION["category_updated"] = "Somthing Went Wrong Please Try Again";
        header("Location:../../../../admin/edit_category.php?id =".$_GET['id']);
    }
 }

?>
 

 