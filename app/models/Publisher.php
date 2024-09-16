<?php
// echo __DIR__.'/../database/config.php';
// die();
include_once __DIR__ . '../database/config.php';
// class Address  extends config implements operations
class Publisher  extends config implements operations {
    private $id;
    private $name;
    private $image;
    private $description;
    private $createdAt;
    private $updatedAt;

    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getName() { return $this->name; }
    public function setName($name) { $this->name = $name; }

    public function getImage() { return $this->image; }
    public function setImage($image) { $this->image = $image; }

    public function getDescription() { return $this->description; }
    public function setDescription($description) { $this->description = $description; }

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
