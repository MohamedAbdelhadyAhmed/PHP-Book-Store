<?php
// echo __DIR__.'/../database/config.php';
// die();
include_once __DIR__ . '/../database/config.php';
include_once __DIR__ . '/../database/operations.php';
// class Address  extends config implements operations
class Admin  extends config implements operations {
    private $id;
    private $name;
    private $email;
    private $password;
    private $image;
    private $createdAt;
    private $updatedAt;

    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getName() { return $this->name; }
    public function setName($name) { $this->name = $name; }

    public function getEmail() { return $this->email; }
    public function setEmail($email) { $this->email = $email; }

    public function getPassword() { return $this->password; }
    public function setPassword($password) { $this->password = $password; }

    public function getImage() { return $this->image; }
    public function setImage($image) { $this->image = $image; }

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
