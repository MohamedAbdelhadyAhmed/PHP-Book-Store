<?php
// echo __DIR__.'/../database/config.php';
// die();
include_once __DIR__ . '/../database/config.php';
include_once __DIR__ . '/../database/operations.php';
// class Cart extends config implements operations
class Cart  extends config implements operations
{
    private $id;
    private $userId;
    private $bookId;
    private $quantity;
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

    public function getUserId()
    {
        return $this->userId;
    }
    public function setUserId($userId)
    {
        $this->userId = $userId;
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

    public function create()
    {
        $sql = "INSERT INTO `cart`(`user_id`, `book_id`, `quantity`) VALUES ($this->userId, $this->bookId, $this->quantity)";
        return $this->conn->query($sql);
    }

    public function read() {}
    public function update() {}
    public function delete() {}

    public function addToCart($bookId, $quantity, $userId)
    {
        $this->setBookId($bookId);
        $this->setQuantity($quantity);
        $this->setUserId($userId);
        $this->create();
    }

    public function checkofCart($bookId, $userId, $quantity)
    {
        $sql = "SELECT * FROM `cart` WHERE `book_id` = $bookId AND `user_id` = $userId";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $this->updateCart($bookId, $userId, $quantity);
        } else {
            $this->addToCart($bookId, $quantity, $userId);
        }
    }

    public function updateCart($bookId, $userId, $quantity)
    {
        $sql = "UPDATE `cart` SET `quantity` = $quantity + `quantity` WHERE `book_id` = $bookId AND `user_id` = $userId";
        return $this->conn->query($sql);
    }

    public function getCartItems($userId)
    {
        $sql = "SELECT cart.*, books.title, books.price, books.offer, books.image FROM `cart` INNER JOIN `books` ON `cart`.`book_id` = `books`.`id` WHERE `user_id` = $userId";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function removeFromCart($Id, $userId)
    {
        $sql = "DELETE FROM `cart` WHERE `id` = $Id AND `user_id` = $userId";
        $this->conn->query($sql);
    }

    public function removeAllFromCart($userId)
    {
        $sql = "DELETE FROM `cart` WHERE `user_id` = $userId";
        $this->conn->query($sql);
    }
}
