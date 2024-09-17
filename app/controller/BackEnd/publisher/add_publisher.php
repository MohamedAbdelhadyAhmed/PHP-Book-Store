<?php
session_start();
include_once __DIR__ . "/../../../models/Publisher.php";
include_once __DIR__ . "/../../../requests/Validation.php";
// echo  __DIR__."/../../../../publice/book_image"; die;

// Validation 
$add_publisher_errors = [];

function check($variable, $name)
{
    global $add_publisher_errors;
    if ($variable) {
        $add_publisher_errors[$name] = $variable;
    }
}

$publisher_valid = new Validation();

$name = $publisher_valid->required("Name", $_POST['name']);
check($name, 'name');
// print_r($name);die;


$phone = $publisher_valid->required("Phone", $_POST['phone']);
check($phone, 'phone');

if (!empty($add_publisher_errors)) {
    $_SESSION['add_publisher'] = $add_publisher_errors;
    // print_r($add_publisher_errors);
    header("Location:../../../../admin/add_publisher.php");
    die;
} else {
    // store new publisher ;
    $publisherObject = new publisher;
    $publisherObject->setName($_POST['name']);
    $publisherObject->setPhone($_POST['phone']);
    $result =  $publisherObject->create();
    if ($result) {
        $_SESSION["publisher_added"] = "Publisher Added Successfully";
        header("Location:../../../../admin/add_publisher.php");
    } else {
        $_SESSION["publisher_added"] = "Somthing Went Wrong Please Try Again";
        header("Location:../../../../admin/add_publisher.php");
    }
}
