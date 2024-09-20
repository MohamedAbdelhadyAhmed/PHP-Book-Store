<?php
include_once __DIR__ . "/../../../models/Order.php";

if ($_POST) {

    $OrderObject = new Order;
    $OrderObject->setStatus($_POST['status']);
    $OrderObject->setId($_POST['order_id']);
    $result = $OrderObject->update();

    if ($result) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    } else {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}
