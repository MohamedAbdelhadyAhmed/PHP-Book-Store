<?php
// print_r($_POST);die;
session_start();
include_once __DIR__ . "/../../../models/Book.php";
include_once __DIR__ . "/../../../requests/Validation.php";
// echo  __DIR__."/../../../../publice/book_image"; die;

if ($_POST) {
    // print_r($_POST);die;
    $add_book_errors = [];

function check($variable, $name)
{
    global $add_book_errors; // Access the global array
    if ($variable) {
        $add_book_errors[$name] = $variable;
    }
}

$book_valid = new Validation();


$title = $book_valid->required("Title", $_POST['title']);
check($title, 'title');


$price = $book_valid->required("Price", $_POST['price']);
check($price, 'price');


$offer = $book_valid->required("Offer", $_POST['offer']);
check($offer, 'offer');
$lang = $book_valid->required("lang", $_POST['lang']);
check($lang, 'lang');


$numberOfPages = $book_valid->required("Number of Pages", $_POST['numberOfPages']);
check($numberOfPages, 'numberOfPages');


$authorId = $book_valid->required("Author ID", $_POST['authorId']);
check($authorId, 'authorId');


$categoryId = $book_valid->required("Category ID", $_POST['categoryId']);
check($categoryId, 'categoryId');


$publisherId = $book_valid->required("Publisher ID", $_POST['publisherId']);
check($publisherId, 'publisherId');


$description = $book_valid->required("Description", $_POST['description']);
check($description, 'description');
 

if (!empty($add_book_errors)) {
    $_SESSION['add_book'] = $add_book_errors;
    // print_r($add_book_errors);
    header("Location:../../../../admin/create_book.php");
    // header("Location: /Book_Storev1/admin/create_book.php");
    die;
}else{
    // store new book ;
    $bookObject = new Book;
    $bookObject->setId( $_GET['id']);
    $bookObject->setTitle( $_POST['title']);
    $bookObject->setPrice( $_POST['price']);
    $bookObject->setOffer( $_POST['offer']);
    $bookObject->setLang( $_POST['lang']);
    $bookObject->setNumberOfPages( $_POST['numberOfPages']);
    $bookObject->setCategory_id( $_POST['categoryId']);
    $bookObject->setAuthorId( $_POST['authorId']);
    $bookObject->setPublisherId( $_POST['publisherId']);
    $bookObject->setDescription( $_POST['description']);
     $result =  $bookObject->updateBook();
 
    if ( $result) {
       $_SESSION["book_added"] = "Book Updated  Successfully";
       header("Location:../../../../admin/edit_book.php");
    }else{
        $_SESSION["book_added"] = "Somthing Went Wrong Please Try Again";
        header("Location:../../../../admin/edit_book.php");
    }
}
}
