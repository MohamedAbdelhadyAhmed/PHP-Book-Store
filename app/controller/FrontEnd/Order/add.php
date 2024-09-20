<?php
session_start();
include_once __DIR__ . "/../../../models/Order.php";
include_once __DIR__ . "/../../../models/OrderItem.php";
include_once __DIR__ . "/../../../models/Cart.php";
include_once __DIR__ . "/../../../models/Address.php";
include_once __DIR__ . "/../../../models/Book.php";

$Order = new Order();

if ($_POST) {

    // print_r($_POST);
    // die;

    $city = $_POST['city'];
    $state = $_POST['state'];
    $street = $_POST['street'];

    // $phone = $_POST['phone'];
    // $first_name = $_POST['first_name'];
    // $last_name = $_POST['last_name'];
    // $email = $_POST['email'];
    $notes = $_POST['not'];
    $total_price = $_POST['total_price'];
    $user_id = $_SESSION['user']->id;
    // $address_id = $_GET['address_id'];




    // store data in address and get add_id 
    // 
    $addressObject  = new Address;
    $addressObject->setUserId($user_id);
    $addressObject->setCity($city);
    $addressObject->setState($state);
    $addressObject->setStreet($street);
    $address_id  = $addressObject->create();
    // var_dump($address_id);die;

    if ($address_id) {
        $order = new Order;
        $order->setUserId($user_id);
        $order->setAddressId($address_id);
        $order->setTotal_amount($total_price);
        $order_id  = $order->create();
        // var_dump($order_id);die;
    }
    if ($order_id) {
        $cart = new Cart();
        $cart->setUserId($user_id);

        //all data in this array $cart_items
        $cart_result = $cart->read();
        $cart_items = $cart_result->fetch_all(MYSQLI_ASSOC);
        // var_dump($cart_items);
        // die;
        if ($cart_items) {
            foreach ($cart_items as   $item) {
                // print_r($item['book_id']);die;
                $order_itemsObject = new OrderItem();
                $Book = new Book();
                $Book->setId($item['book_id']);
                $Book->update();
                $order_itemsObject->setOrderId($order_id);
                $order_itemsObject->setBookId($item['book_id']);
                $order_itemsObject->setQuantity($item['quantity']);
                $order_itemsObject->setPrice($item['price']);
                $result = $order_itemsObject->create();
            }
            $cart_remove =  $cart->removeAllFromCart($user_id);

            if ($cart_remove) {
                $_SESSION['order']['add'] = "تم اضافة الطلب بنجاح";
                header("location: ../../../../order-recieved.php?id=$order_id");
            } else {
                $_SESSION['order']['add'] = "Somthing Went Wrong Please Try Again";
                header("location: ../../../../index.php");
            }
        }
    }
}
// $conn = mysqli_connect("localhost", "root", "", "book_store2");
// $sql = "SELECT * FROM `addresses` WHERE `state` = '$state' AND `street` = '$street' AND `user_id` = $user_id";
// $result = mysqli_query($conn, $sql);
// if ($result->num_rows == 0) {
//     $sql = "INSERT INTO `addresses` (`state`, `street`, `user_id`) VALUES ('$state', '$street', $user_id)";
//     $result = mysqli_query($conn, $sql);
//     $address_id = mysqli_insert_id($conn);
// }
// $Order->add_order($user_id, $address_id, $total);
// $orders = $Order->get_order_by_id($user_id);
// $order_id = $orders['id'];
// $cart = new Cart();
// $cart_items = $cart->getCartItems($user_id);
// $order_items = new OrderItem();
// while ($cart_item = mysqli_fetch_assoc($cart_items)) {
//     $book_id = $cart_item['book_id'];
//     $quantity = $cart_item['quantity'];
//     $price = $cart_item['price'];
//     $order_items->add_order_item($order_id, $book_id, $quantity, $price, $user_id);
// }
// $cart->removeAllFromCart($user_id);
// $_SESSION['order']['add'] = "تم اضافة الطلب بنجاح";
// header("location: ../../../../order-recieved.php?id=$order_id");
