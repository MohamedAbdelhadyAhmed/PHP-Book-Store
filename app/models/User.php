<?php
include_once __DIR__ . '/../database/config.php';
include_once __DIR__ . '/../database/operations.php';
class User extends config implements operations
{

    private $id;
    private $first_name;
    private $last_name;
    private $email;
    private $phone;
    private $image;
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
        $this->password = sha1($password);
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

    /**
     * Get the value of first_name
     */
    public function getFirst_name()
    {
        return $this->first_name;
    }

    /**
     * Set the value of first_name
     *
     * @return  self
     */
    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * Get the value of last_name
     */
    public function getLast_name()
    {
        return $this->last_name;
    }

    /**
     * Set the value of last_name
     *
     * @return  self
     */
    public function setLast_name($last_name)
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    //================================ Functions Here =====================================================
    public function create()
    {
        $query = "INSERT INTO `users`(first_name , last_name ,phone, email , `password`) VALUES  
        ('$this->first_name','$this->last_name','$this->phone','$this->email', '$this->password')";
        // print_r( $query );die;
        return $this->runDML($query);
    }
    public function login()
    {
        $query = "SELECT * FROM users WHERE email = '$this->email' AND password = '$this->password'";
        return $this->runDQL($query);
    }

    public function updatePassword($old_Password)
    {
        $query = "SELECT password FROM users WHERE id = $this->id";
        $result =  $this->runDQL($query);
        $p = $result->fetch_object();
        // print_r($p->password);
        // echo "<br>";
        // print_r(sha1($old_Password));
        // die;

        if ($p->password === (sha1($old_Password))) {

            $query = "UPDATE `users` SET password = '$this->password' WHERE id = '$this->id' ";
            return $this->runDML($query);
        } else {
            return false;
        }
    }
    public function update()
    {
        $sql = "UPDATE `users` SET `password` = '$this->password' WHERE `id` = '$this->id'";
        mysqli_query($this->conn, $sql);
    }
    public function read()
    {
        $sql = "SELECT * FROM users WHERE id = $this->id";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_assoc($result);
    }
    public function delete() {}

    public function updateuser()
    {
        $sql = "UPDATE `users` SET `first_name` = '$this->first_name', `last_name` = '$this->last_name', `phone` = '$this->phone', `email` = '$this->email' WHERE `id` = '$this->id'";
        mysqli_query($this->conn, $sql);
    }

    public function Check($column, $value)
    {
        $sql = "SELECT * FROM users WHERE $column = '$value' AND id != $this->id";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $error[$column] = "This $column already exists";
            return $error;
        } else {
            return null;
        }
    }

    public function getuser()
    {
        $sql = "SELECT * FROM users WHERE id = $this->id";
        $result = mysqli_query($this->conn, $sql);
        return $result->fetch_object();
    }
}
