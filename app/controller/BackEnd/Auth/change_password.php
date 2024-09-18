


<?php
session_start();
include_once __DIR__ . "/../../../models/Admin.php";
include_once __DIR__ . "/../../../requests/Validation.php";

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

    // $password = $admin_valid->required("password", $_POST['password']);
    // check($password, 'password');

    $new_password = $admin_valid->required("new password", $_POST['new_password']);
    check($new_password, 'new_password');

    $password_confirmation = $admin_valid->required("password confirmation", $_POST['password_confirmation']);
    check($password_confirmation, 'password_confirmation');

    $password_confirm = $admin_valid->confirmed( $_POST['new_password'], $_POST['password_confirmation']);
    check($password_confirm, 'password_confirm');



    // print_r($email_unique );die;
    if (!empty($create_admin_errors)) {
        $_SESSION['login_admin'] = $create_admin_errors;
        // print_r($create_admin_errors);die;

        header("Location:../../../../admin/change-password.php");
        die;
    } else {
        // edit  admin ;
        $adminObject = new Admin;
        $adminObject->setId($_SESSION['admin']->id);
 
        $adminObject->setPassword($_POST['new_password']);
        $result =  $adminObject->updatePassword();
        // print_r($result);die;
        if ($result) {
            $_SESSION["admin_password_updated"] = "Password Updated Successfully ";
            header("Location:../../../../admin/change-password.php");
        } else {
            $_SESSION["admin_password_updated"] = "Somthing Went Wrong Please Try Again";
            header("Location:../../../../admin/change-password.php");
        }
    }
}
