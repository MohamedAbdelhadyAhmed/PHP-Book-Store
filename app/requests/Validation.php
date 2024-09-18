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


  

    public function unique($table ,$column , $value) 
    {
        $query = "SELECT * FROM `$table` WHERE `$column` = '$value'";
        
        $config = new config;
        $result = $config->runDQL($query);
        return (empty($result)) ? "" : "this $column is already exists";
    }

    public function confirmed($valueConfirmation , $value)
    {
        return ($value == $valueConfirmation) ? "" : "Password Not Confirmed";
    }
}

