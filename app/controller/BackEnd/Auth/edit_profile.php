

<?php
// print_r($_POST);die;
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

    $name = $admin_valid->required("name", $_POST['name']);
    check($name, 'name');
    $email = $admin_valid->required("email", $_POST['email']);
    check($email, 'email');



    // print_r($email_unique );die;
    if (!empty($create_admin_errors)) {
        $_SESSION['login_admin'] = $create_admin_errors;
        header("Location:../../../../admin/profile.php");
        die;
    } else {
        // edit  admin ;
        $adminObject = new Admin;
        $adminObject->setId($_POST['id']);
        $adminObject->setName($_POST['name']);
        $adminObject->setEmail($_POST['email']);
        $result =  $adminObject->update();
        if ($result) {
            $new_admin = $adminObject->read();
            $admin = $new_admin->fetch_object();
            $_SESSION["admin"] = $admin;
            $_SESSION["admin_profile_updated"] = "Admin's Date Updated Successfully ";
            header("Location:../../../../admin/profile.php");
        } else {
            $_SESSION["admin_profile_updated"] = "Somthing Went Wrong Please Try Again";
            header("Location:../../../../admin/profile.php");
        }
    }
}
