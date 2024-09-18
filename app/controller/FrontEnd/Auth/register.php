
<?php
session_start();


include_once __DIR__ . '/../../../models/User.php';
if($_POST){
  print_r($_POST);
  die;
}
$user = new User();
$user->addUser($_POST['firstname'],$_POST['lastname'],$_POST['email'],$_POST['password']);
$_SESSION['user']['success'] = 'user added successfully';
header("location:../../../../account.php");








?>