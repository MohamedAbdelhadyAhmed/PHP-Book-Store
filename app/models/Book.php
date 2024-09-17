<?php
// require_once ROOT_PATH . "app/database/config.php";
// require_once ROOT_PATH . "app/database/operations.php";
include_once __DIR__ . '/../database/config.php';
include_once __DIR__ . '/../database/operations.php';
// class Address  extends config implements operations
class Book  extends config implements operations
{

  public  function create() {}
  public function update() {}
  public function read()
  {
    $sql = "SELECT * FROM books  INNER JOIN authors ON books.author_id = authors.id";
    $result = $this->conn->query($sql);
    return $result;
  }
  public function delete() {}
}
