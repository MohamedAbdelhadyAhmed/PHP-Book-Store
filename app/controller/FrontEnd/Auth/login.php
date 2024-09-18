
<?php
//  print_r($_POST);die;
session_start();
include_once __DIR__ . "/../../../models/User.php";
include_once __DIR__ . "/../../../requests/Validation.php";
// echo  __DIR__."/../../../../publice/book_image"; die;

if ($_POST) {
    // Validation 
    $create_user_errors = [];

    function check($variable, $name)
    {
        global $create_user_errors; // Access the global array
        if ($variable) {
            $create_user_errors[$name] = $variable;
        }
    }

    $user_valid = new Validation();

    $email = $user_valid->required("email", $_POST['email']);
    check($email, 'email');


    $password = $user_valid->required("password", $_POST['password']);
    check($password, 'password');
    // print_r($email_unique );die;
    if (!empty($create_user_errors)) {
        $_SESSION['login_user'] = $create_user_errors;
        header("Location:../../../../account.php");
        die;
    } else {

        // store new user ;
        $userObject = new user;
        $userObject->setEmail($_POST['email']);
        $userObject->setPassword($_POST['password']);

        $result =  $userObject->login();
        if ($result) {
            // print_r($result );die;
            $user = $result->fetch_object();
            $_SESSION["user"] = $user ;
            print_r(  $_SESSION["user"]);
            die;
            header("Location:../../../../account.php");
        } else {
            $_SESSION["user_added"] = "Somthing Went Wrong Please Try Again";
            header("Location:../../../../account.php");
        }
    }
}

