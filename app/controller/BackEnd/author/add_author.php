<?php
session_start();
include_once __DIR__ . "/../../../models/Author.php";
include_once __DIR__ . "/../../../requests/Validation.php";
// echo  __DIR__."/../../../../publice/book_image"; die;

// Validation 
$add_author_errors = [];

function check($variable, $name)
{
    global $add_author_errors;
    if ($variable) {
        $add_author_errors[$name] = $variable;
    }
}

$author_valid = new Validation();

$name = $author_valid->required("Name", $_POST['name']);
check($name, 'name');
// print_r($name);die;


$description = $author_valid->required("Description", $_POST['description']);
check($description, 'description');

// Uploade image 
$image_upload_path = __DIR__ . "/../../../../publice/author_image/";
$allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
$file_size_limit = 2 * 1024 * 1024;

if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
    $image = $_FILES['image'];
    $file_extension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
    $new_file_name = uniqid() . '.' . $file_extension;
    $target_file = $image_upload_path . $new_file_name;

    // Check file type
    if (!in_array($file_extension, $allowed_extensions)) {
        $add_author_errors['image'] = "Invalid image format. Only JPG, PNG, and GIF are allowed.";
    }

    // Check file size
    if ($image['size'] > $file_size_limit) {
        $add_author_errors['image'] = "File size exceeds 2MB limit.";
    }

    // Check if there are no errors
    if (empty($add_author_errors)) {
        // Move the uploaded file to the target directory
        if (!move_uploaded_file($image['tmp_name'], $target_file)) {
            $add_author_errors['image'] = "Failed to upload image. Please try again.";
        }
    }
} else {
    $add_author_errors['image'] = "No image uploaded or there was an error uploading.";
}

// Print the errors, if any
if (!empty($add_author_errors)) {
    $_SESSION['add_author'] = $add_author_errors;
    // print_r($add_author_errors);
    header("Location:../../../../admin/add_author.php");
    die;
} else {
    // store new author ;
    $authorObject = new Author;
    $authorObject->setName($_POST['name']);
    $authorObject->setDescription($_POST['description']);
    $authorObject->setImage($new_file_name);
    $result =  $authorObject->create();
    if ($result) {
        $_SESSION["author_added"] = "Author Added Successfully";
        header("Location:../../../../admin/add_author.php");
    } else {
        $_SESSION["author_added"] = "Somthing Went Wrong Please Try Again";
        header("Location:../../../../admin/add_author.php");
    }
}
