<?php
// echo __DIR__.'/../database/config.php';
// die();
include_once __DIR__ . '../database/config.php';
// class Address  extends config implements operations
class Subcategory   extends config implements operations {
    private $id;
    private $name;
    private $categoryId;
    private $createdAt;
    private $updatedAt;

    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getName() { return $this->name; }
    public function setName($name) { $this->name = $name; }

    public function getCategoryId() { return $this->categoryId; }
    public function setCategoryId($categoryId) { $this->categoryId = $categoryId; }

    public function getCreatedAt() { return $this->createdAt; }
    public function setCreatedAt($createdAt) { $this->createdAt = $createdAt; }

    public function getUpdatedAt() { return $this->updatedAt; }
    public function setUpdatedAt($updatedAt) { $this->updatedAt = $updatedAt; }
     //================================ Functions Here =====================================================
     public  function create() {}
     public function update() {}
     public function read() {}
     public function delete() {}
}
