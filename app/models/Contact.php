<?php
// echo __DIR__.'/../database/config.php';
// die();
include_once __DIR__ . '/../database/config.php';
include_once __DIR__ . '/../database/operations.php';
// class Address  extends config implements operations
class Contact  extends config implements operations
{
    private $id;
    private $name;
    private $email;
    private $phone;
    private $title;
    private $message;
    private $createdAt;
    private $updatedAt;
    private $error = ['contact' => ''];

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
    public function setName($first_name, $last_name)
    {
        if (!empty($this->ValidateName($first_name)) || !empty($this->ValidateName($last_name))) {
            $error['name'] = 'Invalid Name Format';
            $this->error['contact'] = $error;
        } else {
            $this->name = $first_name . ' ' . $last_name;
        }
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        if (!empty($this->ValidateEmail($email))) {
            $error['email'] = 'Invalid Email Format';
            $this->error['contact'] = $error;
        } else {
            $this->email = $email;
        }
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        if (!empty($this->ValidatePhone($phone))) {
            $error['phone'] = 'Invalid Phone Format';
            $this->error['contact'] = $error;
        } else {

            $this->phone = $phone;
        }
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        if (!empty($this->ValidateTitle($title))) {
            $error['title'] = 'Invalid Title Format';
            $this->error['contact'] = $error;
        } else {
            $this->title = $title;
        }
    }

    public function getMessage()
    {
        return $this->message;
    }
    public function setMessage($message)
    {
        if (!empty($this->ValidateMessage($message))) {
            $error['message'] = 'Invalid Message Format';
            $this->error['contact'] = $error;
        } else {
            $this->message = $message;
        }
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
        $sql = "INSERT INTO contacts (`name`, `email`, `phone`, `title`, `message`) VALUES ('$this->name', '$this->email', $this->phone, '$this->title', '$this->message')";
        mysqli_query($this->conn, $sql);
    }
    public function update() {}
    public function read() {}
    public function delete() {}

    public function ValidateName($name)
    {
        if (!preg_match("/^[\p{L}\s]+$/u", $name)) {
            return "Name can only contain letters and spaces.";
        } elseif (strlen($name) < 2 || strlen($name) > 50) {
            return "Name must be between 2 and 50 characters long.";
        } else {
            return null;
        }
    }

    public function ValidateEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format";
        } else {
            return null;
        }
    }

    public function ValidatePhone($phone)
    {
        if (!preg_match("/^[0-9]+$/", $phone)) {
            return "Phone can only contain numbers.";
        } elseif (strlen($phone) != 11) {
            return "Phone number must be 11 digits long.";
        } else {
            return null;
        }
    }

    public function ValidateTitle($title)
    {
        if (!preg_match("/^[\p{L}\s]+$/u", $title)) {
            return "Title can only contain letters and spaces.";
        } elseif (strlen($title) < 2 || strlen($title) > 50) {
            return "Title must be between 2 and 50 characters long.";
        } else {
            return null;
        }
    }

    public function ValidateMessage($message)
    {
        if (strlen($message) < 10 || strlen($message) > 500) {
            return "Message must be between 10 and 500 characters long.";
        } else {
            return null;
        }
    }

    public function getError()
    {
        return $this->error;
    }

    public function getErrorCount()
    {
        return count($this->error);
    }

    public function resetError()
    {
        $this->error = [];
    }

    public  function add_message($user_id)
    {
        $sql = "INSERT INTO contacts (`name`, `email`, `phone`, `title`, `message`, `user_id`) VALUES ('$this->name', '$this->email', $this->phone, '$this->title', '$this->message', $user_id)";
        mysqli_query($this->conn, $sql);
    }
}
