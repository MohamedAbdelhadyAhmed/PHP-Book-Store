


<?php
session_start();
include_once __DIR__ . "/../../../models/User.php";
include_once __DIR__ . "/../../../requests/Validation.php";;

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

    $password = $user_valid->required("password", $_POST['password']);
    check($password, 'password');

    $new_password = $user_valid->required("new password", $_POST['new_password']);
    check($new_password, 'new_password');

    $password_confirmation = $user_valid->required("password confirmation", $_POST['password_confirmation']);
    check($password_confirmation, 'password_confirmation');

    $password_confirm = $user_valid->confirmed($_POST['new_password'], $_POST['password_confirmation']);
    check($password_confirm, 'password_confirm');



    if (!empty($create_user_errors)) {
        $_SESSION['password_user'] = $create_user_errors;
        header("Location:../../../../account_details.php");
        die;
    } else {
        $userObject = new User;
        $userObject->setId($_SESSION['user']->id);
        $userObject->setPassword($_POST['new_password']);
        $old_Password = $_POST['password'];
        $result =  $userObject->updatePassword($old_Password);
        if ($result) {
            $_SESSION["user_password_updated"] = "Password Updated Successfully ";
            header("Location:../../../../account_details.php");
            die;
        } else {
            $_SESSION["user_password_updated"] = "Somthing Went Wrong Please Try Again";
            header("Location:../../../../account_details.php");
            die;
        }
    }
}
