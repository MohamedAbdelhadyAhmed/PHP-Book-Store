<?php
// echo __DIR__.'/../database/config.php';
// die();
include_once __DIR__ . '/../database/config.php';
include_once __DIR__ . '/../database/operations.php';
// class Address  extends config implements operations
class Order  extends config implements operations {
    private $id;
    private $userId;
    private $addressId;
    private $status;
    private $createdAt;
    private $updatedAt;

    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getUserId() { return $this->userId; }
    public function setUserId($userId) { $this->userId = $userId; }

    public function getAddressId() { return $this->addressId; }
    public function setAddressId($addressId) { $this->addressId = $addressId; }

    public function getStatus() { return $this->status; }
    public function setStatus($status) { $this->status = $status; }

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

