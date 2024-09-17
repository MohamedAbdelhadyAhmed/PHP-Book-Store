<?php
include_once __DIR__."\..\database\config.php";
class Validation{
    // private $name;
    // private $value;
    // public function __construct($name,$value) {
    //     $this->name = $name;
    //     $this->value = $value;
    // }
    public function required($name,$value) 
    {
        return (empty($value)) ? "$name is Required" : "";
    }


  

    // public function unique($table) 
    // {
    //     $query = "SELECT * FROM `$table` WHERE `$this->name` = '$this->value'";
        
    //     $config = new config;
    //     $result = $config->runDQL($query);
    //     return (empty($result)) ? "" : "this $this->name is already exists";
    // }

    // public function confirmed($valueConfirmation)
    // {
    //     return ($this->value == $valueConfirmation) ? "" : "$this->name Not Confirmed";
    // }
}

