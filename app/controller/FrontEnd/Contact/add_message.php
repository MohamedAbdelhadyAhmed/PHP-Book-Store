<?php
session_start();
require_once __DIR__ . "/../../../models/Contact.php";

$contact = new Contact();
$contact->resetError();
$contact->setName($_POST['first_name'], $_POST['last_name']);
$contact->setEmail($_POST['email']);
$contact->setPhone($_POST['phone']);
$contact->setTitle($_POST['title']);
$contact->setMessage($_POST['message']);
$user_id = $_SESSION['user']['id'] ?? 1;
$_SESSION['error'] = $contact->getError();
if (!empty($_SESSION['error'])) {
} else {
    $result = $contact->add_message($user_id);
    $_SESSION['contact']['add'] = "Contact Added Successfully";
}
echo "<script>window.history.back()</script>";
