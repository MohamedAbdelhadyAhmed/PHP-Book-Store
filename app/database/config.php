<?php

class config
{

    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database_name = "book_store2";
    public $conn;

    public function __construct()
    {
        $this->conn = new  mysqli($this->servername, $this->username, $this->password, $this->database_name);
        // if ($this->conn->connect_error) {
        //     die("Connection failed: " . $this->conn->connect_error);
        // }
        // echo "Connected successfully";
    }
    public  function runDML(string $query)
    {
        #code 
        $result  =   $this->conn->query($query);
        if ($result) {
            return true;
        }
        return false;
    }
    public  function runDQL(string $query)
    {
        $result  =   $this->conn->query($query);
        if ($result && $result->num_rows > 0) {
            return  $result;
        }
        return [];
    }
}

// $connect = new config;