<?php

include_once __DIR__ . '/../database/config.php';
include_once __DIR__ . '/../database/operations.php';

class User extends config implements operations
{

    private $id;
    private $name; 
    private $email;
    private $phone;
    private $password;
    private $status;
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

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPhone()
    {
        return $this->phone;
    }
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($status)
    {
        $this->status = $status;
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
    public  function create() {




        
    }
    public function update() {}
    public function read() {}
    public function delete() {}

    

    public function addUser($firstname , $lastname , $email ,$password ){
      
      $sql = "INSERT INTO `users` ( first_name , last_name , email , `password`) 
        VALUES ('$firstname' , '$lastname' ,'$email' , '$password')";
        mysqli_query($this->conn, $sql);

    }

    //check username already exists.
    private function nameExists($firstname,$lastname){
      $sql = "SELECT * FROM users WHERE first_name = '$firstname' and last_name = '$lastname'  ";
      $result = mysqli_query($this->conn, $sql);
      return mysqli_num_rows($result) > 0;
    }

    //check email already exists.
    private function emailExists(){
      $sql = "SELECT * FROM users WHERE email = '$this->email'";
      $result = mysqli_query($this->conn, $sql);
      return mysqli_num_rows($result) > 0;
    }


}
