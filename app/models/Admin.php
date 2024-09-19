<?php
// echo __DIR__.'/../database/config.php';
// die();
include_once __DIR__ . '/../database/config.php';
include_once __DIR__ . '/../database/operations.php';
// class Address  extends config implements operations
class Admin  extends config implements operations
{
    private $id;
    private $name;
    private $email;
    private $password;
    private $image;
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

    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = sha1($password);
    }

    public function getImage()
    {
        return $this->image;
    }
    public function setImage($image)
    {
        $this->image = $image;
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
    //================================ Functions Here =====================================================
    public function create()
    {
        $query = "INSERT INTO `admins`(`name`, `email`, `password`) VALUES  ('$this->name','$this->email', '$this->password')";
       
        return $this->runDML($query);
    }
    public function read()
    {
        $query = "SELECT * FROM admins WHERE id = '$this->id'";
        return $this->runDQL($query);
    }
    public function update()
    {

        $query = "UPDATE `admins` SET `name` = '$this->name' , email = '$this->email' 
        WHERE id = '$this->id'";
        return $this->runDML($query);
    }
    public function delete()
    {
        # code...
    }


    public function login()
    {
        $query = "SELECT * FROM admins WHERE email = '$this->email' AND password = '$this->password'";
        return $this->runDQL($query);
    }

    public function getUserByEmail()
    {
        $query = "SELECT * FROM admins WHERE email = '$this->email'";
        return $this->runDQL($query);
    }



    public function updatePassword()
    {
        $query = "UPDATE `admins` SET password = '$this->password' WHERE id = '$this->id' ";
        return $this->runDML($query);
    }
}
