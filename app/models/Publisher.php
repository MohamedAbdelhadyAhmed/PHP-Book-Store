<?php
// echo __DIR__.'/../database/config.php';
// die();
include_once __DIR__ . '/../database/config.php';
include_once __DIR__ . '/../database/operations.php';
// class Address  extends config implements operations
class Publisher  extends config implements operations
{
    private $id;
    private $name;

    private $phone;
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
    /**
     * Get the value of phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
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

        $sql = "
        INSERT INTO publishers ( name , phone)
        VALUES ('$this->name' , '$this->phone')";

        return $this->runDML($sql);
    }
    public function update() {}
    public function read()
    {
        $sql  = "SELECT `id`,`name`,`phone` FROM `publishers`";
        return $this->runDQL($sql);
    }

    public function delete()
    {
        $sql  = " DELETE FROM `publishers`  WHERE `id`='$this->id'";
        return $this->runDML($sql);
    }
}
