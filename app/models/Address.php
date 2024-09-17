<?php
// echo __DIR__.'/../database/config.php';
// die();
include_once __DIR__ . '/../database/config.php';
include_once __DIR__ . '/../database/operations.php';
// class Address  extends config implements operations
class Address  extends config implements operations{
    private $id;
    private $userId;
    private $city;
    private $state;
    private $street;
    private $not;
    private $createdAt;
    private $updatedAt;

    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getUserId() { return $this->userId; }
    public function setUserId($userId) { $this->userId = $userId; }

    public function getCity() { return $this->city; }
    public function setCity($city) { $this->city = $city; }

    public function getState() { return $this->state; }
    public function setState($state) { $this->state = $state; }

    public function getStreet() { return $this->street; }
    public function setStreet($street) { $this->street = $street; }

    public function getNot() { return $this->not; }
    public function setNot($not) { $this->not = $not; }

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
