<?php
// echo __DIR__.'/../database/config.php';
// die();
include_once __DIR__ . '/../database/config.php';
include_once __DIR__ . '/../database/operations.php';
// class Address  extends config implements operations
class Book  extends config implements operations
{
  private $id;
  private $title;
  private $image;
  private $description;
  private $price;
  private $lang;
  private $offer;
  private $code;
  private $numberOfPages;
  private $recommended;
  private $topSelling;
  private $authorId;
  private $category_id;
  private $publisherId;

  public function getId()
  {
    return $this->id;
  }
  public function setId($id)
  {
    $this->id = $id;
  }

  public function getTitle()
  {
    return $this->title;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }

  public function getImage()
  {
    return $this->image;
  }
  public function setImage($image)
  {
    $this->image = $image;
  }

  public function getDescription()
  {
    return $this->description;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getPrice()
  {
    return $this->price;
  }
  public function setPrice($price)
  {
    $this->price = $price;
  }

  public function getOffer()
  {
    return $this->offer;
  }
  public function setOffer($offer)
  {
    $this->offer = $offer;
  }

  public function getCode()
  {
    return $this->code;
  }
  public function setCode($code)
  {
    $this->code = $code;
  }

  public function getNumberOfPages()
  {
    return $this->numberOfPages;
  }
  public function setNumberOfPages($numberOfPages)
  {
    $this->numberOfPages = $numberOfPages;
  }

  public function getRecommended()
  {
    return $this->recommended;
  }
  public function setRecommended($recommended)
  {
    $this->recommended = $recommended;
  }

  public function getTopSelling()
  {
    return $this->topSelling;
  }
  public function setTopSelling($topSelling)
  {
    $this->topSelling = $topSelling;
  }

  public function getAuthorId()
  {
    return $this->authorId;
  }
  public function setAuthorId($authorId)
  {
    $this->authorId = $authorId;
  }


  /**
   * Get the value of category_id
   */
  public function getCategory_id()
  {
    return $this->category_id;
  }

  /**
   * Set the value of category_id
   *
   * @return  self
   */
  public function setCategory_id($category_id)
  {
    $this->category_id = $category_id;

    return $this;
  }

  public function getPublisherId()
  {
    return $this->publisherId;
  }
  public function setPublisherId($publisherId)
  {
    $this->publisherId = $publisherId;
  }


  //================================ Functions Here =====================================================
  public  function create()
  {

    $sql = "
    INSERT INTO books (title, price, offer, number_of_pages, author_id, category_id, publisher_id, description, image)
    VALUES ('$this->title', '$this->price', '$this->offer', '$this->numberOfPages', '$this->authorId', '$this->category_id', '$this->publisherId', '$this->description', '$this->image')";

    return $this->runDML($sql);
  }
  public function update()
  {
    $sql = "UPDATE `books` SET `top_selling` = `top_selling` + 1 WHERE `id` = '$this->id'";
    mysqli_query($this->conn, $sql);
  }
  public function read()
  {
    // $sql  = "SELECT * FROM `books`";
    $sql = "
    SELECT 
        books.*,
        authors.name AS author_name, 
        categories.name AS category_name,
        publishers.name AS publisher_name
    FROM 
        books
    JOIN 
        authors ON books.author_id = authors.id
    JOIN 
        categories ON books.category_id = categories.id
    JOIN 
        publishers ON books.publisher_id = publishers.id ";

    return $this->runDQL($sql);
  }
  public function delete()
  {
    $sql  = "DELETE FROM `books` WHERE `id`='$this->id'";
    return $this->runDML($sql);
  }

  public function GetMostSellBooks()
  {

    $query = "SELECT books.*, authors.name AS author_name, categories.name AS category_name FROM books INNER JOIN authors ON books.author_id = authors.id INNER JOIN categories ON books.category_id = categories.id ORDER BY `top_selling` DESC LIMIT 5";
    $result = $this->conn->query($query);
    return $result->fetch_assoc();
  }

  /**
   * Get the value of lang
   */
  public function getLang()
  {
    return $this->lang;
  }

  /**
   * Set the value of lang
   *
   * @return  self
   */
  public function setLang($lang)
  {
    $this->lang = $lang;

    return $this;
  }


  public function GetBooks()
  {
    $query = "SELECT books.*, authors.name AS author_name, categories.name AS category_name FROM books INNER JOIN authors ON books.author_id = authors.id INNER JOIN categories ON books.category_id = categories.id";
    $result = $this->conn->query($query);
    return $result;
  }

  public function GetBooksWithOffer()
  {
    $query = "SELECT books.*, authors.name AS author_name, categories.name AS category_name FROM books INNER JOIN authors ON books.author_id = authors.id INNER JOIN categories ON books.category_id = categories.id ORDER BY `offer` DESC LIMIT 5";
    $result = $this->conn->query($query);
    return $result;
  }

  public function GettopSellingBooks()
  {
    $query = "SELECT books.*, authors.name AS author_name, categories.name AS category_name FROM books INNER JOIN authors ON books.author_id = authors.id INNER JOIN categories ON books.category_id = categories.id ORDER BY `top_selling` DESC LIMIT 5";
    $result = $this->conn->query($query);
    return $result;
  }

  public function GetNewBooks()
  {
    $query = "SELECT books.*, authors.name AS author_name, categories.name AS category_name FROM books INNER JOIN authors ON books.author_id = authors.id INNER JOIN categories ON books.category_id = categories.id ORDER BY `id` DESC LIMIT 4";
    $result = $this->conn->query($query);
    return $result;
  }

  public function GetBooksByLang($lang)
  {
    $query = "SELECT books.*, authors.name AS author_name, categories.name AS category_name FROM books INNER JOIN authors ON books.author_id = authors.id INNER JOIN categories ON books.category_id = categories.id WHERE books.lang = '$lang'";
    $result = $this->conn->query($query);
    return $result;
  }

  public function GetBookById($id)
  {
    $query = "SELECT books.*, authors.name AS author_name, categories.name AS category_name, publishers.name AS publisher_name FROM books INNER JOIN authors ON books.author_id = authors.id INNER JOIN categories ON books.category_id = categories.id INNER JOIN publishers ON books.publisher_id = publishers.id WHERE books.id = $id";
    $result = $this->conn->query($query);
    return mysqli_fetch_assoc($result);
  }

  public function GetBooksbyCategory($category_id)
  {
    $query = "SELECT books.*, authors.name AS author_name, categories.name AS category_name FROM books INNER JOIN authors ON books.author_id = authors.id INNER JOIN categories ON books.category_id = categories.id WHERE books.category_id = $category_id ORDER BY `id` DESC LIMIT 4";
    $result = $this->conn->query($query);
    return $result;
  }


  public function GetBooksBySearch($search)
  {
    $query = "SELECT books.*, authors.name AS author_name, categories.name AS category_name FROM books INNER JOIN authors ON books.author_id = authors.id INNER JOIN categories ON books.category_id = categories.id WHERE title LIKE '%$search%' || authors.name LIKE '%$search%' || categories.name LIKE '%$search%';";
    $result = $this->conn->query($query);
    return $result;
  }
}
