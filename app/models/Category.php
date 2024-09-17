<?php
// echo __DIR__.'/../database/config.php';
// die();
include_once __DIR__ . '/../database/config.php';
include_once __DIR__ . '/../database/operations.php';// class Address  extends config implements operations
class Category  extends config implements operations
{
    private $id;
    private $name;
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

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
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

        $sql = "
        INSERT INTO categories (name)
        VALUES ('$this->name' )";

        return $this->runDML($sql);
    }
    public function update() {
        $sql  = "UPDATE `categories` SET  `name`='$this->name'  WHERE `id`  =  '$this->id'";
        return $this->runDML($sql);
    }
    public function read() {
        $sql  = "SELECT `id`,`name` FROM `categories`";
        return $this->runDQL($sql);

    }
    public function getCategoryById() {
        $sql  = "SELECT `id`,`name` FROM `categories` WHERE `id`  = '$this->id'";
        return $this->runDQL($sql);

    }
    public function delete() {
        $sql  = " DELETE FROM `categories`  WHERE `id`='$this->id'" ;
        return $this->runDML($sql);
    }
}
