
<?php
//  print_r($_POST);die;
session_start();
include_once __DIR__ . "/../../../models/Admin.php";
include_once __DIR__ . "/../../../requests/Validation.php";
// echo  __DIR__."/../../../../publice/book_image"; die;

if ($_POST){
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


    $password = $admin_valid->required("password", $_POST['password']);
    check($password, 'password');


    $password_confirmation = $admin_valid->required("password confirmation", $_POST['password_confirmation']);
    check($password_confirmation, 'password_confirmation');

    $password_confirm = $admin_valid->confirmed($_POST['password_confirmation'] ,$_POST['password']);
    check($password_confirm, 'password_confirm');

    $email_unique = $admin_valid->unique('admins', 'email', $_POST['email']);
    // print_r($email_unique );die;

    if (!empty($create_admin_errors)) {
        $_SESSION['create_admin'] = $create_admin_errors;
        header("Location:../../../../admin/register.php");
        die;
    } else {

        if (!empty($email_unique)) {
            $_SESSION['email_unique'] = $email_unique;
            header("Location:../../../../admin/register.php");
            die;
        }

        // store new admin ;
        $adminObject = new Admin;
        $adminObject->setName($_POST['name']);
        $adminObject->setEmail($_POST['email']);
        $adminObject->setPassword($_POST['password']);
        $result =  $adminObject->create();
        
        if ($result) {
            $_SESSION["admin_added"] = "admin Register Successfully";
            header("Location:../../../../admin/register.php");
        } else {
            $_SESSION["admin_added"] = "Somthing Went Wrong Please Try Again";
            header("Location:../../../../admin/register.php");
        }
    }
}
