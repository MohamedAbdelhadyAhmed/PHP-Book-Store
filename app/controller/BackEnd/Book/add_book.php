<?php
// print_r($_POST);die;
session_start();
include_once __DIR__ . "/../../../models/Book.php";
include_once __DIR__ . "/../../../requests/Validation.php";
// echo  __DIR__."/../../../../publice/book_image"; die;

// Validation 
$add_book_errors = [];

function check($variable, $name)
{
    global $add_book_errors; // Access the global array
    if ($variable) {
        $add_book_errors[$name] = $variable;
    }
}

$book_valid = new Validation();

// Validate Title
$title = $book_valid->required("Title", $_POST['title']);
check($title, 'title');

// Validate Price
$price = $book_valid->required("Price", $_POST['price']);
check($price, 'price');

// Validate Offer
$offer = $book_valid->required("Offer", $_POST['offer']);
check($offer, 'offer');

// Validate Number of Pages
$numberOfPages = $book_valid->required("Number of Pages", $_POST['numberOfPages']);
check($numberOfPages, 'numberOfPages');

// Validate Author ID
$authorId = $book_valid->required("Author ID", $_POST['authorId']);
check($authorId, 'authorId');

// Validate Category ID
$categoryId = $book_valid->required("Category ID", $_POST['categoryId']);
check($categoryId, 'categoryId');

// Validate Publisher ID
$publisherId = $book_valid->required("Publisher ID", $_POST['publisherId']);
check($publisherId, 'publisherId');

// Validate Description
$description = $book_valid->required("Description", $_POST['description']);
check($description, 'description');

// Uploade image 
$image_upload_path = __DIR__ . "/../../../../publice/book_image/";
$allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
$file_size_limit = 2 * 1024 * 1024;

if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
    $image = $_FILES['image'];
    $file_extension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
    $new_file_name = uniqid() . '.' . $file_extension;
    $target_file = $image_upload_path . $new_file_name;

    // Check file type
    if (!in_array($file_extension, $allowed_extensions)) {
        $add_book_errors['image'] = "Invalid image format. Only JPG, PNG, and GIF are allowed.";
    }

    // Check file size
    if ($image['size'] > $file_size_limit) {
        $add_book_errors['image'] = "File size exceeds 2MB limit.";
    }

    // Check if there are no errors
    if (empty($add_book_errors)) {
        // Move the uploaded file to the target directory
        if (!move_uploaded_file($image['tmp_name'], $target_file)) {
            $add_book_errors['image'] = "Failed to upload image. Please try again.";
        }
    }
} else {
    $add_book_errors['image'] = "No image uploaded or there was an error uploading.";
}

// Print the errors, if any
if (!empty($add_book_errors)) {
    $_SESSION['add_book'] = $add_book_errors;
    // print_r($add_book_errors);
    header("Location:../../../../admin/create_book.php");
    // header("Location: /Book_Storev1/admin/create_book.php");
    die;
}else{
    // store new book ;
    $bookObject = new Book;
    $bookObject->setTitle( $_POST['title']);
    $bookObject->setPrice( $_POST['price']);
    $bookObject->setOffer( $_POST['offer']);
    $bookObject->setNumberOfPages( $_POST['numberOfPages']);
    $bookObject->setCategory_id( $_POST['categoryId']);
    $bookObject->setAuthorId( $_POST['authorId']);
    $bookObject->setPublisherId( $_POST['publisherId']);
    $bookObject->setDescription( $_POST['description']);
    $bookObject->setImage($new_file_name);
    $result =  $bookObject->create();
    if ( $result) {
       $_SESSION["book_added"] = "Book Added Successfully";
       header("Location:../../../../admin/create_book.php");

    }else{
        $_SESSION["book_added"] = "Somthing Went Wrong Please Try Again";
        header("Location:../../../../admin/create_book.php");


    }
}

