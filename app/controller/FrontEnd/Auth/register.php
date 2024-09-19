<?php
session_start();
include_once __DIR__ . "/../../../models/User.php";
include_once __DIR__ . "/../../../requests/Validation.php";

if ($_POST) {

    //   print_r($_POST);die;
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


    $firstname = $user_valid->required("firstname", $_POST['firstname']);
    check($firstname, 'firstname');

    $lastname = $user_valid->required("lastname", $_POST['lastname']);
    check($lastname, 'lastname');


    $email = $user_valid->required("email", $_POST['email']);
    check($email, 'email');

    $phone = $user_valid->required("phone", $_POST['phone']);
    check($phone, 'phone');

    $password = $user_valid->required("password", $_POST['password']);
    check($password, 'password');


    $password_confirmation = $user_valid->required("password confirmation", $_POST['password_confirmation']);
    check($password_confirmation, 'password_confirmation');

    $password_confirm = $user_valid->confirmed($_POST['password_confirmation'], $_POST['password']);
    check($password_confirm, 'password_confirm');

    $email_unique = $user_valid->unique('users', 'email', $_POST['email']);
    $phone_unique = $user_valid->unique('users', 'phone', $_POST['phone']);
    // print_r($email_unique );die;
    if (!empty($create_user_errors)) {
        $_SESSION['create_user'] = $create_user_errors;
        header("Location:../../../../account.php");
        die;
    } else {

        if (!empty($email_unique)) {
            $_SESSION['email_unique']['email'] = $email_unique;
            header("Location:../../../../account.php");
            die;
        }
        if (!empty($phone_unique)) {
            $_SESSION['email_unique']['phone'] = $phone_unique;
            header("Location:../../../../account.php");
            die;
        }

        // store new user ;
        $userObject = new User;
        $userObject->setFirst_name($_POST['firstname']);
        $userObject->setLast_name($_POST['lastname']);
        $userObject->setPhone($_POST['phone']);
        $userObject->setEmail($_POST['email']);
        $userObject->setPassword($_POST['password']);

        $result =  $userObject->create();
        // print_r($result);
        // die;

        if ($result) {
            $_SESSION["user_added"] = "user Register Successfully";
            header("Location:../../../../account.php");
        } else {
            $_SESSION["user_added"] = "Somthing Went Wrong Please Try Again";
            header("Location:../../../../account.php");
        }
    }
}
// http://localhost/new%20projects/New%20folder/PHP-Book-Store/user/register.php