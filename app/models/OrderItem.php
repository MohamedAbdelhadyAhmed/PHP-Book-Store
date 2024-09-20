<?php
// echo __DIR__.'/../database/config.php';
// die();
include_once __DIR__ . '/../database/config.php';
include_once __DIR__ . '/../database/operations.php';
// class Address  extends config implements operations
class OrderItem  extends config implements operations
{
    private $id;
    private $orderId;
    private $bookId;
    private $quantity;
    private $price;
    private $createdAt;
    private $updatedAt;

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getOrderId()
    {
        return $this->orderId;
    }
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
    }

    public function getBookId()
    {
        return $this->bookId;
    }
    public function setBookId($bookId)
    {
        $this->bookId = $bookId;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function getPrice()
    {
        return $this->price;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }
    //================================ Functions Here =====================================================
    public  function create()
    {

        $query = "INSERT INTO `order_items` (`order_id`, `book_id`, `quantity`, `price`) 
         VALUES ($this->orderId, $this->bookId, $this->quantity, $this->price )";
        return $this->runDML($query);
    }
    public function update() {}
    public function read()
    {
        // $query = "SELECT `order_items`.*, `books`.`title`, `books`.`offer`, `orders`.`status`, `orders`.`total_amount`,`addresses`.`not`,`addresses`.CONCAT(`city`, ', ', `state`, ', ', `street`) AS full_address FROM `order_items` 
        // INNER JOIN `books` ON `order_items`.`book_id` = `books`.`id` 
        // INNER JOIN `orders` ON `order_items`.`order_id` = `orders`.`id` 
        // INNER JOIN `addresses` ON `addresses`.`id` = `orders`.`shipping_address_id` 
        // WHERE `order_items`.`order_id` = $this->orderId";
        $query = "SELECT `order_items`.*, 
                 `books`.`title`, 
                 `books`.`offer`, 
                 `orders`.`status`, 
                 `orders`.`total_amount`, 
                 `addresses`.`not`, 
                 CONCAT(`addresses`.`city`, ', ', `addresses`.`state`, ', ', `addresses`.`street`) AS full_address 
          FROM `order_items` 
          INNER JOIN `books` ON `order_items`.`book_id` = `books`.`id` 
          INNER JOIN `orders` ON `order_items`.`order_id` = `orders`.`id` 
          INNER JOIN `addresses` ON `addresses`.`id` = `orders`.`shipping_address_id` 
          WHERE `order_items`.`order_id` = $this->orderId";

        return $this->runDQL($query);
    }
    public function delete() {}

    public function add_order_item($order_id, $book_id, $quantity, $price, $user_id)
    {
        $conn = mysqli_connect("localhost", "root", "", "book_store2");
        $sql = "INSERT INTO `order_items` (`order_id`, `book_id`, `quantity`, `price`)
         VALUES ($order_id, $book_id, $quantity, $price, $user_id)";
        $result = mysqli_query($conn, $sql);
    }

    public function GetOrderItems($order_id, $user_id)
    {
        $query = "SELECT `order_items`.*, `books`.`title`, `books`.`offer`, `orders`.`status`, `orders`.`total_amount` FROM `order_items` 
        INNER JOIN `books` ON `order_items`.`book_id` = `books`.`id` 
        INNER JOIN `orders` ON `order_items`.`order_id` = `orders`.`id` 
        WHERE `order_items`.`order_id` = $order_id AND `orders`.`user_id` = $user_id";
        $result = $this->conn->query($query);
        return $result;
    }

    public function GetOrderItemsbyEmail($order_id, $user_id, $email)
    {
        $query = "SELECT `order_items`.*, `books`.`title`, `books`.`offer`, `orders`.`status`, `orders`.`total_amount` FROM `order_items` 
        INNER JOIN `books` ON `order_items`.`book_id` = `books`.`id` 
        INNER JOIN `orders` ON `order_items`.`order_id` = `orders`.`id`
        INNER JOIN `users` ON `orders`.`user_id` = `users`.`id`
        INNER JOIN `addresses` ON `users`.`id` = `addresses`.`user_id` 
        WHERE `order_items`.`order_id` = $order_id AND `orders`.`user_id` = $user_id AND `users`.`email` = '$email'";
        $result = $this->conn->query($query);
        return $result;
    }
}
