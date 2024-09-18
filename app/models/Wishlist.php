<?php
// echo __DIR__.'/../database/config.php';
// die();
include_once __DIR__ . '/../database/config.php';
include_once __DIR__ . '/../database/operations.php';
// class User extends config implements operations
class Wishlist  extends config implements operations
{
    private $id;
    private $userId;
    private $bookId;
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
    public  function create() {}
    public function update() {}
    public function read() {}
    public function delete() {}

    public function addToWishlist($bookId, $userId)
    {
        $sql = "INSERT INTO `wishlists` (`book_id`, `user_id`) VALUES ($bookId, $userId)";
        mysqli_query($this->conn, $sql);
    }

    public function removeFromWishlist($bookId, $userId)
    {
        $sql = "DELETE FROM `wishlists` WHERE `book_id` = $bookId AND `user_id` = $userId";
        mysqli_query($this->conn, $sql);
    }

    public function removeAllFromWishlist($userId)
    {
        $sql = "DELETE FROM `wishlists` WHERE `user_id` = $userId";
        mysqli_query($this->conn, $sql);
    }
    public function getWishlist($userId)
    {
        $sql = "SELECT wishlists.*, books.title, books.price, books.offer, books.image FROM `wishlists` INNER JOIN `books` ON `wishlists`.`book_id` = `books`.`id` WHERE `user_id` = $userId";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function checkWishlistbyBookId($bookId, $userId)
    {
        $sql = "SELECT * FROM `wishlists` WHERE `user_id` = '$userId' AND `book_id` = '$bookId'";
        return mysqli_query($this->conn, $sql);
    }
}
