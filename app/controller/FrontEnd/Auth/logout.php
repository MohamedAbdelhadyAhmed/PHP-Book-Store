
<?php
//  print_r($_POST);die;
session_start();
unset($_SESSION['user']);
header("Location:../../../../login.php");
