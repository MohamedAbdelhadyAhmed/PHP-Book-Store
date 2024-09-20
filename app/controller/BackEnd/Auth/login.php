

<?php
//  print_r($_POST);die;
session_start();
include_once __DIR__ . "/../../../models/Admin.php";
include_once __DIR__ . "/../../../requests/Validation.php";
// echo  __DIR__."/../../../../publice/book_image"; die;

if ($_POST) {
    // Validation 
    $create_admin_errors = [];

    function check($variable, $name)
    {
        global $create_admin_errors; // Access the global array
        if ($variable) {
            $create_admin_errors[$name] = $variable;
        }
    }

    $admin_valid = new Validation();

    $email = $admin_valid->required("email", $_POST['email']);
    check($email, 'email');


    $password = $admin_valid->required("password", $_POST['password']);
    check($password, 'password');
    // print_r($email_unique );die;
    if (!empty($create_admin_errors)) {
        $_SESSION['login_admin'] = $create_admin_errors;
        header("Location:../../../../admin/login.php");
        die;
    } else {

        // store new admin ;
        $adminObject = new Admin;
        $adminObject->setEmail($_POST['email']);
        $adminObject->setPassword($_POST['password']);
        $result =  $adminObject->login();
        if ($result) {
            // print_r($result );die;
            $admin = $result->fetch_object();
            $_SESSION["admin"] = $admin ;
            header("Location:../../../../admin/index.php");
        } else {
            $_SESSION["admin_added"] = "Somthing Went Wrong Please Try Again";
            header("Location:../../../../admin/login.php");
        }
    }
}
