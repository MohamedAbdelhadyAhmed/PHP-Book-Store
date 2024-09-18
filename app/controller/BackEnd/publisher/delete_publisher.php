<?php
session_start();
include_once __DIR__ . "/../../../models/Publisher.php";

if (isset($_GET['id'])) {
    $publisherObject = new Publisher;
    $publisherObject->setId($_GET['id']);
    $result = $publisherObject->delete();
    if ($result) {
        $_SESSION["delete"] = "Publisher Deleted Successfully";
        header("Location:../../../../admin/all_publisher.php");
    }else {
        $_SESSION["delete"] = "Somthing Went Wrong please Try Again";
        header("Location:../../../../admin/all_publisher.php");
    }
 }

?>
 

 