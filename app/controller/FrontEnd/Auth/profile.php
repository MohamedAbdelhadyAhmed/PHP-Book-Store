<?php
session_start();
include_once __DIR__ . "/../../../models/User.php";
$user = new User;
$user->setId($_SESSION['user']->id);
if (($_SESSION['user']->email == $_POST['email']) && ($_SESSION['user']->phone == $_POST['phone']) && ($_SESSION['user']->first_name == $_POST['first_name']) && ($_SESSION['user']->last_name == $_POST['last_name'])) {
    $_SESSION['user_profile_updated'] = "لا توجد تغييرات لتحديث الملف الشخصي";
    echo "<script>window.history.back()</script>";
    exit();
} else {
    if (empty($user->Check('email', $_POST['email'])) && empty($user->Check('phone', $_POST['phone']))) {
        $user->setEmail($_POST['email']);
        $user->setPhone($_POST['phone']);
        $user->setFirst_name($_POST['first_name']);
        $user->setLast_name($_POST['last_name']);
        $user->updateuser();
        $_SESSION['user'] = $user->getuser();
        $_SESSION['user_profile_updated'] = "تم تحديث الملف الشخصي بنجاح";
        echo "<script>window.history.back()</script>";
        exit();
    } elseif (!empty($user->Check('email', $_POST['email']))) {
        $_SESSION['errors']['email'] = "هذا البريد الالكتروني مستخدم من قبل";
        echo "<script>window.history.back()</script>";
        exit();
    } elseif (!empty($user->Check('phone', $_POST['phone']))) {
        $_SESSION['errors']['phone'] = "هذا الهاتف مستخدم من قبل";
        echo "<script>window.history.back()</script>";
        exit();
    }
}
