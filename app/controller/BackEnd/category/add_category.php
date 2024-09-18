<?php
//   print_r($_POST);die;
session_start();
include_once __DIR__ . "/../../../models/Category.php";
include_once __DIR__ . "/../../../requests/Validation.php";
// echo  __DIR__."/../../../../publice/book_image"; die;

// Validation 
$add_category_errors = [];

// function check($variable, $name)
// {
//     global $add_category_errors; // Access the global array
//     if ($variable) {
//         $add_category_errors[$name] = $variable;
//     }
// }


$category_valid = new Validation();

$name = $category_valid->required("Name", $_POST['name']);
if ($name) {
    $add_category_errors['name'] = $name;
}

if (!empty($add_category_errors)) {
    $_SESSION['add_book'] = $add_category_errors;
    // print_r($add_category_errors);
    header("Location:../../../../admin/add_category.php");
    // header("Location: /Book_Storev1/admin/create_book.php");
    die;
} else {
    // store new Category ;
    $categoryObject = new Category;
    $categoryObject->setName($_POST['name']);
    $result =  $categoryObject->create();
    if ($result) {
        $_SESSION["category_added"] = "Category Added Successfully";
        header("Location:../../../../admin/all_categories.php");
    } else {
        $_SESSION["category_added"] = "Somthing Went Wrong Please Try Again";
        header("Location:../../../../admin/all_categories.php");
    }
}
