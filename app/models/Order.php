<?php
// echo __DIR__.'/../database/config.php';
// die();
include_once __DIR__ . '/../database/config.php';
include_once __DIR__ . '/../database/operations.php';
// class Address  extends config implements operations
class Order  extends config implements operations
{
    private $id;
    private $userId;
    private $addressId;
    private $status;
    private $total_amount;
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

    public function getUserId()
    {
        return $this->userId;
    }
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function getAddressId()
    {
        return $this->addressId;
    }
    public function setAddressId($addressId)
    {
        $this->addressId = $addressId;
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
     * Get the value of total_amount
     */
    public function getTotal_amount()
    {
        return $this->total_amount;
    }

    /**
     * Set the value of total_amount
     *
     * @return  self
     */
    public function setTotal_amount($total_amount)
    {
        $this->total_amount = $total_amount;

        return $this;
    }
    //================================ Functions Here =====================================================
    public  function create()
    {
        $sql = "INSERT INTO `orders` (`user_id`, `shipping_address_id`, `total_amount`)
         VALUES ($this->userId, $this->addressId, $this->total_amount)";
        $result  =   $this->conn->query($sql);
        if ($result) {
            $last_id = $this->conn->insert_id;
            return  $last_id;
        }
        return false;
    }
    public function update()
    {
        $sql  = "UPDATE `orders` SET  `status`='$this->status'  WHERE `id`='$this->id'";
        return $this->runDML($sql);
    }
    public function read()
    {
        $query = "SELECT orders.total_amount, orders.id, users.first_name, users.last_name  FROM orders  INNER JOIN users ON orders.user_id = users.id ";
        return $this->runDQL($query);
    }
    public function delete() {}

    public function add_order($user_id, $address_id, $total)
    {
        $sql = "INSERT INTO `orders` (`user_id`, `shipping_address_id`, `total_amount`) VALUES ($user_id, $address_id, $total)";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function get_orders($user_id)
    {
        $sql = "SELECT * FROM `orders` WHERE `user_id` = $user_id";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function get_order_by_id($user_id)
    {
        $sql = "SELECT * FROM `orders` WHERE `user_id` = $user_id ORDER BY `id` DESC LIMIT 1";
        $result = $this->conn->query($sql);
        return mysqli_fetch_assoc($result);
    }

    public function GetOrder($order_id, $user_id)
    {
        $sql = "SELECT `orders`.* FROM `orders` WHERE `id` = $order_id AND `user_id` = $user_id";
        $result = $this->conn->query($sql);
        return mysqli_fetch_assoc($result);
    }

    public function GetOrderAddress($order_id, $user_id)
    {
        $sql = "SELECT `users`.`first_name`, `users`.`last_name`,`users`.`phone`, `users`.`email`, `addresses`.`state`, `addresses`.`street` 
        FROM `orders`
        INNER JOIN `users` ON `orders`.`user_id` = `users`.`id`
        INNER JOIN `addresses` ON `orders`.`shipping_address_id` = `addresses`.`id`
        WHERE `orders`.`id` = $order_id AND `orders`.`user_id` = $user_id;";
        $result = $this->conn->query($sql);
        return mysqli_fetch_assoc($result);
    }

    public function shipment_status($order_id, $user_id)
    {
        $sql = "SELECT * FROM `orders` WHERE `id` = $order_id AND `user_id` = $user_id";
        $result = $this->conn->query($sql);
        $row = mysqli_fetch_assoc($result);
        return $row['status'];
    }

    public function GetShipmentStatus($shipment_status, $progress_percentage)
    {
        switch ($shipment_status) {
            case "pending":
                $shipment_status = "تم طلبه";
                $progress_percentage = 25;
                break;
            case "shipped":
                $shipment_status = "تم الشحن";
                $progress_percentage = 50;
                break;
            case "out_for_delivery":
                $shipment_status = "خرج للتوصيل";
                $progress_percentage = 75;
                break;
            case "delivered":
                $shipment_status = "تم التوصيل";
                $progress_percentage = 100;
                break;
            default:
                $shipment_status = "";
                $progress_percentage = 0;
                break;
        }
        return array($shipment_status, $progress_percentage);
    }
}
