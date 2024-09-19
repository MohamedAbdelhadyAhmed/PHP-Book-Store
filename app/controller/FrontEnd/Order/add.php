<?php
session_start();

include_once __DIR__ . "/../../../models/Order.php";
include_once __DIR__ . "/../../../models/OrderItem.php";
include_once __DIR__ . "/../../../models/Cart.php";

$Order = new Order();

$state = $_POST['state'];
$street = $_POST['street'];
$phone = $_POST['phone'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$notes = $_POST['notes'];
$total = $_GET['total'];
$user_id = $_GET['user_id'];
$address_id = $_GET['address_id'];

$conn = mysqli_connect("localhost", "root", "", "book_store2");
$sql = "SELECT * FROM `addresses` WHERE `state` = '$state' AND `street` = '$street' AND `user_id` = $user_id";
$result = mysqli_query($conn, $sql);
if ($result->num_rows == 0) {
    $sql = "INSERT INTO `addresses` (`state`, `street`, `user_id`) VALUES ('$state', '$street', $user_id)";
    $result = mysqli_query($conn, $sql);
    $address_id = mysqli_insert_id($conn);
}
$Order->add_order($user_id, $address_id, $total);
$orders = $Order->get_order_by_id($user_id);
$order_id = $orders['id'];
$cart = new Cart();
$cart_items = $cart->getCartItems($user_id);
$order_items = new OrderItem();
while ($cart_item = mysqli_fetch_assoc($cart_items)) {
    $book_id = $cart_item['book_id'];
    $quantity = $cart_item['quantity'];
    $price = $cart_item['price'];
    $order_items->add_order_item($order_id, $book_id, $quantity, $price, $user_id);
}
$cart->removeAllFromCart($user_id);
$_SESSION['order']['add'] = "تم اضافة الطلب بنجاح";
header("location: ../../../../order-recieved.php?id=$order_id");
