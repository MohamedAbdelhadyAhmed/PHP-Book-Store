<?php
// echo __DIR__.'/../database/config.php';
// die();
include_once __DIR__ . '../database/config.php';
// class Address  extends config implements operations
class Book  extends config implements operations
{
  private $id;
  private $title;
  private $image;
  private $description;
  private $price;
  private $offer;
  private $code;
  private $numberOfPages;
  private $recommended;
  private $topSelling;
  private $authorId;
  private $subcategoryId;
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

  public function getSubcategoryId()
  {
    return $this->subcategoryId;
  }
  public function setSubcategoryId($subcategoryId)
  {
    $this->subcategoryId = $subcategoryId;
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
  public  function create() {}
  public function update() {}
  public function read()
  {
    // select all books 
  }
  public function delete() {}



  public function GetMostSellBooks()
  {

    $query = "";
    $result = $this->conn->query($query);
    return $result->fetch_assoc();
  }
}
